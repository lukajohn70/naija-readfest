<?php // Live Stream page for Naija ReadFest PHP version ?>
<style>
  /* Custom video player styling for native look */
  #youtube-player {
    border-radius: 8px !important;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3) !important;
  }
  
  /* Hide YouTube branding and controls */
  #youtube-player iframe {
    border-radius: 8px !important;
  }
  
  /* Custom video container */
  .bg-black {
    background: #000 !important;
    border-radius: 8px !important;
    overflow: hidden !important;
  }
  
  /* Remove any YouTube watermarks */
  .ytp-watermark {
    display: none !important;
  }
  
  /* Custom loading animation */
  .custom-loading {
    background: linear-gradient(45deg, #1a1a1a, #2a2a2a) !important;
    border-radius: 8px !important;
  }
  
  /* Ensure clean video appearance */
  iframe[src*="youtube.com"] {
    border: none !important;
    outline: none !important;
  }
  
  /* Hide YouTube player controls and branding */
  .ytp-chrome-top,
  .ytp-chrome-bottom,
  .ytp-watermark,
  .ytp-show-cards-title,
  .ytp-pause-overlay {
    display: none !important;
  }
  
  /* Custom rounded corners for video container */
  .bg-black.rounded-t-2xl {
    border-radius: 12px !important;
  }
  
  /* Smooth transitions for controls */
  .bg-white.shadow-2xl.rounded-2xl {
    transition: all 0.3s ease;
  }
  
  /* Enhanced shadow for video player */
  .bg-white.shadow-2xl {
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15) !important;
  }
  
  /* Custom video player class */
  .custom-video-player {
    background: #000 !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25) !important;
  }
  
  /* Ensure video fills container properly */
  .relative.w-full {
    border-radius: 12px !important;
    overflow: hidden !important;
  }
  
  /* Hide any remaining YouTube elements */
  .ytp-large-play-button,
  .ytp-button,
  .ytp-youtube-button {
    opacity: 0 !important;
  }
  
  /* Custom focus states */
  .custom-video-player:focus {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3) !important;
  }
