<?php
// Volunteer Profile System for Naija ReadFest
// Session and redirects are now handled in index.php

// Get variables from index.php
$isLoggedIn = isset($_SESSION['volunteer_id']);
$redirectedFromMeals = isset($_GET['from']) && $_GET['from'] === 'meals';

// Initialize message variables
$message = '';
$messageType = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'register':
                // Handle volunteer registration
                $name = $_POST['name'] ?? '';
                $email = $_POST['email'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $role = $_POST['role'] ?? '';
                
                if ($name && $email && $role) {
                    // In a real application, you would save this to a database
                    $_SESSION['volunteer_id'] = uniqid();
                    $_SESSION['volunteer_name'] = $name;
                    $_SESSION['volunteer_email'] = $email;
                    $_SESSION['volunteer_phone'] = $phone;
                    $_SESSION['volunteer_role'] = $role;
                    
                    $message = "Profile created successfully! You can now book your meals.";
                    $messageType = 'success';
                } else {
                    $message = "Please fill in all required fields.";
                    $messageType = 'error';
                }
                break;
                
            case 'update_profile':
                // Handle profile updates
                $name = $_POST['name'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $role = $_POST['role'] ?? '';
                
                if ($name && $role) {
                    $_SESSION['volunteer_name'] = $name;
                    $_SESSION['volunteer_phone'] = $phone;
                    $_SESSION['volunteer_role'] = $role;
                    
                    $message = "Profile updated successfully!";
                    $messageType = 'success';
                } else {
                    $message = "Please fill in all required fields.";
                    $messageType = 'error';
                }
                break;
        }
    }
}
?>

