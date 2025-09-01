<?php 
// Set timezone to Nigeria (Africa/Lagos)
date_default_timezone_set('Africa/Lagos');

// Progress page for Naija ReadFest PHP version 
?>
<div class="w-full mt-10 mb-16 shadow-xl overflow-hidden" style="min-height: 420px;">
  <div class="w-full h-full flex flex-col items-center justify-center py-16 px-4" style="background: linear-gradient(90deg, #29984A 0%, #232d23 50%, #C0392B 100%);">
    <div class="flex flex-row items-center justify-center space-x-6 mb-6">
      <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-white text-center mb-2 drop-shadow">Marathon Progress</h1>
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow">Our Completed Guinness World Record Journey</h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-green-600 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">
        <i class="fas fa-trophy"></i>
        ⏳ CERTIFICATION PENDING
      </span>
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold border border-white/20">
        <i class="fas fa-check-circle"></i>
        GWR Official Attempt Completed
      </span>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 py-12">
  <!-- Main Progress Tracker -->
  <div class="max-w-6xl mx-auto mb-12">
    <?php include 'marathon-progress.php'; ?>
  </div>
  
  <!-- Final Statistics -->
  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <?php
    $marathonStartTime = strtotime('2025-08-12 19:08:00'); // August 12, 2025 at 7:08 PM
    $marathonEndTime = strtotime('2025-08-30 19:08:00'); // August 30, 2025 at 7:08 PM
    $targetDuration = 424 * 3600;
    $totalDays = 18;
    $totalHours = 424;
    $progressPercentage = 100;
    ?>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-green-600 mb-2"><?= $totalDays ?></div>
      <div class="text-gray-600">Days Completed</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-blue-600 mb-2"><?= $totalHours ?></div>
      <div class="text-gray-600">Hours Read</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-yellow-600 mb-2"><?= number_format($progressPercentage, 1) ?>%</div>
      <div class="text-gray-600">Progress</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-green-600 mb-2">🎉</div>
      <div class="text-gray-600">Mission Accomplished</div>
    </div>
  </div>
  
  <!-- Milestones -->
  <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Marathon Milestones</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div>
        <h3 class="text-xl font-semibold text-green-700 mb-4">Completed Milestones</h3>
        <div class="space-y-4">
                     <div class="flex items-center gap-3">
             <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
               <i class="fas fa-check text-green-600"></i>
             </div>
             <div>
               <div class="font-semibold">Day 1 - Marathon Begins</div>
               <div class="text-sm text-gray-600">August 12, 2025 at 7:08 PM</div>
             </div>
           </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">24 Hours Completed</div>
              <div class="text-sm text-gray-600">August 13, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">48 Hours Completed</div>
              <div class="text-sm text-gray-600">August 14, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">72 Hours Completed</div>
              <div class="text-sm text-gray-600">August 15, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">96 Hours Completed</div>
              <div class="text-sm text-gray-600">August 16, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">120 Hours Completed</div>
              <div class="text-sm text-gray-600">August 17, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">144 Hours Completed</div>
              <div class="text-sm text-gray-600">August 18, 2025 at 12:00 AM</div>
            </div>
          </div>
        </div>
      </div>
      
      <div>
        <h3 class="text-xl font-semibold text-green-700 mb-4">Final Milestones</h3>
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">168 Hours (1 Week)</div>
              <div class="text-sm text-gray-600">August 19, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">336 Hours (2 Weeks)</div>
              <div class="text-sm text-gray-600">August 26, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
              <i class="fas fa-trophy text-green-600"></i>
            </div>
            <div>
              <div class="font-semibold">424 Hours (Target)</div>
              <div class="text-sm text-gray-600">August 30, 2025 at 7:08 PM</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Final Statistics -->
  <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl shadow-xl p-8 text-white mb-8">
    <h2 class="text-3xl font-bold mb-6 text-center">Final Statistics</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div>
        <h3 class="text-xl font-semibold mb-4">Marathon Summary</h3>
        <div class="space-y-3">
          <div class="flex justify-between">
            <span>Start Time:</span>
            <span class="font-bold">Aug 12, 7:08 PM</span>
          </div>
          <div class="flex justify-between">
            <span>End Time:</span>
            <span class="font-bold">Aug 30, 7:08 PM</span>
          </div>
          <div class="flex justify-between">
            <span>Total Duration:</span>
            <span class="font-bold">424 Hours</span>
          </div>
          <div class="flex justify-between border-t border-green-400 pt-2">
            <span>Status:</span>
            <span class="font-bold text-yellow-300">COMPLETED SUCCESSFULLY</span>
          </div>
        </div>
      </div>
      <div>
        <h3 class="text-xl font-semibold mb-4">Achievement Summary</h3>
        <div class="space-y-3">
          <div class="flex justify-between">
            <span>Total Hours Read:</span>
            <span class="font-bold">424</span>
          </div>
          <div class="flex justify-between">
            <span>Progress Percentage:</span>
            <span class="font-bold">100%</span>
          </div>
          <div class="flex justify-between">
            <span>Days Completed:</span>
            <span class="font-bold">18</span>
          </div>
          <div class="flex justify-between">
            <span>Result:</span>
            <span class="font-bold text-green-300">WORLD RECORD ACHIEVED!</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Celebration Section -->
  <div class="bg-gradient-to-r from-yellow-600 to-yellow-700 rounded-2xl shadow-xl p-8 text-white text-center">
    <h2 class="text-3xl font-bold mb-4">🎉 Marathon Completed Successfully! 🎉</h2>
    <p class="text-xl mb-6">We successfully completed our historic Guinness World Record attempt for the Longest Marathon Reading Aloud by a Team. Currently awaiting Guinness World Records certification.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <div class="bg-white text-yellow-600 font-bold px-8 py-4 rounded-full text-lg flex items-center justify-center gap-2">
        <i class="fas fa-clock"></i>
        Certification Pending
      </div>
    </div>
  </div>
</div>
