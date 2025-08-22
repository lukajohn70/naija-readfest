<?php
/**
 * Meal Booking Manager for Naija ReadFest
 * Handles all database operations for volunteer meal bookings
 */

class MealBookingManager {
    private $pdo;
    
    public function __construct($host = 'localhost', $dbname = 'naijareadfest_meals', $username = 'root', $password = '') {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }
    
    /**
     * Register a new volunteer
     */
    public function registerVolunteer($name, $email, $phone = null, $role = null) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO volunteers (name, email, phone, role) 
                VALUES (:name, :email, :phone, :role)
                ON DUPLICATE KEY UPDATE 
                name = VALUES(name), 
                phone = VALUES(phone),
                role = VALUES(role),
                updated_at = CURRENT_TIMESTAMP
            ");
            
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'role' => $role
            ]);
            
            return $this->pdo->lastInsertId() ?: $this->getVolunteerIdByEmail($email);
        } catch (PDOException $e) {
            throw new Exception("Failed to register volunteer: " . $e->getMessage());
        }
    }
    
    /**
     * Get volunteer ID by email
     */
    public function getVolunteerIdByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id FROM volunteers WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();
        return $result ? $result['id'] : null;
    }
    
    /**
     * Get volunteer profile by email
     */
    public function getVolunteerProfile($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM volunteers WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch();
        if ($result && $result['availability']) {
            $result['availability'] = json_decode($result['availability'], true);
        }
        return $result;
    }
    
    /**
     * Create a meal booking
     */
    public function createMealBooking($volunteerId, $bookingDate, $breakfast, $lunch, $dinner, $dietaryRequirements = null) {
        try {
            // Check if booking already exists for this volunteer and date
            $existingBooking = $this->getBookingByVolunteerAndDate($volunteerId, $bookingDate);
            if ($existingBooking) {
                throw new Exception("A booking already exists for this volunteer on the selected date.");
            }
            
            $stmt = $this->pdo->prepare("
                INSERT INTO meal_bookings 
                (volunteer_id, booking_date, breakfast, lunch, dinner, dietary_requirements) 
                VALUES (:volunteer_id, :booking_date, :breakfast, :lunch, :dinner, :dietary_requirements)
            ");
            
            $stmt->execute([
                'volunteer_id' => $volunteerId,
                'booking_date' => $bookingDate,
                'breakfast' => $breakfast ? 1 : 0,
                'lunch' => $lunch ? 1 : 0,
                'dinner' => $dinner ? 1 : 0,
                'dietary_requirements' => $dietaryRequirements
            ]);
            
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            throw new Exception("Failed to create meal booking: " . $e->getMessage());
        }
    }
    
    /**
     * Get booking by volunteer ID and date
     */
    public function getBookingByVolunteerAndDate($volunteerId, $bookingDate) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM meal_bookings 
            WHERE volunteer_id = :volunteer_id AND booking_date = :booking_date
        ");
        $stmt->execute([
            'volunteer_id' => $volunteerId,
            'booking_date' => $bookingDate
        ]);
        return $stmt->fetch();
    }
    
    /**
     * Update meal booking
     */
    public function updateMealBooking($bookingId, $breakfast, $lunch, $dinner, $dietaryRequirements = null) {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE meal_bookings 
                SET breakfast = :breakfast, 
                    lunch = :lunch, 
                    dinner = :dinner, 
                    dietary_requirements = :dietary_requirements,
                    updated_at = CURRENT_TIMESTAMP
                WHERE id = :booking_id
            ");
            
            $stmt->execute([
                'booking_id' => $bookingId,
                'breakfast' => $breakfast ? 1 : 0,
                'lunch' => $lunch ? 1 : 0,
                'dinner' => $dinner ? 1 : 0,
                'dietary_requirements' => $dietaryRequirements
            ]);
            
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Failed to update meal booking: " . $e->getMessage());
        }
    }
    
    /**
     * Cancel meal booking
     */
    public function cancelMealBooking($bookingId) {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE meal_bookings 
                SET status = 'cancelled', updated_at = CURRENT_TIMESTAMP
                WHERE id = :booking_id
            ");
            
            $stmt->execute(['booking_id' => $bookingId]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            throw new Exception("Failed to cancel meal booking: " . $e->getMessage());
        }
    }
    
    /**
     * Get all bookings for a specific date
     */
    public function getBookingsByDate($date) {
        $stmt = $this->pdo->prepare("
            SELECT mb.*, v.name, v.email, v.phone
            FROM meal_bookings mb
            JOIN volunteers v ON mb.volunteer_id = v.id
            WHERE mb.booking_date = :date AND mb.status != 'cancelled'
            ORDER BY v.name
        ");
        $stmt->execute(['date' => $date]);
        return $stmt->fetchAll();
    }
    
    /**
     * Get all bookings for a volunteer
     */
    public function getBookingsByVolunteer($volunteerId) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM meal_bookings 
            WHERE volunteer_id = :volunteer_id AND status != 'cancelled'
            ORDER BY booking_date DESC
        ");
        $stmt->execute(['volunteer_id' => $volunteerId]);
        return $stmt->fetchAll();
    }
    
    /**
     * Get recent bookings (last 10)
     */
    public function getRecentBookings($limit = 10) {
        $stmt = $this->pdo->prepare("
            SELECT mb.*, v.name, v.email
            FROM meal_bookings mb
            JOIN volunteers v ON mb.volunteer_id = v.id
            WHERE mb.status != 'cancelled'
            ORDER BY mb.created_at DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Get meal statistics for a date
     */
    public function getMealStatsByDate($date) {
        $stmt = $this->pdo->prepare("
            SELECT 
                COUNT(*) as total_bookings,
                SUM(breakfast) as breakfast_count,
                SUM(lunch) as lunch_count,
                SUM(dinner) as dinner_count
            FROM meal_bookings 
            WHERE booking_date = :date AND status != 'cancelled'
        ");
        $stmt->execute(['date' => $date]);
        return $stmt->fetch();
    }
    
    /**
     * Get all meal times
     */
    public function getMealTimes() {
        $stmt = $this->pdo->prepare("SELECT * FROM meal_times ORDER BY start_time");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    /**
     * Search volunteers by name or email
     */
    public function searchVolunteers($searchTerm) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM volunteers 
            WHERE name LIKE :search OR email LIKE :search
            ORDER BY name
        ");
        $stmt->execute(['search' => "%$searchTerm%"]);
        return $stmt->fetchAll();
    }
    
    /**
     * Get booking summary for admin dashboard
     */
    public function getBookingSummary($startDate = null, $endDate = null) {
        $whereClause = "WHERE status != 'cancelled'";
        $params = [];
        
        if ($startDate && $endDate) {
            $whereClause .= " AND booking_date BETWEEN :start_date AND :end_date";
            $params['start_date'] = $startDate;
            $params['end_date'] = $endDate;
        }
        
        $stmt = $this->pdo->prepare("
            SELECT 
                booking_date,
                COUNT(*) as total_bookings,
                SUM(breakfast) as breakfast_count,
                SUM(lunch) as lunch_count,
                SUM(dinner) as dinner_count
            FROM meal_bookings 
            $whereClause
            GROUP BY booking_date
            ORDER BY booking_date
        ");
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
?>
