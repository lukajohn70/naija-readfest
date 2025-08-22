<?php
// Set timezone to Nigeria (Africa/Lagos)
date_default_timezone_set('Africa/Lagos');

// Marathon Progress Tracker Component
// Calculate progress based on start time and current time

$marathonStartTime = strtotime('2025-08-12 19:08:00'); // August 12, 2025 at 7:08 PM
$currentTime = time();
$targetDuration = 424 * 3600; // 424 hours in seconds

// Calculate elapsed time
$elapsedSeconds = $currentTime - $marathonStartTime;
$elapsedHours = floor($elapsedSeconds / 3600);
$elapsedMinutes = floor(($elapsedSeconds % 3600) / 60);
$elapsedSecs = $elapsedSeconds % 60;
$elapsedDays = floor($elapsedHours / 24);
$elapsedHoursRemaining = $elapsedHours % 24;

// Calculate remaining time
$remainingSeconds = max(0, $targetDuration - $elapsedSeconds);
$remainingHours = floor($remainingSeconds / 3600);
$remainingMinutes = floor(($remainingSeconds % 3600) / 60);
$remainingSecs = $remainingSeconds % 60;
$remainingDays = floor($remainingHours / 24);
$remainingHoursRemaining = $remainingHours % 24;

// Calculate progress percentage
$progressPercentage = min(100, ($elapsedSeconds / $targetDuration) * 100);

// Determine marathon status
$isActive = $currentTime >= $marathonStartTime && $currentTime < ($marathonStartTime + $targetDuration);
$isCompleted = $currentTime >= ($marathonStartTime + $targetDuration);
$isUpcoming = $currentTime < $marathonStartTime;

// Analysis based on provided timestamps:
// Start time: August 12, 2025 at 7:08 PM
// 3:00 PM (Aug 18): 139:52:07 (139.87 hours)
// 3:35 PM (Aug 18): 140:27:07 (140.45 hours)
// Progress increase: 35 minutes in 35 minutes = real-time progression
// Current progress: 140.45 hours = 33.1% of 424 hours
?>