</style>
<div class="bg-gray-50 min-h-screen">
  <!-- Hero Section -->
  <div class="w-full mt-8 mb-12 shadow-xl overflow-hidden" style="min-height: 400px;">
    <div class="w-full h-full flex flex-col items-center justify-center py-12 px-4" style="background: linear-gradient(135deg, #29984A 0%, #1a5f2e 50%, #C0392B 100%);">
      <div class="flex flex-row items-center justify-center space-x-6 mb-6">
        <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
        <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      </div>
      <h1 class="text-4xl md:text-5xl font-extrabold text-white text-center mb-3 drop-shadow">Naija ReadFest LIVE</h1>
      <h2 class="text-lg md:text-xl font-bold text-yellow-300 text-center mb-6 drop-shadow">Witness History in the Making</h2>
      <div class="flex flex-wrap justify-center gap-4 mb-6">
        <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">August 12 - 30, 2025 • Lagos, Nigeria</span>
      </div>
      

    </div>
  </div>

  <!-- Main Content -->
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Stream Description -->
    <div class="max-w-3xl mx-auto text-center mb-12">
      <h2 class="text-3xl font-extrabold text-green-700 mb-4">Experience the Naija ReadFest LIVE</h2>
      <p class="text-lg text-gray-700">Join us right here for the official livestream of the Naija ReadFest Guinness World Record attempt! Watch 18 days of non-stop reading, special guest appearances, and community events as we make history together.</p>
    </div>

    <!-- Stream Player Section -->
    <div class="max-w-5xl mx-auto mb-16">

      
      <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
        <div class="relative">
          <span class="absolute top-4 left-4 bg-green-700 text-white text-xs font-bold px-4 py-1 rounded-full z-10 shadow-lg">Official Stream</span>
          
          <!-- Stream Container -->
          <div class="bg-black rounded-t-2xl overflow-hidden">
            <div class="relative w-full" style="padding-bottom: 56.25%;">
              <!-- Loading State -->
              <div id="stream-loading" class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900">
                <div class="text-center text-white">
                  <div class="animate-spin rounded-full h-16 w-16 border-b-2 border-white mx-auto mb-4"></div>
                  <h3 class="text-xl font-bold mb-2">Loading Livestream...</h3>
                  <p class="text-sm text-gray-300">Please wait while we connect to the stream</p>
                </div>
              </div>
              
                                <!-- Embedded YouTube Livestream -->
                  <iframe 
                    id="youtube-player"
                    class="absolute top-0 left-0 w-full h-full hidden"
                    src=""
                    title="Naija ReadFest Live Stream"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen>
                  </iframe>
              
              <!-- Offline Message -->
              <div id="stream-offline" class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-gray-900 hidden">
                <div class="text-center text-white">
                  <i class="fas fa-video-slash text-6xl mb-4 text-gray-400"></i>
                  <h3 class="text-2xl font-bold mb-2">Stream Currently Offline</h3>
                  <p class="text-lg mb-4">The livestream may not be active right now</p>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Stream Info -->
          <div class="p-6 bg-white">
            <div class="text-center font-semibold text-lg text-gray-800 mb-6">
              Watch the Naija ReadFest Guinness World Record attempt live! Join us for 424 hours of non-stop reading.
            </div>
            
            <!-- Stream Controls -->
            <div class="flex flex-wrap justify-center gap-4">
              <div class="flex items-center gap-2 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span id="stream-status">Live</span>
              </div>
              <button id="fullscreen-btn" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-200 flex items-center gap-2">
                <i class="fas fa-expand"></i> Fullscreen
              </button>
              <button id="mute-btn" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 flex items-center gap-2">
                <i class="fas fa-volume-mute"></i> Mute
              </button>
              <a href="https://youtube.com/@nigeriareads5491/live" target="_blank" rel="noopener noreferrer" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center gap-2">
                <i class="fab fa-youtube"></i> Open in YouTube
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Social Media Section -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl py-12 px-6 mb-12">
      <h2 class="text-2xl md:text-3xl font-extrabold mb-4 text-green-700 text-center">Share & Support</h2>
      <p class="mb-8 text-lg text-center">Follow us and spread the word! Use <span class="font-bold text-green-700">#NaijaReadFest</span> to join the movement.</p>
      <div class="flex flex-wrap justify-center gap-4">
        <a href="https://www.facebook.com/NigeriaReads" target="_blank" class="flex items-center gap-2 px-8 py-4 rounded-xl text-white text-lg font-semibold shadow transition-all duration-200 bg-blue-600 hover:bg-blue-700 hover:scale-105">
          <i class="fab fa-facebook-f"></i> Facebook
        </a>
        <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" class="flex items-center gap-2 px-8 py-4 rounded-xl text-white text-lg font-semibold shadow transition-all duration-200 bg-black hover:bg-gray-900 hover:scale-105">
          <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://www.instagram.com/nigeria_reads" target="_blank" class="flex items-center gap-2 px-8 py-4 rounded-xl text-white text-lg font-semibold shadow transition-all duration-200 bg-pink-600 hover:bg-pink-700 hover:scale-105">
          <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="https://www.tiktok.com/@Nigeria.Reads" target="_blank" class="flex items-center gap-2 px-8 py-4 rounded-xl text-white text-lg font-semibold shadow transition-all duration-200 bg-black hover:bg-gray-900 hover:scale-105">
          <i class="fab fa-tiktok"></i> TikTok
        </a>
        <a href="https://www.linkedin.com/company/nigeria-reads/" target="_blank" class="flex items-center gap-2 px-8 py-4 rounded-xl text-white text-lg font-semibold shadow transition-all duration-200 bg-blue-800 hover:bg-blue-900 hover:scale-105">
          <i class="fab fa-linkedin-in"></i> LinkedIn
        </a>
      </div>
    </div>

    <!-- What to Expect Section -->
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl py-12 px-6 mb-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold mb-8 text-green-700">What to Expect</h2>
          <ul class="space-y-6">
            <li class="flex items-start gap-4">
              <span class="bg-green-100 text-green-600 rounded-full w-10 h-10 flex items-center justify-center mt-1 flex-shrink-0">
                <i class="fas fa-infinity text-xl"></i>
              </span>
              <div>
                <span class="font-bold text-lg text-black">Non-Stop Reading</span>
                <div class="text-gray-600">Experience 424 hours of continuous reading by 5 marathoners from across Nigeria.</div>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <span class="bg-red-100 text-red-500 rounded-full w-10 h-10 flex items-center justify-center mt-1 flex-shrink-0">
                <i class="far fa-star text-xl"></i>
              </span>
              <div>
                <span class="font-bold text-lg text-black">Special Guests & Authors</span>
                <div class="text-gray-600">Enjoy appearances and spotlights from celebrated Nigerian authors and personalities.</div>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <span class="bg-yellow-100 text-yellow-500 rounded-full w-10 h-10 flex items-center justify-center mt-1 flex-shrink-0">
                <i class="far fa-comments text-xl"></i>
              </span>
              <div>
                <span class="font-bold text-lg text-black">Live Audience Interaction</span>
                <div class="text-gray-600">Participate in the event through live Q&A sessions and audience interactions.</div>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <span class="bg-green-100 text-green-700 rounded-full w-10 h-10 flex items-center justify-center mt-1 flex-shrink-0">
                <i class="fas fa-film text-xl"></i>
              </span>
              <div>
                <span class="font-bold text-lg text-black">Behind-the-Scenes Access</span>
                <div class="text-gray-600">Get exclusive glimpses of daily highlights and behind-the-scenes moments.</div>
              </div>
            </li>
          </ul>
        </div>
        <div class="flex justify-center">
          <img src="public/slideshow-images/image1.jpg" alt="Reading" class="rounded-2xl object-cover w-full max-w-md h-80 shadow-lg" loading="lazy" width="400" height="320" />
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Livestream player functionality
function initLivestreamPlayer() {
  const player = document.getElementById('youtube-player');
  const offlineMessage = document.getElementById('stream-offline');
  const loadingMessage = document.getElementById('stream-loading');
  const streamStatus = document.getElementById('stream-status');
  
  // Check livestream status from server
  fetch('check_livestream.php')
    .then(response => response.json())
    .then(data => {
      console.log('Livestream status:', data);
      
      if (player) {
        // Set the embed URL from the server response
        player.src = data.embed_url;
        player.classList.remove('hidden');
        
        // Update stream status based on server response
        if (streamStatus) {
          if (data.status === 'live') {
            streamStatus.textContent = 'Live';
            streamStatus.parentElement.className = 'flex items-center gap-2 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium';
          } else {
            streamStatus.textContent = 'Offline';
            streamStatus.parentElement.className = 'flex items-center gap-2 bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium';
          }
        }
        
        // Hide loading message after player loads
        const loadTimeout = setTimeout(() => {
          if (loadingMessage) loadingMessage.classList.add('hidden');
        }, 3000); // Give 3 seconds for player to load
        
        player.addEventListener('load', function() {
          console.log('Livestream player loaded successfully');
          clearTimeout(loadTimeout);
          if (loadingMessage) loadingMessage.classList.add('hidden');
        });
        
        player.addEventListener('error', function() {
          console.log('Error loading livestream, showing offline message');
          clearTimeout(loadTimeout);
          player.classList.add('hidden');
          if (loadingMessage) loadingMessage.classList.add('hidden');
          if (offlineMessage) offlineMessage.classList.remove('hidden');
          if (streamStatus) {
            streamStatus.textContent = 'Error';
            streamStatus.parentElement.className = 'flex items-center gap-2 bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium';
          }
        });
      }
      
      // Hide offline message if we're showing the player
      if (offlineMessage) offlineMessage.classList.add('hidden');
    })
    .catch(error => {
      console.error('Error checking livestream status:', error);
      // Fallback to default behavior
      if (player) {
        player.src = "https://www.youtube.com/embed/live_stream?channel=UCMvu90Ta4DYCAUXFmPfadAQ&autoplay=1&mute=0&controls=0&rel=0&modestbranding=1&showinfo=0&iv_load_policy=3&disablekb=1&fs=0&enablejsapi=1";
        player.classList.remove('hidden');
      }
    });
}

