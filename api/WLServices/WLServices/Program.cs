var builder = WebApplication.CreateBuilder(args);

// Add CORS services to the container
builder.Services.AddCors(options =>
{
    options.AddPolicy("AllowSpecificOrigins",
        policy =>
        {
            policy.WithOrigins("http://127.0.0.1:8000")
                  .AllowAnyMethod()
                  .AllowAnyHeader();
        });
});

builder.Services.AddControllers();

var app = builder.Build();

// Use CORS middleware
app.UseCors("AllowSpecificOrigins");


app.UseRouting();
app.UseAuthorization();

app.MapControllers();

app.Run();

