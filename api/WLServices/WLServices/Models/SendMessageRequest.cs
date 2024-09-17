namespace WLServices.Models
{
    public class SendMessageRequest
    {
        public string Receiver { get; set; }
        public string Subject { get; set; }
        public string Message { get; set; }
    }
}