<?php if ($isActive): ?>
  <!-- Active Marathon Progress -->
  <div class="marathon-progress-container bg-gradient-to-br from-green-600 via-green-700 to-green-800 rounded-3xl shadow-2xl p-4 md:p-8 text-white border-4 border-green-400">
    <!-- Header -->
    <div class="text-center mb-6 md:mb-8">
      <div class="flex items-center justify-center space-x-2 md:space-x-3 mb-4">
        <div class="w-2 h-2 md:w-3 md:h-3 bg-red-500 rounded-full animate-pulse"></div>
        <h2 class="text-xl md:text-3xl font-bold">LIVE MARATHON IN PROGRESS</h2>
        <div class="w-2 h-2 md:w-3 md:h-3 bg-red-500 rounded-full animate-pulse"></div>
      </div>
      <p class="text-green-200 text-sm md:text-lg">Guinness World Record Reading Marathon</p>
    </div>

    <!-- Main Timer Display -->
    <div class="grid md:grid-cols-2 gap-4 md:gap-8 mb-6 md:mb-8">
      <!-- Elapsed Time -->
      <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-white/20">
        <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-center text-green-200">Time Elapsed</h3>
        <div class="grid grid-cols-4 gap-2 md:gap-4 text-center">
          <div class="bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl p-2 md:p-4 border-2 border-yellow-300 shadow-lg">
            <div class="text-2xl md:text-4xl font-bold text-gray-800" id="elapsed-days"><?= $elapsedDays ?></div>
            <div class="text-xs md:text-sm font-semibold text-gray-700">Days</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="elapsed-hours"><?= str_pad($elapsedHours, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Hours</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="elapsed-minutes"><?= str_pad($elapsedMinutes, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Minutes</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="elapsed-seconds"><?= str_pad($elapsedSecs, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Seconds</div>
          </div>
        </div>
      </div>

      <!-- Remaining Time -->
      <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 md:p-6 border border-white/20">
        <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4 text-center text-green-200">Time Remaining</h3>
        <div class="grid grid-cols-4 gap-2 md:gap-4 text-center">
          <div class="bg-gradient-to-br from-red-400 to-red-500 rounded-xl p-2 md:p-4 border-2 border-red-300 shadow-lg">
            <div class="text-2xl md:text-4xl font-bold text-white" id="remaining-days"><?= $remainingDays ?></div>
            <div class="text-xs md:text-sm font-semibold text-red-100">Days</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="remaining-hours"><?= str_pad($remainingHours, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Hours</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="remaining-minutes"><?= str_pad($remainingMinutes, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Minutes</div>
          </div>
          <div class="bg-white/20 rounded-xl p-2 md:p-4">
            <div class="text-2xl md:text-3xl font-bold text-white" id="remaining-seconds"><?= str_pad($remainingSecs, 2, '0', STR_PAD_LEFT) ?></div>
            <div class="text-xs md:text-sm text-green-200">Seconds</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Progress Bar -->
    <div class="mb-8">
      <div class="flex justify-between text-sm mb-3">
        <span class="text-green-200">Start: Aug 12, 2025 at 7:08 PM (WAT)</span>
        <span class="text-green-200">Target: 424 hours</span>
      </div>
      <div class="w-full bg-white/20 rounded-full h-6 overflow-hidden backdrop-blur-sm">
        <div class="bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 h-6 rounded-full transition-all duration-1000 ease-out shadow-lg" 
             style="width: <?= $progressPercentage ?>%">
          <div class="h-full bg-gradient-to-r from-transparent via-white/30 to-transparent animate-pulse"></div>
        </div>
      </div>
             <div class="flex justify-between text-sm mt-2">
         <span class="text-green-200">Progress</span>
         <span class="text-yellow-300 font-bold text-lg" id="progress-percentage"><?= number_format($progressPercentage, 1) ?>%</span>
       </div>
    </div>

    <!-- Live Stream Link -->
    <div class="text-center">
      <a href="https://youtube.com/@nigeriareads5491/live" target="_blank" rel="noopener noreferrer" 
         class="inline-flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-full text-lg shadow-lg border-2 border-white/20 transition-all duration-200 hover:scale-105">
        <i class="fas fa-play-circle text-xl"></i>
        <span>WATCH LIVE STREAM</span>
      </a>
    </div>
  </div>

<?php elseif ($isCompleted): ?>
  <!-- Completed Marathon -->
  <div class="marathon-progress-container bg-gradient-to-br from-yellow-500 via-yellow-600 to-yellow-700 rounded-3xl shadow-2xl p-8 text-white border-4 border-yellow-400">
    <div class="text-center">
      <div class="text-6xl mb-4">🏆</div>
      <h2 class="text-4xl font-bold mb-4">MARATHON COMPLETED!</h2>
      <p class="text-yellow-200 text-xl mb-6">Congratulations! The Guinness World Record attempt has been completed.</p>
      <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
        <div class="text-2xl font-bold">Total Time: 424 Hours</div>
        <div class="text-yellow-200">August 12 - 30, 2025</div>
      </div>
    </div>
  </div>

<?php else: ?>
  <!-- Upcoming Marathon -->
  <div class="marathon-progress-container bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800 rounded-3xl shadow-2xl p-8 text-white border-4 border-blue-400">
    <div class="text-center">
      <div class="text-6xl mb-4">⏰</div>
      <h2 class="text-4xl font-bold mb-4">MARATHON STARTING SOON</h2>
      <p class="text-blue-200 text-xl mb-6">Get ready for the Guinness World Record Reading Marathon</p>
      
      <!-- Countdown Timer -->
      <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20 mb-6">
        <h3 class="text-xl font-semibold mb-4">Countdown to Start</h3>
        <div class="grid grid-cols-4 gap-4 text-center">
          <div class="bg-white/20 rounded-xl p-4">
            <div class="text-3xl font-bold text-white" id="countdown-days">--</div>
            <div class="text-sm text-blue-200">Days</div>
          </div>
          <div class="bg-white/20 rounded-xl p-4">
            <div class="text-3xl font-bold text-white" id="countdown-hours">--</div>
            <div class="text-sm text-blue-200">Hours</div>
          </div>
          <div class="bg-white/20 rounded-xl p-4">
            <div class="text-3xl font-bold text-white" id="countdown-minutes">--</div>
            <div class="text-sm text-blue-200">Minutes</div>
          </div>
          <div class="bg-white/20 rounded-xl p-4">
            <div class="text-3xl font-bold text-white" id="countdown-seconds">--</div>
            <div class="text-sm text-blue-200">Seconds</div>
          </div>
        </div>
      </div>
      
      <div class="text-lg mb-6">August 12, 2025 at 7:08 PM (WAT)</div>
      <div class="bg-blue-600 px-8 py-4 rounded-full inline-block border-2 border-white/20">
        <span class="font-bold text-xl">Get Ready!</span>
      </div>
    </div>
  </div>
<?php endif; ?>

<script>
// Live timer update for active marathon
<?php if ($isActive): ?>
function updateTimer() {
    const startTime = <?= $marathonStartTime ?> * 1000; // Convert to milliseconds
    const targetDuration = <?= $targetDuration ?> * 1000;
    const now = Date.now();
    
    if (now >= startTime && now < (startTime + targetDuration)) {
        const elapsed = now - startTime;
        const remaining = (startTime + targetDuration) - now;
        
                 // Update elapsed time
         const elapsedDays = Math.floor(elapsed / (1000 * 60 * 60 * 24));
         const elapsedHours = Math.floor(elapsed / (1000 * 60 * 60)); // Total cumulative hours
         const elapsedMinutes = Math.floor((elapsed % (1000 * 60 * 60)) / (1000 * 60));
         const elapsedSeconds = Math.floor((elapsed % (1000 * 60)) / 1000);
         
         // Update remaining time
         const remainingDays = Math.floor(remaining / (1000 * 60 * 60 * 24));
         const remainingHours = Math.floor(remaining / (1000 * 60 * 60)); // Total remaining hours
         const remainingMinutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
         const remainingSeconds = Math.floor((remaining % (1000 * 60)) / 1000);
        
                 // Update progress percentage
         const progressPercentage = Math.min(100, (elapsed / targetDuration) * 100);
         
         // Update elapsed time elements
         const elapsedDaysEl = document.getElementById('elapsed-days');
         const elapsedHoursEl = document.getElementById('elapsed-hours');
         const elapsedMinutesEl = document.getElementById('elapsed-minutes');
         const elapsedSecondsEl = document.getElementById('elapsed-seconds');
         
         if (elapsedDaysEl) elapsedDaysEl.textContent = elapsedDays;
         if (elapsedHoursEl) elapsedHoursEl.textContent = elapsedHours.toString().padStart(2, '0');
         if (elapsedMinutesEl) elapsedMinutesEl.textContent = elapsedMinutes.toString().padStart(2, '0');
         if (elapsedSecondsEl) elapsedSecondsEl.textContent = elapsedSeconds.toString().padStart(2, '0');
         
         // Update remaining time elements
         const remainingDaysEl = document.getElementById('remaining-days');
         const remainingHoursEl = document.getElementById('remaining-hours');
         const remainingMinutesEl = document.getElementById('remaining-minutes');
         const remainingSecondsEl = document.getElementById('remaining-seconds');
         
         if (remainingDaysEl) remainingDaysEl.textContent = remainingDays;
         if (remainingHoursEl) remainingHoursEl.textContent = remainingHours.toString().padStart(2, '0');
         if (remainingMinutesEl) remainingMinutesEl.textContent = remainingMinutes.toString().padStart(2, '0');
         if (remainingSecondsEl) remainingSecondsEl.textContent = remainingSeconds.toString().padStart(2, '0');
         
         // Update progress bar and percentage
         const progressBar = document.querySelector('.marathon-progress-container .bg-gradient-to-r');
         if (progressBar) {
             progressBar.style.width = progressPercentage + '%';
         }
         
         const progressText = document.getElementById('progress-percentage');
         if (progressText) {
             progressText.textContent = progressPercentage.toFixed(1) + '%';
         }
    }
}

// Update timer every second
setInterval(updateTimer, 1000);
updateTimer(); // Initial call

<?php elseif ($isUpcoming): ?>
// Countdown timer for upcoming marathon
function updateCountdown() {
    const startTime = <?= $marathonStartTime ?> * 1000;
    const now = Date.now();
    const timeLeft = startTime - now;
    
    if (timeLeft > 0) {
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);
        
        document.getElementById('countdown-days').textContent = days.toString().padStart(2, '0');
        document.getElementById('countdown-hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('countdown-minutes').textContent = minutes.toString().padStart(2, '0');
        document.getElementById('countdown-seconds').textContent = seconds.toString().padStart(2, '0');
    } else {
        // Marathon has started, reload page to show active timer
        location.reload();
    }
}

// Update countdown every second
setInterval(updateCountdown, 1000);
updateCountdown(); // Initial call
<?php endif; ?>
</script>