// Stream control functionality
function initStreamControls() {
  const fullscreenBtn = document.getElementById('fullscreen-btn');
  const muteBtn = document.getElementById('mute-btn');
  const player = document.getElementById('youtube-player');
  
  if (fullscreenBtn) {
    fullscreenBtn.addEventListener('click', function() {
      if (player) {
        if (player.requestFullscreen) {
          player.requestFullscreen();
        } else if (player.webkitRequestFullscreen) {
          player.webkitRequestFullscreen();
        } else if (player.msRequestFullscreen) {
          player.msRequestFullscreen();
        }
      }
    });
  }
  
  if (muteBtn) {
    muteBtn.addEventListener('click', function() {
      if (player) {
        // Toggle mute state by updating the iframe src
        const currentSrc = player.src;
        if (currentSrc.includes('mute=0')) {
          player.src = currentSrc.replace('mute=0', 'mute=1');
          muteBtn.innerHTML = '<i class="fas fa-volume-up"></i> Unmute';
          muteBtn.classList.remove('bg-gray-600');
          muteBtn.classList.add('bg-green-600');
        } else {
          player.src = currentSrc.replace('mute=1', 'mute=0');
          muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i> Mute';
          muteBtn.classList.remove('bg-green-600');
          muteBtn.classList.add('bg-gray-600');
        }
      }
    });
  }
}

// Initialize everything when page loads
document.addEventListener('DOMContentLoaded', function() {
  initLivestreamPlayer();
  initStreamControls();
  
  // Check stream status every 2 minutes for live streams
  setInterval(initLivestreamPlayer, 120000);
  
  // Also check every 30 seconds when page is active
  let checkInterval;
  document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
      clearInterval(checkInterval);
    } else {
      checkInterval = setInterval(initLivestreamPlayer, 30000);
    }
  });
  
  // Start the 30-second check when page becomes visible
  if (!document.hidden) {
    checkInterval = setInterval(initLivestreamPlayer, 30000);
  }
  
  // Enhance video player appearance
  enhanceVideoPlayer();
});

// Function to enhance video player appearance
function enhanceVideoPlayer() {
  const player = document.getElementById('youtube-player');
  if (player) {
    // Add custom classes for styling
    player.classList.add('custom-video-player');
    
    // Ensure clean appearance
    player.style.borderRadius = '8px';
    player.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.3)';
    
    // Listen for iframe load to apply additional styling
    player.addEventListener('load', function() {
      // Try to hide YouTube branding via CSS injection
      const style = document.createElement('style');
      style.textContent = `
        .ytp-chrome-top, .ytp-chrome-bottom, .ytp-watermark, 
        .ytp-show-cards-title, .ytp-pause-overlay { display: none !important; }
      `;
      document.head.appendChild(style);
    });
  }
}
</script> 