# Single Page Website

This project is a simple single-page website that includes a contact form with email functionality and saves the content to a database. Below are the details for setting up and using the project.

## Project Structure

```
single-page-website
├── public
│   ├── index.php          # Main entry point for the website
│   ├── contact.php        # Contact form for user submissions
│   └── styles
│       └── style.css      # CSS styles for the website
├── src
│   ├── db
│   │   └── connection.php  # Database connection setup
│   ├── mail
│   │   └── send_mail.php   # Email sending functionality
│   └── helpers
│       └── functions.php    # Helper functions for validation and sanitization
├── config
│   └── config.php          # Configuration settings (database credentials, etc.)
├── .htaccess               # Server configuration for URL rewriting
├── README.md               # Project documentation
└── composer.json           # Composer dependencies and autoloading settings
```

## Setup Instructions

1. **Clone the Repository**: Download or clone the repository to your local machine or server.

2. **Database Configuration**:
   - Create a new database in your cPanel.
   - Update the `src/db/connection.php` file with your database credentials.

3. **Composer Dependencies**:
   - Navigate to the project directory in your terminal.
   - Run `composer install` to install any required dependencies.

4. **Email Configuration**:
   - Update the `src/mail/send_mail.php` file with the email address where you want to receive contact form submissions.

5. **Access the Website**:
   - Open your web browser and navigate to the `public/index.php` file to view the website.

## Usage

- Users can fill out the contact form on the `contact.php` page.
- Upon submission, the form data will be validated and sanitized.
- An email will be sent to the specified address with the user's information.
- The content can also be saved to the database for record-keeping.

## License

This project is open-source and available for modification and distribution. Please give appropriate credit if you use or modify the code.