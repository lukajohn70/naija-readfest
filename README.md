# Naija ReadFest Website

A comprehensive website for the Naija ReadFest event, built with PHP and modern web technologies.

## Features

- **Event Information**: Comprehensive details about the Naija ReadFest marathon
- **Reading List**: Curated collection of 50+ Nigerian literary masterpieces
- **Progress Tracking**: Real-time marathon progress and milestone tracking
- **Partner Information**: Details about supporting organizations and sponsors
- **Gallery**: Visual documentation of the event
- **Contact System**: Easy communication with the Naija ReadFest team

## Technology Stack

- **Backend**: PHP
- **Database**: MySQL (via db.php)
- **PDF Generation**: FPDF library
- **Frontend**: HTML5, CSS3, JavaScript
- **Styling**: Custom CSS with animations
- **Icons**: React SVG and custom graphics

## File Structure

```
naijareadfest/
├── assets/                 # CSS and static assets
│   ├── css/
│   │   ├── animations.css
│   │   ├── custom.css
│   │   └── index.css
│   └── react.svg
├── lib/                    # Third-party libraries
│   └── fpdf/              # PDF generation library
├── public/                 # Public assets
│   ├── partners/          # Partner logos
│   ├── slideshow-images/  # Image gallery
│   ├── marathoners/       # Marathoner photos
│   └── header-slideshow-images/
├── *.php                  # Main PHP files
└── README.md             # This file
```

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/lukajohn70/naijareadfest.git
   ```

2. Set up your web server (Apache/Nginx) to serve the files

3. Configure your database connection in `db.php`

4. Ensure PHP is installed with required extensions

## Usage

- Access the main site through `index.php`
- Admin panel is available at `admin.php`
- All pages are accessible through the navigation menu

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is part of the Naija ReadFest event. Please contact the organizers for licensing information.

## Contact

For more information about Naija ReadFest, visit the website or contact the organizing team through the contact page.

---

**Note**: This is a PHP-based website designed for the Naija ReadFest event. Make sure to configure your web server and database properly before deployment. 