<div class="w-full mt-10 mb-16 shadow-xl overflow-hidden" style="min-height: 420px;">
  <div class="w-full h-full flex flex-col items-center justify-center py-16 px-4" style="background: linear-gradient(90deg, #29984A 0%, #232d23 50%, #C0392B 100%);">
    <div class="flex flex-row items-center justify-center space-x-6 mb-6">
      <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-white text-center mb-2 drop-shadow">Volunteer Profile</h1>
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow">
      <?= $redirectedFromMeals ? 'Create your profile to access meal booking' : 'Manage your volunteer information and meal bookings' ?>
    </h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">
        <i class="fas fa-user-circle"></i>
        Personal Profile
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

    <?php if (!$isLoggedIn): ?>
      <!-- Registration Form -->
      <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Volunteer Registration</h2>
        <p class="text-gray-600 text-center mb-8">Create your volunteer profile to access meal booking and other volunteer services.</p>
        
        <form method="POST" class="space-y-6">
          <input type="hidden" name="action" value="register">
          
          <!-- Personal Information -->
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                Full Name <span class="text-red-500">*</span>
              </label>
              <input type="text" id="name" name="name" required
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200"
                     placeholder="Enter your full name">
            </div>
            
            <div>
              <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                Email Address <span class="text-red-500">*</span>
              </label>
              <input type="email" id="email" name="email" required
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200"
                     placeholder="Enter your email">
            </div>
            
            <div>
              <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                Phone Number
              </label>
              <input type="tel" id="phone" name="phone"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200"
                     placeholder="Enter your phone number">
            </div>
            
            <div>
              <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                Role <span class="text-red-500">*</span>
              </label>
              <select id="role" name="role" required
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200">
                <option value="">Select your role</option>
                <option value="media">Media</option>
                <option value="marathoner">Marathoner</option>
                <option value="independent_witness">Independent Witness</option>
                <option value="timekeeper">Timekeeper</option>
                <option value="management">Management</option>
                <option value="medical">Medical</option>
              </select>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-center">
            <button type="submit" 
                    class="bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 flex items-center">
              <i class="fas fa-user-plus mr-2"></i>
              Create Volunteer Profile
            </button>
          </div>
        </form>
      </div>

    <?php else: ?>
      <!-- Profile Dashboard -->
      <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Profile Information -->
        <div class="md:col-span-2">
          <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <div class="flex items-center justify-between mb-6">
              <h2 class="text-3xl font-bold text-gray-800">Welcome, <?= htmlspecialchars($_SESSION['volunteer_name']) ?>!</h2>
              <a href="index.php?page=volunteer-meals" 
                 class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 flex items-center">
                <i class="fas fa-utensils mr-2"></i>
                Book Meals
              </a>
            </div>
            
            <!-- Profile Details -->
            <div class="bg-gray-50 rounded-lg p-6 mb-6">
              <h3 class="font-semibold text-gray-800 mb-4">Personal Information</h3>
              <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div>
                  <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['volunteer_name']) ?></p>
                  <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['volunteer_email']) ?></p>
                </div>
                <div>
                  <p><strong>Phone:</strong> <?= htmlspecialchars($_SESSION['volunteer_phone'] ?? 'Not provided') ?></p>
                  <p><strong>Role:</strong> <?= htmlspecialchars(ucwords(str_replace('_', ' ', $_SESSION['volunteer_role'] ?? 'Not selected'))) ?></p>
                </div>
              </div>
            </div>
            
            <!-- Edit Profile Button -->
            <button onclick="toggleEditForm()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 flex items-center">
              <i class="fas fa-edit mr-2"></i>
              Edit Profile
            </button>
          </div>
          
          <!-- Edit Profile Form (Hidden by default) -->
          <div id="editProfileForm" class="bg-white rounded-2xl shadow-xl p-8 mb-8" style="display: none;">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Edit Profile</h3>
            
            <form method="POST" class="space-y-6">
              <input type="hidden" name="action" value="update_profile">
              
              <div class="grid md:grid-cols-2 gap-6">
                <div>
                  <label for="edit_name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Full Name <span class="text-red-500">*</span>
                  </label>
                  <input type="text" id="edit_name" name="name" required
                         value="<?= htmlspecialchars($_SESSION['volunteer_name']) ?>"
                         class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200">
                </div>
                
                <div>
                  <label for="edit_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                    Phone Number
                  </label>
                  <input type="tel" id="edit_phone" name="phone"
                         value="<?= htmlspecialchars($_SESSION['volunteer_phone'] ?? '') ?>"
                         class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200">
                </div>
                
                <div>
                  <label for="edit_role" class="block text-sm font-semibold text-gray-700 mb-2">
                    Role <span class="text-red-500">*</span>
                  </label>
                  <select id="edit_role" name="role" required
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-200">
                    <option value="">Select your role</option>
                    <option value="media" <?= ($_SESSION['volunteer_role'] ?? '') === 'media' ? 'selected' : '' ?>>Media</option>
                    <option value="marathoner" <?= ($_SESSION['volunteer_role'] ?? '') === 'marathoner' ? 'selected' : '' ?>>Marathoner</option>
                    <option value="independent_witness" <?= ($_SESSION['volunteer_role'] ?? '') === 'independent_witness' ? 'selected' : '' ?>>Independent Witness</option>
                    <option value="timekeeper" <?= ($_SESSION['volunteer_role'] ?? '') === 'timekeeper' ? 'selected' : '' ?>>Timekeeper</option>
                    <option value="management" <?= ($_SESSION['volunteer_role'] ?? '') === 'management' ? 'selected' : '' ?>>Management</option>
                    <option value="medical" <?= ($_SESSION['volunteer_role'] ?? '') === 'medical' ? 'selected' : '' ?>>Medical</option>
                  </select>
                </div>
              </div>

              <div class="flex justify-center space-x-4">
                <button type="submit" 
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200 flex items-center">
                  <i class="fas fa-save mr-2"></i>
                  Save Changes
                </button>
                <button type="button" onclick="toggleEditForm()"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
        
        <!-- Quick Actions Sidebar -->
        <div class="space-y-6">
          <!-- Quick Actions -->
          <div class="bg-white rounded-2xl shadow-xl p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-3">
              <a href="index.php?page=volunteer-meals" 
                 class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-utensils text-green-600 mr-3"></i>
                <span class="font-semibold text-gray-800">Book Meals</span>
              </a>
              <a href="index.php?page=schedule" 
                 class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-calendar text-blue-600 mr-3"></i>
                <span class="font-semibold text-gray-800">View Schedule</span>
              </a>
              <a href="index.php?page=contact" 
                 class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors duration-200">
                <i class="fas fa-envelope text-purple-600 mr-3"></i>
                <span class="font-semibold text-gray-800">Contact Support</span>
              </a>
            </div>
          </div>
          
          <!-- Volunteer ID Card -->
          <div class="bg-white rounded-2xl shadow-xl p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Volunteer ID</h3>
            <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg p-4 text-white text-center">
              <div class="text-2xl font-bold mb-2"><?= substr($_SESSION['volunteer_id'], 0, 8) ?></div>
              <div class="text-sm opacity-90">Volunteer ID</div>
            </div>
            <p class="text-xs text-gray-500 mt-3 text-center">Keep this ID for reference during the event</p>
          </div>
          
          <!-- Logout -->
          <div class="bg-white rounded-2xl shadow-xl p-6">
            <form method="POST" action="?action=logout">
              <button type="submit" 
                      class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-3 rounded-lg transition-colors duration-200 flex items-center justify-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                Logout
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<script>
function toggleEditForm() {
    const form = document.getElementById('editProfileForm');
    if (form.style.display === 'none') {
        form.style.display = 'block';
        form.scrollIntoView({ behavior: 'smooth' });
    } else {
        form.style.display = 'none';
    }
}

// Auto-hide success messages after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const messages = document.querySelectorAll('.bg-green-100, .bg-red-100');
    messages.forEach(function(message) {
        setTimeout(function() {
            message.style.opacity = '0';
            setTimeout(function() {
                message.remove();
            }, 300);
        }, 5000);
    });
});
</script>
