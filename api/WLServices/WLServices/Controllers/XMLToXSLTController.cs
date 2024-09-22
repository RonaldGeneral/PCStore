using Aspose.Cells;
using Microsoft.AspNetCore.Mvc;
using System.Xml.Linq;
using WLServices.Models;

namespace WLServices.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class XMLToXSLTController : ControllerBase
    {
        [HttpPost("xml2xlsx")]
        public IActionResult ConvertXmlToXlsx([FromBody] XmlRequest request)
        {
            if (string.IsNullOrEmpty(request.XmlContent))
            {
                return BadRequest("XML content cannot be empty.");
            }

            // Extract the report name from the XML
            string reportName;
            try
            {
                var xmlDoc = XDocument.Parse(request.XmlContent);
                reportName = xmlDoc.Root.Element("report_name")?.Value ?? "DefaultReportName";
            }
            catch
            {
                reportName = "DefaultReportName"; // Fallback in case of parsing error
            }

            // Define a temporary file path for the XML
            string tempXmlFilePath = Path.GetTempFileName() + ".xml";

            // Save the XML content to the temporary file
            System.IO.File.WriteAllText(tempXmlFilePath, request.XmlContent);

            try
            {
                // Load the XML content into the workbook
                var workbook = new Workbook(tempXmlFilePath);

                // Sanitize the report name for use in the file name
                string sanitizedReportName = string.Concat(reportName.Split(Path.GetInvalidFileNameChars()));
                string outputFilePath = Path.Combine(Environment.GetFolderPath(Environment.SpecialFolder.UserProfile), "Downloads", $"{sanitizedReportName}.xlsx");

                // Save the workbook to the specified output file path
                workbook.Save(outputFilePath, SaveFormat.Xlsx);

                // Optionally, delete the temporary XML file
                System.IO.File.Delete(tempXmlFilePath);

                return Ok(new { Message = "File has been successfully downloaded." });
            }
            catch (Exception ex)
            {
                return StatusCode(500, $"Error processing the XML: {ex.Message}");
            }
        }
    }
}
