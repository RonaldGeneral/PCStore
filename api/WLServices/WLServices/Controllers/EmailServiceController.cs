using Microsoft.AspNetCore.Mvc;
using System.Net.Mail;
using System.Net;
using WLServices.Models;

namespace WLServices.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EmailServiceController : Controller
    {
        private readonly IConfiguration _config;

        public EmailServiceController(IConfiguration config)
        {
            _config = config;
        }

        public IActionResult Index()
        {
            return View();

        }

        [HttpPost("send")]
        public async Task<IActionResult> SendMessage([FromBody] SendMessageRequest request)
        {
            string fromEmail = _config["EmailSettings:EmailAddress"];
            string credentials = _config["EmailSettings:AppKey"];

            try
            {
                System.Net.ServicePointManager.SecurityProtocol = SecurityProtocolType.Tls12;


                MailMessage mailMsg = new MailMessage
                {
                    From = new MailAddress(fromEmail),
                    Body = request.Message,
                    Subject = request.Subject,
                };
                mailMsg.To.Add(new MailAddress(request.Receiver));
                mailMsg.IsBodyHtml = true;

                var smtpClient = new SmtpClient("smtp.gmail.com")
                {
                    Port = 587, //587 | 465
                    Credentials = new NetworkCredential(Convert.ToString(fromEmail), Convert.ToString(credentials)),
                    EnableSsl = true,
                    DeliveryMethod = SmtpDeliveryMethod.Network,
                    UseDefaultCredentials = false,
                };

                await smtpClient.SendMailAsync(mailMsg);
                return Ok("Email sent successfully.");
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error sending email: {ex.Message}");
                return StatusCode(500, $"Internal server error: {ex.Message}");
            }
        }
    }
}

