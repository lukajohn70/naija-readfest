# Naija ReadFest Volunteer Profile System

A comprehensive volunteer management system that allows volunteers to register, manage their profiles, and access meal booking services.

## 🎯 Features

### Volunteer Registration
- **Personal Information**: Name, email, phone number
- **T-Shirt Size**: For event merchandise
- **Availability**: Select preferred shift times (Morning, Afternoon, Night)
- **Skills & Experience**: Background information for role assignment

### Profile Management
- **Profile Dashboard**: View all personal information
- **Edit Profile**: Update information anytime
- **Volunteer ID**: Unique identifier for the event
- **Quick Actions**: Easy access to meal booking and other services

### Integration with Meal Booking
- **Seamless Access**: Direct link to meal booking from profile
- **Auto-fill**: Volunteer information automatically populated
- **Session Management**: Stay logged in across pages

## 🚀 How It Works

### 1. Access Points
- **Footer Link**: "Volunteer Profile" in the website footer
- **Direct URL**: `index.php?page=volunteer-profile`

### 2. Registration Process
1. Fill out the registration form
2. Submit personal information
3. Receive confirmation and volunteer ID
4. Access meal booking and other services

### 3. Profile Management
- View profile information
- Edit details as needed
- Access quick actions
- Logout when done

## 📱 User Interface

### Registration Form
- Clean, modern design
- Required field validation
- Responsive layout
- Clear instructions

### Profile Dashboard
- Welcome message with volunteer name
- Information cards
- Quick action buttons
- Volunteer ID display

### Edit Profile
- Collapsible form
- Pre-filled with current data
- Save/Cancel options
- Success/error messages

## 🔧 Technical Implementation

### Session Management
```php
// Start session
session_start();

// Store volunteer data
$_SESSION['volunteer_id'] = uniqid();
$_SESSION['volunteer_name'] = $name;
$_SESSION['volunteer_email'] = $email;
// ... other fields

// Check login status
$isLoggedIn = isset($_SESSION['volunteer_id']);
```

### Database Integration
```php
// Register volunteer
$manager = new MealBookingManager();
$volunteerId = $manager->registerVolunteer(
    $name, $email, $phone, $shirtSize, $availability, $skills
);

// Get profile
$profile = $manager->getVolunteerProfile($email);
```

### Form Handling
- POST method for data submission
- Action-based routing
- Input validation
- Error handling

## 🛡️ Security Features

### Data Protection
- Session-based authentication
- Input sanitization
- SQL injection prevention
- XSS protection

### Access Control
- Login required for meal booking
- Automatic redirect to registration
- Secure logout functionality

## 📊 Database Schema

### Volunteers Table
```sql
CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20),
    shirt_size ENUM('XS', 'S', 'M', 'L', 'XL', 'XXL'),
    availability JSON,
    skills TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## 🎨 Styling

### Design System
- **Colors**: Green theme matching Naija ReadFest branding
- **Typography**: Inter font family
- **Icons**: Font Awesome icons
- **Layout**: Tailwind CSS framework

### Responsive Design
- **Desktop**: Full-featured interface
- **Tablet**: Optimized layout
- **Mobile**: Touch-friendly controls

## 🔄 Workflow

### New Volunteer
1. Visit volunteer profile page
2. Fill registration form
3. Submit and receive confirmation
4. Access meal booking system
5. Manage profile as needed

### Returning Volunteer
1. Visit volunteer profile page
2. View current information
3. Edit if needed
4. Access meal booking
5. Logout when finished

## 📞 Support

### Common Issues
- **Session Expired**: Re-register or contact support
- **Form Errors**: Check required fields
- **Access Denied**: Ensure proper registration

### Contact Information
- Email: info@nigeriareads.ng
- Phone: +234 806 781 3462
- Website: nigeriareads.ng

## 🔮 Future Enhancements

### Planned Features
- **Email Verification**: Confirm email addresses
- **Password Protection**: Secure login system
- **Profile Photos**: Upload volunteer photos
- **Shift Assignment**: Automatic role assignment
- **Notifications**: Email/SMS reminders

### Integration Opportunities
- **Event Management**: Connect with main event system
- **Communication**: Internal messaging system
- **Reporting**: Volunteer activity reports
- **Analytics**: Usage statistics and insights

---

**Last Updated**: December 2024  
**Version**: 1.0.0  
**Compatibility**: PHP 7.4+, MySQL 5.7+
