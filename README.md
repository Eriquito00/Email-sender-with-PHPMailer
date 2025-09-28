# Email Sender with PHPMailer

A simple and user-friendly web application built with PHP that allows users to send emails through a web form interface using the PHPMailer library.

## What the Project Does

This project provides a clean web interface for sending emails with the following features:
- **Web Form Interface**: Simple HTML form for composing emails with subject, recipient email, and message fields
- **Server-Side Email Processing**: Uses PHPMailer library to handle SMTP email sending
- **Input Validation**: Validates email addresses and ensures all required fields are filled
- **Error Handling**: Provides clear feedback to users about success or failure of email sending
- **Responsive Design**: Clean, dark-themed CSS styling that works across different screen sizes
- **Gmail SMTP Integration**: Optimized for Gmail's SMTP server configuration

## Dependencies

This project requires the following dependencies:

### 1. XAMPP Installation

**XAMPP** is required to run this PHP application locally on your computer.

#### Installing XAMPP:
1. Download XAMPP from the official website: [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Choose the version compatible with your operating system (Windows, macOS, or Linux)
3. Run the installer and follow the installation wizard
4. Install XAMPP in the default location (usually `C:\xampp` on Windows or `/Applications/XAMPP` on macOS)

#### Setting up the Project in XAMPP:
1. Navigate to your XAMPP installation directory
2. Open the `htdocs` folder (this is where XAMPP serves websites from)
3. **Optional but Recommended**: Create a `projects` folder inside `htdocs` to organize your websites:
   ```
   htdocs/
   ├── projects/
   │   └── email-sender/  (your project will go here)
   └── (other existing files)
   ```
4. Clone this repository into the appropriate folder:
   ```bash
   cd /path/to/xampp/htdocs/projects/
   git clone https://github.com/Eriquito00/Email-sender-with-PHPMailer.git email-sender
   ```

### 2. PHP Dependencies

This project uses **Composer** to manage PHP dependencies:
- **PHPMailer**: Version 6.10+ for email sending functionality

To install PHP dependencies:
```bash
cd /path/to/your/project
composer install
```

## How to Run the Project

### Step 1: Start XAMPP Services
1. Open XAMPP Control Panel
2. Start the **Apache** service (required for PHP)
3. Optionally start **MySQL** if you plan to extend the project with database functionality

### Step 2: Gmail Account Configuration

**Important**: This project is optimized for Gmail's SMTP server. You'll need a Gmail account to send emails.

#### Setting up Gmail for the Application:
1. **Log into your Gmail account**
2. **Enable 2-Step Verification**:
   - Go to your Google Account settings: [https://myaccount.google.com/](https://myaccount.google.com/)
   - Navigate to "Security" → "2-Step Verification"
   - Follow the prompts to enable 2-Step Verification

3. **Create an App Password**:
   - In the same "Security" section, find "App passwords"
   - Click "Generate app passwords"
   - Choose "Mail" as the app type
   - Enter a custom name for your app (e.g., "Email Sender Project")
   - Google will generate a 16-character password - **save this password**, you'll need it for configuration

### Step 3: Project Configuration

1. **Copy the configuration template**:
   ```bash
   cp config.example.php config.php
   ```

2. **Edit the `config.php` file** with your Gmail credentials:
   ```php
   <?php
   
   return [
       "SMTP_HOST" => "smtp.gmail.com",              // Gmail SMTP server
       "SMTP_USER" => "your-email@gmail.com",       // Your Gmail address
       "SMTP_PASS" => "your-16-char-app-password",  // The app password from Step 2
       "SMTP_PORT" => 587,                          // Gmail SMTP port
       "SMTP_SECURE" => "tls"                       // Security protocol
   ];
   
   ?>
   ```

   **Example configuration**:
   ```php
   return [
       "SMTP_HOST" => "smtp.gmail.com",
       "SMTP_USER" => "john.doe@gmail.com",
       "SMTP_PASS" => "abcd efgh ijkl mnop",  // Your generated app password
       "SMTP_PORT" => 587,
       "SMTP_SECURE" => "tls"
   ];
   ```

### Step 4: Access the Application

1. Open your web browser
2. Navigate to: `http://localhost/projects/email-sender/` (adjust the path based on where you placed the project)
3. You should see the email form interface

## Usage

### Sending an Email:
1. **Subject**: Enter the email subject (maximum 50 characters)
2. **Email**: Enter the recipient's email address
3. **Message**: Enter your message (maximum 150 characters)
4. Click **Submit** to send the email

### Form Validation:
- All fields are required
- Email addresses are validated for proper format
- Character limits are enforced
- Clear error messages are displayed for invalid inputs

### Success/Error Messages:
- **Success**: "El correu s'ha enviat correctament." (The email has been sent successfully.)
- **Errors**: Specific error messages for validation failures or SMTP issues

## Project Structure

```
Email-sender-with-PHPMailer/
├── controller/
│   ├── controller.php      # Form processing and validation logic
│   └── mailer.php         # PHPMailer configuration and email sending
├── view/
│   └── view.php           # HTML template for the email form
├── style/
│   └── style.css          # CSS styling for the web interface
├── vendor/                # Composer dependencies (auto-generated)
├── config.example.php     # Configuration template
├── config.php            # Your actual configuration (create from example)
├── index.php             # Main entry point
├── composer.json         # PHP dependency configuration
├── composer.lock         # Dependency lock file
├── .gitignore           # Git ignore rules
├── LICENSE              # MIT License
└── README.md            # This documentation
```

### Key Components:

- **`index.php`**: Entry point that loads the view
- **`controller/controller.php`**: Handles form submission, validation, and error messages
- **`controller/mailer.php`**: Contains the PHPMailer configuration and email sending logic
- **`view/view.php`**: HTML template with embedded PHP for form rendering
- **`style/style.css`**: Responsive CSS with dark theme styling
- **`config.php`**: SMTP configuration file (you create this from the example)

## Security Notes

### Important Security Considerations:

1. **Configuration File Protection**:
   - **Never commit `config.php` to version control** - it contains sensitive credentials
   - The `.gitignore` file is configured to exclude `config.php`
   - Only commit `config.example.php` as a template

2. **App Passwords**:
   - Use Gmail App Passwords instead of your regular Gmail password
   - App Passwords are more secure and can be revoked independently
   - Never share your app password or commit it to code repositories

3. **Input Validation**:
   - All form inputs are validated server-side
   - Email addresses are validated using regex patterns
   - Character limits prevent potential abuse

4. **XSS Protection**:
   - All user input is properly escaped using `htmlspecialchars()` before display
   - Prevents cross-site scripting attacks

5. **SMTP Security**:
   - Uses TLS encryption for secure email transmission
   - Gmail's SMTP server provides additional security layers

6. **File Permissions**:
   - Ensure `config.php` has restrictive file permissions (600 or 644)
   - Prevent unauthorized access to configuration files

### Recommended Security Practices:

- Regularly rotate your Gmail App Passwords
- Monitor your Gmail account for unusual activity
- Consider implementing rate limiting for email sending
- Add CSRF protection for production use
- Use environment variables for sensitive configuration in production environments

### Production Deployment Notes:

- This project is designed for local development and testing
- For production use, consider additional security measures:
  - HTTPS encryption
  - Database logging of sent emails
  - Rate limiting and spam prevention
  - User authentication and authorization
  - Input sanitization beyond basic validation

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributing

Feel free to fork this project and submit pull requests for improvements or bug fixes.