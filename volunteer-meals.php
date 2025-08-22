<?php
// Volunteer Meal Booking System for Naija ReadFest
// Session and redirects are now handled in index.php

$currentDate = date('Y-m-d');
$marathonStartDate = '2025-08-12';
$marathonEndDate = '2025-08-30';

// Generate dates for the marathon period
$marathonDates = [];
$current = new DateTime($marathonStartDate);
$end = new DateTime($marathonEndDate);

while ($current <= $end) {
    $marathonDates[] = $current->format('Y-m-d');
    $current->add(new DateInterval('P1D'));
}

// Handle form submission
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use session data for volunteer information
    $volunteerName = $_SESSION['volunteer_name'];
    $volunteerEmail = $_SESSION['volunteer_email'];
    $volunteerPhone = $_SESSION['volunteer_phone'] ?? '';
    $selectedDate = $_POST['selected_date'] ?? '';
    $breakfast = isset($_POST['breakfast']) ? 1 : 0;
    $lunch = isset($_POST['lunch']) ? 1 : 0;
    $dinner = isset($_POST['dinner']) ? 1 : 0;
    $dietaryRequirements = $_POST['dietary_requirements'] ?? '';
    
    if ($selectedDate) {
        // Here you would typically save to database using MealBookingManager
        // $manager = new MealBookingManager();
        // $volunteerId = $manager->getVolunteerIdByEmail($volunteerEmail);
        // $manager->createMealBooking($volunteerId, $selectedDate, $breakfast, $lunch, $dinner, $dietaryRequirements);
        
        $message = "Meal booking submitted successfully for " . date('F j, Y', strtotime($selectedDate)) . "!";
        $messageType = 'success';
    } else {
        $message = "Please select a date for your meal booking.";
        $messageType = 'error';
    }
}
?>

<div class="w-full mt-10 mb-16 shadow-xl overflow-hidden" style="min-height: 420px;">
  <div class="w-full h-full flex flex-col items-center justify-center py-16 px-4" style="background: linear-gradient(90deg, #29984A 0%, #232d23 50%, #C0392B 100%);">
    <div class="flex flex-row items-center justify-center space-x-6 mb-6">
      <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-white text-center mb-2 drop-shadow">Volunteer Meal Booking</h1>
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow">Book your meals for the marathon period</h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">
        <i class="fas fa-utensils"></i>
        Daily Meal Management
      </span>
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold border border-white/20">
        <i class="fas fa-calendar-alt"></i>
        August 12 - 30, 2025
      </span>
    </div>
  </div>
</div>

