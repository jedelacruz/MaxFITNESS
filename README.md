# MaxFitness

MaxFitness is a dynamic web application for managing gym services, product orders, and user interactions. Powered by PHP and MySQL.

## Features

*   User registration and login
*   Product browsing and ordering (categorized by muscle group)
*   Contact form for user inquiries
*   Admin panel for site management

## Technologies Used

*   PHP
*   MySQL
*   HTML
*   CSS
*   JavaScript

## Project Structure

```
MAXFITNESS/
├── admin/                  # Admin panel files
│   ├── admin_style.css
│   └── index.php
├── includes/               # Reusable PHP components
│   ├── db.php              # Database connection
│   ├── footer.php          # Site footer
│   └── nav.php             # Navigation bar
├── images/                 # Product and site images
├── *.php                   # Core application files (login, register, product pages, etc.)
├── *.html                  # Static pages (contact)
├── *.css                   # Stylesheets
├── *.js                    # JavaScript files
└── maxfitness.sql          # Database schema
```

## Setup

1.  **Database:**
    *   Import `maxfitness.sql` into your MySQL database.
    *   Update database credentials in `includes/db.php`.
2.  **Web Server:**
    *   Ensure you have a web server (like Apache via XAMPP) with PHP support.
    *   Place the project files in your web server's document root (e.g., `htdocs` for XAMPP).
3.  **Access:**
    *   Open the project in your web browser (e.g., `http://localhost/MAXFITNESS/`).

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change. 
