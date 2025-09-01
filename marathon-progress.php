<?php
// Set timezone to Nigeria (Africa/Lagos)
date_default_timezone_set('Africa/Lagos');

// Marathon Progress Tracker Component - Completed Version
// The marathon has been completed successfully

$marathonStartTime = strtotime('2025-08-12 19:08:00'); // August 12, 2025 at 7:08 PM
$marathonEndTime = strtotime('2025-08-30 19:08:00'); // August 30, 2025 at 7:08 PM
$targetDuration = 424 * 3600; // 424 hours in seconds
$totalDays = 18;
$totalHours = 424;
$progressPercentage = 100;
?>

<!-- Completed Marathon - Celebration Version -->
<div class="marathon-progress-container bg-gradient-to-r from-green-600 to-green-700 rounded-2xl shadow-lg p-6 text-white border-2 border-green-400">
  <div class="text-center">
    <div class="flex items-center justify-center space-x-2 mb-3">
      <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
      <h2 class="text-2xl font-bold">🎉 MARATHON COMPLETED! 🎉</h2>
      <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
    </div>
    <p class="text-green-200 text-lg mb-4">Guinness World Record Reading Marathon - AWAITING CERTIFICATION</p>
    
    <!-- Achievement Display -->
    <div class="bg-white/20 rounded-xl p-6 mb-4">
      <div class="text-4xl font-bold text-yellow-300 mb-2">424 Hours</div>
      <div class="text-lg text-green-200">of continuous reading completed!</div>
      <div class="text-sm text-green-100 mt-2">August 12 - 30, 2025</div>
    </div>
    
    <!-- Final Statistics -->
    <div class="grid grid-cols-2 gap-4 mt-4">
      <div class="bg-white/10 rounded-lg p-3">
        <div class="text-lg font-bold text-yellow-300">18 Days</div>
        <div class="text-xs text-green-200">Duration</div>
      </div>
      <div class="bg-white/10 rounded-lg p-3">
        <div class="text-lg font-bold text-yellow-300">100%</div>
        <div class="text-xs text-green-200">Completed</div>
      </div>
    </div>
    
    <!-- Celebration Message -->
    <div class="mt-6 bg-yellow-400 text-green-800 px-4 py-2 rounded-full text-sm font-bold">
      ⏳ CERTIFICATION PENDING
    </div>
  </div>
</div>