<div class="flex justify-center w-full px-4 py-8">
  <div class="w-full max-w-6xl">
    
    <!-- Success/Error Messages -->
    <?php if ($message): ?>
      <div class="mb-6 p-4 rounded-lg <?= $messageType === 'success' ? 'bg-green-100 border border-green-400 text-green-700' : 'bg-red-100 border border-red-400 text-red-700' ?>">
        <div class="flex items-center">
          <i class="fas <?= $messageType === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle' ?> mr-2"></i>
          <?= htmlspecialchars($message) ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Information Cards -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
      <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-center mb-4">
          <div class="bg-blue-100 text-blue-600 rounded-full p-3 mr-4">
            <i class="fas fa-clock text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-blue-800">Meal Times</h3>
        </div>
        <ul class="space-y-2 text-blue-700">
          <li class="flex items-center">
            <i class="fas fa-sun text-yellow-500 mr-2"></i>
            <span class="font-semibold">Breakfast:</span> 7:00 AM - 9:00 AM
          </li>
          <li class="flex items-center">
            <i class="fas fa-cloud-sun text-orange-500 mr-2"></i>
            <span class="font-semibold">Lunch:</span> 12:00 PM - 2:00 PM
          </li>
          <li class="flex items-center">
            <i class="fas fa-moon text-purple-500 mr-2"></i>
            <span class="font-semibold">Dinner:</span> 6:00 PM - 8:00 PM
          </li>
        </ul>
      </div>

      <div class="bg-green-50 border border-green-200 rounded-xl p-6">
        <div class="flex items-center mb-4">
          <div class="bg-green-100 text-green-600 rounded-full p-3 mr-4">
            <i class="fas fa-info-circle text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-green-800">Booking Rules</h3>
        </div>
        <ul class="space-y-2 text-green-700">
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
            Book all meals for a day at once
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
            Submit at least 24 hours in advance
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mr-2 mt-1"></i>
            One booking per volunteer per day
          </li>
        </ul>
      </div>

      <div class="bg-purple-50 border border-purple-200 rounded-xl p-6">
        <div class="flex items-center mb-4">
          <div class="bg-purple-100 text-purple-600 rounded-full p-3 mr-4">
            <i class="fas fa-phone text-xl"></i>
          </div>
          <h3 class="text-xl font-bold text-purple-800">Need Help?</h3>
        </div>
        <p class="text-purple-700 mb-4">Contact the food management team for any questions or special dietary requirements.</p>
        <a href="index.php?page=contact" class="inline-flex items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold px-4 py-2 rounded-lg transition-colors duration-200">
          <i class="fas fa-envelope mr-2"></i>
          Contact Us
        </a>
      </div>
    </div>

    <!-- Meal Booking Form -->
    <div class="bg-white rounded-2xl shadow-xl p-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Book Your Meals</h2>
      
      <form method="POST" class="space-y-6">
        <!-- Volunteer Information Display -->
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-6">
          <h3 class="text-lg font-semibold text-green-800 mb-4 flex items-center">
            <i class="fas fa-user-circle mr-2"></i>
            Volunteer Information
          </h3>
          <div class="grid md:grid-cols-3 gap-4 text-sm">
            <div>
              <span class="font-semibold text-gray-700">Name:</span>
              <span class="text-gray-800"><?= htmlspecialchars($_SESSION['volunteer_name']) ?></span>
            </div>
            <div>
              <span class="font-semibold text-gray-700">Email:</span>
              <span class="text-gray-800"><?= htmlspecialchars($_SESSION['volunteer_email']) ?></span>
            </div>
            <div>
              <span class="font-semibold text-gray-700">Phone:</span>
              <span class="text-gray-800"><?= htmlspecialchars($_SESSION['volunteer_phone'] ?? 'Not provided') ?></span>
            </div>
          </div>
          <div class="mt-4 flex space-x-4">
            <a href="index.php?page=volunteer-profile" 
               class="text-green-600 hover:text-green-700 font-semibold text-sm flex items-center">
              <i class="fas fa-edit mr-1"></i>
              Update Profile
            </a>
            <a href="index.php?page=volunteer-profile?action=logout" 
               class="text-red-600 hover:text-red-700 font-semibold text-sm flex items-center">
              <i class="fas fa-sign-out-alt mr-1"></i>
              Logout
            </a>
          </div>
        </div>

        <!-- Date Selection -->
        <div>
          <label for="selected_date" class="block text-sm font-semibold text-gray-700 mb-2">
            Select Date <span class="text-red-500">*</span>
          </label>
          <select id="selected_date" name="selected_date" required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200">
            <option value="">Choose a date</option>
            <?php foreach ($marathonDates as $date): ?>
              <option value="<?= $date ?>" <?= $date === $currentDate ? 'selected' : '' ?>>
                <?= date('l, F j, Y', strtotime($date)) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Meal Selection -->
        <div class="bg-gray-50 rounded-xl p-6">
          <h3 class="text-xl font-bold text-gray-800 mb-4">Select Your Meals</h3>
          <div class="grid md:grid-cols-3 gap-6">
            
            <!-- Breakfast -->
            <div class="bg-white rounded-lg p-6 border-2 border-transparent hover:border-yellow-300 transition-colors duration-200">
              <div class="flex items-center mb-4">
                <input type="checkbox" id="breakfast" name="breakfast" class="w-5 h-5 text-yellow-600 border-gray-300 rounded focus:ring-yellow-500">
                <label for="breakfast" class="ml-3 text-lg font-semibold text-gray-800 flex items-center">
                  <i class="fas fa-sun text-yellow-500 mr-2"></i>
                  Breakfast
                </label>
              </div>
              <div class="text-sm text-gray-600 space-y-1">
                <p><i class="fas fa-clock mr-1"></i> 7:00 AM - 9:00 AM</p>
                <p><i class="fas fa-utensils mr-1"></i> Continental & Local</p>
                <p><i class="fas fa-coffee mr-1"></i> Coffee & Tea included</p>
              </div>
            </div>

            <!-- Lunch -->
            <div class="bg-white rounded-lg p-6 border-2 border-transparent hover:border-orange-300 transition-colors duration-200">
              <div class="flex items-center mb-4">
                <input type="checkbox" id="lunch" name="lunch" class="w-5 h-5 text-orange-600 border-gray-300 rounded focus:ring-orange-500">
                <label for="lunch" class="ml-3 text-lg font-semibold text-gray-800 flex items-center">
                  <i class="fas fa-cloud-sun text-orange-500 mr-2"></i>
                  Lunch
                </label>
              </div>
              <div class="text-sm text-gray-600 space-y-1">
                <p><i class="fas fa-clock mr-1"></i> 12:00 PM - 2:00 PM</p>
                <p><i class="fas fa-utensils mr-1"></i> Nigerian Cuisine</p>
                <p><i class="fas fa-glass-whiskey mr-1"></i> Soft drinks included</p>
              </div>
            </div>

            <!-- Dinner -->
            <div class="bg-white rounded-lg p-6 border-2 border-transparent hover:border-purple-300 transition-colors duration-200">
              <div class="flex items-center mb-4">
                <input type="checkbox" id="dinner" name="dinner" class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                <label for="dinner" class="ml-3 text-lg font-semibold text-gray-800 flex items-center">
                  <i class="fas fa-moon text-purple-500 mr-2"></i>
                  Dinner
                </label>
              </div>
              <div class="text-sm text-gray-600 space-y-1">
                <p><i class="fas fa-clock mr-1"></i> 6:00 PM - 8:00 PM</p>
                <p><i class="fas fa-utensils mr-1"></i> International & Local</p>
                <p><i class="fas fa-glass-whiskey mr-1"></i> Beverages included</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Special Dietary Requirements -->
        <div>
          <label for="dietary_requirements" class="block text-sm font-semibold text-gray-700 mb-2">
            Special Dietary Requirements
          </label>
          <textarea id="dietary_requirements" name="dietary_requirements" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200"
                    placeholder="Please specify any allergies, dietary restrictions, or special requirements..."></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center">
          <button type="submit" 
                  class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center">
            <i class="fas fa-paper-plane mr-2"></i>
            Submit Meal Booking
          </button>
        </div>
      </form>
    </div>

    <!-- Recent Bookings Preview -->
    <div class="mt-12 bg-white rounded-2xl shadow-xl p-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Recent Bookings</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3">Date</th>
              <th scope="col" class="px-6 py-3">Volunteer</th>
              <th scope="col" class="px-6 py-3">Breakfast</th>
              <th scope="col" class="px-6 py-3">Lunch</th>
              <th scope="col" class="px-6 py-3">Dinner</th>
              <th scope="col" class="px-6 py-3">Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- Sample data - in real app this would come from database -->
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4 font-medium text-gray-900">August 12, 2025</td>
              <td class="px-6 py-4">John Doe</td>
              <td class="px-6 py-4"><i class="fas fa-check text-green-500"></i></td>
              <td class="px-6 py-4"><i class="fas fa-check text-green-500"></i></td>
              <td class="px-6 py-4"><i class="fas fa-times text-red-500"></i></td>
              <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Confirmed</span></td>
            </tr>
            <tr class="bg-white border-b hover:bg-gray-50">
              <td class="px-6 py-4 font-medium text-gray-900">August 13, 2025</td>
              <td class="px-6 py-4">Jane Smith</td>
              <td class="px-6 py-4"><i class="fas fa-check text-green-500"></i></td>
              <td class="px-6 py-4"><i class="fas fa-check text-green-500"></i></td>
              <td class="px-6 py-4"><i class="fas fa-check text-green-500"></i></td>
              <td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
// Form validation and enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const dateSelect = document.getElementById('selected_date');
    const mealCheckboxes = document.querySelectorAll('input[type="checkbox"]');
    
    // Ensure at least one meal is selected
    form.addEventListener('submit', function(e) {
        const checkedMeals = document.querySelectorAll('input[type="checkbox"]:checked');
        if (checkedMeals.length === 0) {
            e.preventDefault();
            alert('Please select at least one meal for the day.');
            return false;
        }
    });
    
    // Add visual feedback for meal selection
    mealCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const card = this.closest('.bg-white');
            if (this.checked) {
                card.classList.add('ring-2', 'ring-green-500');
            } else {
                card.classList.remove('ring-2', 'ring-green-500');
            }
        });
    });
    
    // Date validation - prevent booking for past dates
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    Array.from(dateSelect.options).forEach(option => {
        if (option.value) {
            const optionDate = new Date(option.value);
            if (optionDate < today) {
                option.disabled = true;
                option.textContent += ' (Past)';
            }
        }
    });
});
</script>
