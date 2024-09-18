using Aspose.Cells;
using Microsoft.AspNetCore.Mvc;

namespace WLServices.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class XMLToXSLTController : ControllerBase
    {
        [HttpPost("xml2xlsx")]
        public IActionResult ImportXml([FromForm] string filePath)
        {
            try
            {
                // folder path of source and dest
                var dataDir = @"C:\Files\";

                // ensure the directory exists
                if (!Directory.Exists(dataDir))
                {
                    Directory.CreateDirectory(dataDir);
                }

                // Validate if the file exists
                var xmlFilePath = Path.Combine(dataDir, filePath);
                if (!System.IO.File.Exists(xmlFilePath))
                {
                    return NotFound("The specified XML file does not exist.");
                }

                Workbook workbook = new Workbook();

                workbook.ImportXml(xmlFilePath, "Sheet1", 0, 0);

                // save the workbook as XLSX in desktop
                var outputFilePath = Path.Combine(Environment.GetFolderPath(Environment.SpecialFolder.Desktop), "UserReport_" + DateTime.Now.ToString("yyyyMMddHHmmss"));
                workbook.Save(outputFilePath, SaveFormat.Auto);

                // return path of the saved file
                return Ok(new { FilePath = outputFilePath });
            }
            catch (Exception ex)
            {
                // error response
                return StatusCode(500, "Unable to convert XML file to XSLX file due to an error occurred: " + ex.Message);
            }
        }
    }
}

