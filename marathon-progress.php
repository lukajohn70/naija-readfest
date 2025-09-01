<?php
// Set timezone to Nigeria (Africa/Lagos)
date_default_timezone_set('Africa/Lagos');

// Marathon Progress Tracker Component - Compact Version
// Calculate progress based on start time and current time

$marathonStartTime = strtotime('2025-08-12 19:08:00'); // August 12, 2025 at 7:08 PM
$currentTime = time();
$targetDuration = 424 * 3600; // 424 hours in seconds

// Calculate elapsed time
$elapsedSeconds = $currentTime - $marathonStartTime;
$elapsedHours = floor($elapsedSeconds / 3600);
$elapsedMinutes = floor(($elapsedSeconds % 3600) / 60);
$elapsedDays = floor($elapsedHours / 24);
$elapsedHoursRemaining = $elapsedHours % 24;

// Calculate remaining time
$remainingSeconds = max(0, $targetDuration - $elapsedSeconds);
$remainingHours = floor($remainingSeconds / 3600);
$remainingDays = floor($remainingHours / 24);

// Calculate progress percentage
$progressPercentage = min(100, ($elapsedSeconds / $targetDuration) * 100);

// Determine marathon status
$isActive = $currentTime >= $marathonStartTime && $currentTime < ($marathonStartTime + $targetDuration);
$isCompleted = $currentTime >= ($marathonStartTime + $targetDuration);
$isUpcoming = $currentTime < $marathonStartTime;
?>

<?php if ($isActive): ?>
  <!-- Active Marathon Progress - Compact Version -->
  <div class="marathon-progress-container bg-gradient-to-r from-green-600 to-green-700 rounded-2xl shadow-lg p-6 text-white border-2 border-green-400">
    <!-- Header -->
    <div class="text-center mb-6">
      <div class="flex items-center justify-center space-x-2 mb-3">
        <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
        <h2 class="text-xl font-bold">LIVE MARATHON IN PROGRESS</h2>
        <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
      </div>
      <p class="text-green-200 text-sm">Guinness World Record Reading Marathon</p>
    </div>

    <!-- Progress Bar -->
    <div class="mb-6">
      <div class="flex justify-between text-sm mb-2">
        <span>Progress</span>
        <span><?= number_format($progressPercentage, 1) ?>%</span>
      </div>
      <div class="w-full bg-green-800 rounded-full h-3">
        <div class="bg-yellow-400 h-3 rounded-full transition-all duration-500" style="width: <?= $progressPercentage ?>%"></div>
      </div>
    </div>

    <!-- Time Display - Compact Grid -->
    <div class="grid grid-cols-2 gap-4">
      <!-- Elapsed Time -->
      <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
        <h3 class="text-sm font-semibold mb-3 text-center text-green-200">Time Elapsed</h3>
        <div class="text-center">
          <div class="text-2xl font-bold text-white"><?= $elapsedDays ?>d <?= str_pad($elapsedHoursRemaining, 2, '0', STR_PAD_LEFT) ?>h</div>
          <div class="text-xs text-green-200"><?= $elapsedHours ?> total hours</div>
        </div>
      </div>

      <!-- Remaining Time -->
      <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
        <h3 class="text-sm font-semibold mb-3 text-center text-green-200">Time Remaining</h3>
        <div class="text-center">
          <div class="text-2xl font-bold text-white"><?= $remainingDays ?>d <?= str_pad($remainingHours, 2, '0', STR_PAD_LEFT) ?>h</div>
          <div class="text-xs text-green-200"><?= $remainingHours ?> total hours</div>
        </div>
      </div>
    </div>
  </div>

<?php elseif ($isUpcoming): ?>
  <!-- Upcoming Marathon - Compact Version -->
  <div class="marathon-progress-container bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-lg p-6 text-white border-2 border-blue-400">
    <div class="text-center">
      <div class="flex items-center justify-center space-x-2 mb-3">
        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
        <h2 class="text-xl font-bold">MARATHON STARTING SOON</h2>
        <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse"></div>
      </div>
      <p class="text-blue-200 text-sm mb-4">Guinness World Record Reading Marathon</p>
      
      <!-- Countdown -->
      <div class="grid grid-cols-4 gap-3">
        <?php
        $timeUntilStart = $marathonStartTime - $currentTime;
        $daysUntil = floor($timeUntilStart / (24 * 3600));
        $hoursUntil = floor(($timeUntilStart % (24 * 3600)) / 3600);
        $minutesUntil = floor(($timeUntilStart % 3600) / 60);
        $secondsUntil = $timeUntilStart % 60;
        ?>
        <div class="bg-white/20 rounded-lg p-2">
          <div class="text-lg font-bold"><?= $daysUntil ?></div>
          <div class="text-xs">Days</div>
        </div>
        <div class="bg-white/20 rounded-lg p-2">
          <div class="text-lg font-bold"><?= str_pad($hoursUntil, 2, '0', STR_PAD_LEFT) ?></div>
          <div class="text-xs">Hours</div>
        </div>
        <div class="bg-white/20 rounded-lg p-2">
          <div class="text-lg font-bold"><?= str_pad($minutesUntil, 2, '0', STR_PAD_LEFT) ?></div>
          <div class="text-xs">Minutes</div>
        </div>
        <div class="bg-white/20 rounded-lg p-2">
          <div class="text-lg font-bold"><?= str_pad($secondsUntil, 2, '0', STR_PAD_LEFT) ?></div>
          <div class="text-xs">Seconds</div>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>
  <!-- Completed Marathon - Compact Version -->
  <div class="marathon-progress-container bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl shadow-lg p-6 text-white border-2 border-purple-400">
    <div class="text-center">
      <div class="flex items-center justify-center space-x-2 mb-3">
        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
        <h2 class="text-xl font-bold">MARATHON COMPLETED!</h2>
        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
      </div>
      <p class="text-purple-200 text-sm mb-4">Guinness World Record Reading Marathon</p>
      <div class="bg-white/20 rounded-xl p-4">
        <div class="text-2xl font-bold text-yellow-300">424 Hours</div>
        <div class="text-sm text-purple-200">of continuous reading completed!</div>
      </div>
    </div>
  </div>
<?php endif; ?>

<script>
// Update countdown every second for upcoming marathon
<?php if ($isUpcoming): ?>
function updateCountdown() {
  const target = <?= $marathonStartTime * 1000 ?>;
  const now = new Date().getTime();
  const diff = target - now;
  
  if (diff <= 0) {
    location.reload(); // Reload page when marathon starts
    return;
  }
  
  const days = Math.floor(diff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((diff % (1000 * 60)) / 1000);
  
  // Update countdown display
  const countdownElements = document.querySelectorAll('.marathon-progress-container .grid-cols-4 > div');
  if (countdownElements.length >= 4) {
    countdownElements[0].querySelector('.text-lg').textContent = days;
    countdownElements[1].querySelector('.text-lg').textContent = String(hours).padStart(2, '0');
    countdownElements[2].querySelector('.text-lg').textContent = String(minutes).padStart(2, '0');
    countdownElements[3].querySelector('.text-lg').textContent = String(seconds).padStart(2, '0');
  }
}

// Update countdown every second
setInterval(updateCountdown, 1000);
updateCountdown(); // Initial call
<?php endif; ?>
</script>
