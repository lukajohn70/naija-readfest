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
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow">Track Our Guinness World Record Journey</h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">
        <i class="fas fa-clock"></i>
        Live Progress Tracking
      </span>
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold border border-white/20">
        <i class="fas fa-trophy"></i>
        GWR Official Attempt
      </span>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 py-12">
  <!-- Main Progress Tracker -->
  <div class="max-w-6xl mx-auto mb-12">
    <?php include 'marathon-progress.php'; ?>
  </div>
  
  <!-- Detailed Statistics -->
  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <?php
    $marathonStartTime = strtotime('2025-08-12 19:08:00'); // August 12, 2025 at 7:08 PM
    $currentTime = time();
    $targetDuration = 424 * 3600;
    $elapsedSeconds = $currentTime - $marathonStartTime;
    $elapsedHours = floor($elapsedSeconds / 3600);
    $elapsedDays = floor($elapsedHours / 24);
    $progressPercentage = min(100, ($elapsedSeconds / $targetDuration) * 100);
    $remainingHours = max(0, 424 - $elapsedHours);
    $remainingDays = floor($remainingHours / 24);
    
    // Progress analysis based on provided timestamps
    $timestamp1 = '139:52:07'; // 3:00 PM
    $timestamp2 = '140:27:07'; // 3:35 PM
    $timeDifference = 35; // minutes
    ?>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-green-600 mb-2"><?= $elapsedDays ?></div>
      <div class="text-gray-600">Days Completed</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-blue-600 mb-2"><?= $elapsedHours ?></div>
      <div class="text-gray-600">Hours Read</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-yellow-600 mb-2"><?= number_format($progressPercentage, 1) ?>%</div>
      <div class="text-gray-600">Progress</div>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-6 text-center">
      <div class="text-3xl font-bold text-red-600 mb-2"><?= $remainingDays ?></div>
      <div class="text-gray-600">Days Remaining</div>
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
        <h3 class="text-xl font-semibold text-blue-700 mb-4">Upcoming Milestones</h3>
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
              <i class="fas fa-clock text-blue-600"></i>
            </div>
            <div>
              <div class="font-semibold">168 Hours (1 Week)</div>
              <div class="text-sm text-gray-600">August 19, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
              <i class="fas fa-clock text-blue-600"></i>
            </div>
            <div>
              <div class="font-semibold">336 Hours (2 Weeks)</div>
              <div class="text-sm text-gray-600">August 26, 2025 at 12:00 AM</div>
            </div>
          </div>
          
          <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
              <i class="fas fa-trophy text-yellow-600"></i>
            </div>
            <div>
              <div class="font-semibold">424 Hours (Target)</div>
              <div class="text-sm text-gray-600">August 30, 2025 at 12:00 AM</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Progress Analysis -->
  <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-xl p-8 text-white mb-8">
    <h2 class="text-3xl font-bold mb-6 text-center">Progress Analysis</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div>
        <h3 class="text-xl font-semibold mb-4">Real-Time Progress Tracking</h3>
        <div class="space-y-3">
          <div class="flex justify-between">
            <span>Start Time:</span>
            <span class="font-bold">Aug 12, 7:08 PM</span>
          </div>
          <div class="flex justify-between">
            <span>3:00 PM (Aug 18):</span>
            <span class="font-bold">139:52:07</span>
          </div>
          <div class="flex justify-between">
            <span>3:35 PM (Aug 18):</span>
            <span class="font-bold">140:27:07</span>
          </div>
          <div class="flex justify-between border-t border-blue-400 pt-2">
            <span>Progress Increase:</span>
            <span class="font-bold text-yellow-300">35 minutes</span>
          </div>
          <div class="flex justify-between">
            <span>Current Status:</span>
            <span class="font-bold text-green-300">Real-time progression</span>
          </div>
        </div>
      </div>
      <div>
        <h3 class="text-xl font-semibold mb-4">Current Statistics</h3>
        <div class="space-y-3">
          <div class="flex justify-between">
            <span>Total Hours Read:</span>
            <span class="font-bold"><?= number_format($elapsedHours + ($elapsedSeconds % 3600) / 3600, 2) ?></span>
          </div>
          <div class="flex justify-between">
            <span>Progress Percentage:</span>
            <span class="font-bold"><?= number_format($progressPercentage, 1) ?>%</span>
          </div>
          <div class="flex justify-between">
            <span>Hours Remaining:</span>
            <span class="font-bold"><?= number_format($remainingHours, 1) ?></span>
          </div>
          <div class="flex justify-between">
            <span>Days Remaining:</span>
            <span class="font-bold"><?= $remainingDays ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Live Stream Section -->
  <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-2xl shadow-xl p-8 text-white text-center">
    <h2 class="text-3xl font-bold mb-4">Watch the Marathon Live!</h2>
    <p class="text-xl mb-6">Don't miss a moment of this historic Guinness World Record attempt</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="https://youtube.com/@nigeriareads5491/live" target="_blank" rel="noopener noreferrer" 
         class="bg-white text-red-600 font-bold px-8 py-4 rounded-full text-lg hover:bg-gray-100 transition-colors duration-200 flex items-center justify-center gap-2">
        <i class="fab fa-youtube"></i>
        Watch on YouTube
      </a>
      <a href="index.php?page=live-stream" 
         class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full text-lg hover:bg-white hover:text-red-600 transition-colors duration-200">
        View Live Stream Page
      </a>
    </div>
  </div>
</div>
