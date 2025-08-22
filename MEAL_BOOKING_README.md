# Naija ReadFest Volunteer Meal Booking System

A comprehensive food management system for volunteers during the Naija ReadFest marathon event (August 12-30, 2025).

## 🍽️ Features

### For Volunteers
- **Daily Meal Booking**: Book breakfast, lunch, and dinner for any day during the marathon
- **One-time Booking**: Submit all meals for a day in a single form
- **Dietary Requirements**: Specify allergies, restrictions, or special dietary needs
- **Booking History**: View recent bookings and their status
- **Real-time Validation**: Form validation and date restrictions
- **Responsive Design**: Works on desktop, tablet, and mobile devices

### For Administrators
- **Database Management**: Complete CRUD operations for meal bookings
- **Reporting**: View booking statistics and summaries
- **Volunteer Management**: Register and manage volunteer information
- **Date-based Queries**: Filter bookings by date ranges
- **Export Capabilities**: Generate reports for catering teams

## 🚀 Quick Start

### 1. Database Setup

1. Create the database using the provided schema:
```bash
mysql -u root -p < database_schema.sql
```

2. Update database connection settings in `MealBookingManager.php`:
```php
$manager = new MealBookingManager('localhost', 'naijareadfest_meals', 'username', 'password');
```

### 2. File Structure

```
naijareadfest/
├── volunteer-meals.php          # Main meal booking page
├── MealBookingManager.php       # Database operations class
├── database_schema.sql          # Database structure
├── MEAL_BOOKING_README.md       # This documentation
└── index.php                    # Updated to include meal booking
```

### 3. Access the System

Navigate to: `http://your-domain/index.php?page=volunteer-meals`

## 📋 Meal Schedule

| Meal | Time | Description |
|------|------|-------------|
| **Breakfast** | 7:00 AM - 9:00 AM | Continental & Local breakfast with coffee and tea |
| **Lunch** | 12:00 PM - 2:00 PM | Nigerian cuisine with soft drinks |
| **Dinner** | 6:00 PM - 8:00 PM | International & Local dinner with beverages |

## 🎯 Usage Instructions

### For Volunteers

1. **Access the Booking Page**
   - Go to the main website
   - Navigate to "Discover" → "Volunteer Meals"

2. **Fill in Personal Information**
   - Full Name (required)
   - Email Address (required)
   - Phone Number (optional)

3. **Select Date**
   - Choose from available dates during the marathon period
   - Past dates are automatically disabled

4. **Choose Meals**
   - Select breakfast, lunch, and/or dinner
   - At least one meal must be selected
   - Visual feedback shows selected meals

5. **Add Dietary Requirements**
   - Specify any allergies or restrictions
   - This helps the catering team prepare appropriate meals

6. **Submit Booking**
   - Review your selections
   - Click "Submit Meal Booking"
   - Receive confirmation message

### For Administrators

1. **Database Operations**
```php
// Initialize the manager
$manager = new MealBookingManager();

// Get all bookings for a specific date
$bookings = $manager->getBookingsByDate('2025-08-12');

// Get booking statistics
$stats = $manager->getMealStatsByDate('2025-08-12');

// Get recent bookings
$recent = $manager->getRecentBookings(10);
```

2. **Generate Reports**
```php
// Get summary for date range
$summary = $manager->getBookingSummary('2025-08-12', '2025-08-30');

// Search volunteers
$volunteers = $manager->searchVolunteers('John');
```

## 🛠️ Technical Details

### Database Schema

- **volunteers**: Store volunteer information
- **meal_bookings**: Store meal booking details
- **meal_times**: Reference table for meal schedules

### Key Features

- **Unique Constraints**: One booking per volunteer per day
- **Status Tracking**: Pending, confirmed, cancelled states
- **Audit Trail**: Created/updated timestamps
- **Data Integrity**: Foreign key relationships

### Security Features

- **Input Validation**: Server-side and client-side validation
- **SQL Injection Prevention**: Prepared statements
- **XSS Protection**: HTML escaping
- **CSRF Protection**: Form tokens (recommended for production)

## 📱 Responsive Design

The system is fully responsive and optimized for:
- **Desktop**: Full-featured interface with all options visible
- **Tablet**: Optimized layout with touch-friendly controls
- **Mobile**: Streamlined interface for easy booking on phones

## 🔧 Customization

### Styling
The system uses Tailwind CSS classes. Customize the appearance by:
- Modifying CSS classes in the PHP files
- Adding custom CSS to `assets/css/custom.css`
- Updating color schemes to match your brand

### Meal Options
To add or modify meal options:
1. Update the meal selection cards in `volunteer-meals.php`
2. Modify the database schema if needed
3. Update the `MealBookingManager` class methods

### Date Range
To change the marathon dates:
1. Update the date variables in `volunteer-meals.php`
2. Modify the date generation logic
3. Update the database schema if needed

## 🚨 Important Notes

### Production Deployment

1. **Database Security**
   - Use strong passwords
   - Limit database user permissions
   - Enable SSL connections

2. **File Permissions**
   - Set appropriate file permissions
   - Protect sensitive configuration files

3. **Backup Strategy**
   - Regular database backups
   - Version control for code changes

### Performance Optimization

1. **Database Indexing**
   - Indexes are already created for common queries
   - Monitor query performance

2. **Caching**
   - Consider implementing Redis for session storage
   - Cache frequently accessed data

3. **CDN**
   - Use CDN for static assets
   - Optimize image delivery

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check database credentials
   - Verify database exists
   - Ensure MySQL service is running

2. **Form Submission Issues**
   - Check PHP error logs
   - Verify form validation
   - Test database permissions

3. **Display Problems**
   - Clear browser cache
   - Check CSS/JS file paths
   - Verify Tailwind CSS is loading

### Debug Mode

Enable debug mode by adding to the top of PHP files:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

## 📞 Support

For technical support or questions:
- Check the error logs
- Review the database schema
- Contact the development team

## 📄 License

This system is developed for Naija ReadFest and is proprietary software.

---

**Last Updated**: December 2024  
**Version**: 1.0.0  
**Compatibility**: PHP 7.4+, MySQL 5.7+
