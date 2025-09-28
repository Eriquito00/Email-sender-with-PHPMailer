# Email-sender-with-PHPMailer

A simple web application for sending emails using PHPMailer. This project provides a user-friendly web form interface that allows users to send emails through SMTP configuration.

## What the project does

This project is a web-based email sender that:
- Provides a clean, responsive web form for composing emails
- Validates email input fields (subject, recipient email, message)
- Sends emails using PHPMailer library through SMTP
- Supports secure email transmission with TLS/SSL
- Displays success/error messages to the user
- Features a dark-themed, modern user interface

## Dependencies

The project requires the following dependencies:

### System Requirements
- **PHP 8.0+** - The application is built with PHP
- **Composer** - For managing PHP dependencies
- **Web Server** - Apache, Nginx, or PHP built-in development server

### PHP Dependencies
- **PHPMailer v6.10+** - For sending emails via SMTP

## How to run the project on your own PC

### 1. Clone the repository
```bash
git clone https://github.com/Eriquito00/Email-sender-with-PHPMailer.git
cd Email-sender-with-PHPMailer
```

### 2. Install dependencies
Make sure you have Composer installed, then run:
```bash
composer install
```

### 3. Configure SMTP settings
1. Copy the example configuration file:
   ```bash
   cp config.example.php config.php
   ```

2. Edit `config.php` with your SMTP credentials:
   ```php
   <?php
   return [
       "SMTP_HOST" => "smtp.gmail.com",          // Your SMTP server
       "SMTP_USER" => "your-email@gmail.com",   // Your email address
       "SMTP_PASS" => "your-app-password",      // Your email app password
       "SMTP_PORT" => 587,                      // SMTP port (587 for TLS)
       "SMTP_SECURE" => "tls"                   // Security protocol
   ];
   ?>
   ```

   **Note for Gmail users:** You'll need to:
   - Enable 2-factor authentication on your Google account
   - Generate an "App Password" for this application
   - Use the app password in the `SMTP_PASS` field

### 4. Start the web server

#### Using PHP built-in server (for development):
```bash
php -S localhost:8000
```

#### Using Apache/Nginx:
- Copy the project files to your web server's document root
- Make sure the web server has read permissions on all files
- Access the application through your web server

### 5. Access the application
Open your web browser and navigate to:
- `http://localhost:8000` (if using PHP built-in server)
- `http://localhost/Email-sender-with-PHPMailer` (if using Apache/Nginx)

## Usage

1. Fill in the email form with:
   - **Subject**: Email subject line (max 50 characters)
   - **Email**: Recipient's email address
   - **Message**: Email content (max 150 characters)

2. Click "Submit" to send the email

3. The application will display a success or error message

## Project Structure

```
├── controller/
│   ├── controller.php    # Form validation and processing logic
│   └── mailer.php       # PHPMailer email sending functionality
├── view/
│   └── view.php         # HTML form interface
├── style/
│   └── style.css        # CSS styling for the web interface
├── config.example.php   # Example SMTP configuration
├── composer.json        # PHP dependencies
├── index.php           # Main entry point
└── README.md           # This file
```

## Security Notes

- Never commit your `config.php` file with real credentials to version control
- Use app-specific passwords instead of your main email password
- The `config.php` file is already included in `.gitignore` for security

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
