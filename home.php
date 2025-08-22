<?php // Home page for Naija ReadFest PHP version ?>
<div class="bg-white">
  <style>
    @keyframes faintPulse {
      0%, 100% { filter: brightness(1); opacity: 1; }
      50% { filter: brightness(0.65); opacity: 0.9; }
    }
    .faint-pulse { animation: faintPulse 1.8s infinite; }
    .gwr-logo-rotate {
      display: inline-block;
      transform: rotate(-2deg);
      transition: transform 0.3s;
    }
    .gwr-logo-rotate:hover {
      transform: rotate(0deg);
    }
  </style>
  <!-- HERO SECTION -->
  <div class="w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] flex flex-col justify-center items-center rounded-none mt-16 mb-0 overflow-visible" style="min-height: 90vh; z-index:20;" id="hero-bg-container">
    <div id="hero-bg" class="absolute inset-0 w-full h-full transition-opacity duration-1000 z-0" style="background: linear-gradient(90deg, rgba(0,128,0,0.7) 0%, rgba(0,0,0,0.79) 50%, rgba(200,0,0,0.79) 100%), url('public/header-slideshow-images/image1.jpg') center/cover no-repeat; opacity: 1;"></div>
    <div id="hero-bg-next" class="absolute inset-0 w-full h-full transition-opacity duration-1000 z-0" style="opacity: 0;"></div>
    <div class="w-full flex flex-col items-center justify-center pt-0 pb-10 px-4 relative z-10">
      <!-- Logos at the top, always above title -->
      <div class="flex flex-row items-center justify-center space-x-6 mb-6 mt-0 z-30" style="overflow: visible; margin-top: 5rem;">
        <img src="public/naijareadfest-logo.png" alt="Naija ReadFest Logo" class="h-14 drop-shadow-lg bg-white rounded p-1" loading="lazy" width="56" height="56" />
        <span class="gwr-logo-rotate"><img src="public/gwr.png" alt="gwr" class="h-14 drop-shadow-lg bg-white rounded p-1" loading="lazy" width="56" height="56" /></span>
      </div>
      <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-2 tracking-tight drop-shadow-lg text-center">
        Naija <span style="color:#008000;">Read</span>Fest
      </h1>
      <div class="text-xl md:text-2xl font-semibold text-yellow-200 mb-6 max-w-4xl text-center drop-shadow-md">
        Guinness World Record – Official Attempt: Longest Marathon Reading Aloud by a Team
      </div>
      
      <!-- Marathon Progress Tracker -->
      <div class="mb-8 max-w-4xl mx-auto">
        <?php include 'marathon-progress.php'; ?>
      </div>
      

      <style>
        .view-schedule-btn:hover {
          background: #fff !important;
          color: #15803d !important;
          border-color: #15803d !important;
        }
        .view-schedule-btn:hover i {
          color: #15803d !important;
        }
        .view-schedule-btn i {
          color: #fff;
          transition: color 0.2s;
        }
      </style>
    </div>
    <div class="absolute inset-0 bg-black opacity-30 z-0"></div>
  </div>
  <!-- WELCOME SECTION -->
  <div class="container mx-auto px-6 py-24">
    <div class="grid md:grid-cols-2 gap-32 items-center">
      <div>
        <h2 class="text-3xl font-extrabold mb-4">Welcome to a Historic Literary Challenge</h2>
        <p class="text-xl text-gray-800 mb-4">Join us for an extraordinary <span class="font-bold text-red-700">Guinness World Record – Official Attempt</span> as we read aloud for</p>
        <p class="text-3xl font-extrabold text-green-600 mb-4 drop-shadow-sm">424 hours (18 consecutive days).</p>
        <p class="text-xl text-gray-700 leading-relaxed">This is more than a record—it's a movement to ignite Nigeria's reading culture, celebrate our stories, and unite the nation through the power of books.</p>
      </div>
      <div class="flex flex-col items-center">
        <div class="group bg-white rounded-lg border-4 border-yellow-400 w-fit relative transition-transform duration-300" style="box-shadow: 0 12px 40px 0 rgba(0,0,0,0.15); transform: rotate(-2deg); min-width: 340px; padding: 1.5rem 2rem 3rem 2rem;">
          <span class="gwr-logo-rotate"><img src="public/gwr.png" alt="GWR Official Attempt" class="h-56 w-auto object-contain mx-auto drop-shadow-md" style="display: block;" /></span>
          <span class="block text-yellow-700 font-semibold tracking-wide text-sm text-center" style="letter-spacing: 0.08em; margin-top: 0.5rem; position: absolute; left: 50%; transform: translateX(-50%); bottom: 0.7rem; width: 100%; text-align: center; font-size: 1rem;">GWR OFFICIAL ATTEMPT</span>
        </div>
      </div>
    </div>
  </div>
  <!-- GET INVOLVED SECTION -->
  <div class="bg-gradient-to-b from-gray-50 to-gray-100 py-24 relative overflow-hidden">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-3xl font-extrabold mb-4">Get Involved in the Record</h2>
      <p class="text-lg text-gray-700 mb-8">Join us in making history with this extraordinary literary event</p>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <a href="index.php?page=about" class="block border-2 border-green-500 rounded-lg p-8 shadow-lg hover:shadow-xl transition card-hover">
          <div class="mb-4"><i class="fas fa-bullseye fa-2x text-green-600"></i></div>
          <h3 class="text-xl font-bold mb-2">About the Attempt</h3>
          <p class="text-gray-700">Discover the vision and rules behind our GWR journey.</p>
        </a>
        <a href="index.php?page=partners" class="block border-2 border-red-500 rounded-lg p-8 shadow-lg hover:shadow-xl transition card-hover">
          <div class="mb-4"><i class="fas fa-handshake fa-2x text-red-700"></i></div>
          <h3 class="text-xl font-bold mb-2">Become a Partner</h3>
          <p class="text-gray-700">Support literacy and be part of a world record.</p>
        </a>
        <a href="index.php?page=reading-list" class="block border-2 border-yellow-500 rounded-lg p-8 shadow-lg hover:shadow-xl transition card-hover">
          <div class="mb-4"><i class="fas fa-book fa-2x text-yellow-500"></i></div>
          <h3 class="text-xl font-bold mb-2">The Reading List</h3>
          <p class="text-gray-700">Explore 50+ Nigerian literary masterpieces.</p>
        </a>
      </div>
    </div>
  </div>
  <!-- STAY CONNECTED SECTION -->
  <div class="container mx-auto px-6 py-24 text-center relative overflow-hidden">
    <div class="max-w-4xl mx-auto bg-white p-12 rounded-3xl shadow-2xl" style="box-shadow: 0 8px 40px 0 rgba(0,0,0,0.1);">
      <div class="flex flex-row items-center justify-center space-x-8 mb-6 z-30" style="overflow: visible;">
        <img src="public/naijareadfest-logo.png" alt="Naija ReadFest Logo" class="h-16 drop-shadow-lg bg-white rounded p-2" loading="lazy" width="64" height="64" />
        <span class="gwr-logo-rotate"><img src="public/gwr.png" alt="Official Attempt" class="h-16 drop-shadow-lg bg-white rounded p-2" loading="lazy" width="64" height="64" /></span>
      </div>
      <h2 class="text-3xl font-extrabold mb-4">Stay Connected to the Record!</h2>
      <p class="text-lg text-gray-700 mb-8">Follow our Guinness World Record journey for real-time updates, behind-the-scenes content, and exclusive access to our marathoners.</p>
      <div class="flex flex-col sm:flex-row justify-center items-center gap-4 mb-8">
        <a href="https://www.facebook.com/NigeriaReads" target="_blank" class="px-6 py-3 rounded-lg bg-blue-600 text-white font-bold text-lg flex items-center gap-2 shadow-lg hover:bg-blue-700 transition"><i class="fab fa-facebook-f"></i> Facebook</a>
        <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" class="px-6 py-3 rounded-lg bg-gray-900 text-white font-bold text-lg flex items-center gap-2 shadow-lg hover:bg-black transition">
          <span style="display:inline-block;width:1.25em;height:1.25em;vertical-align:middle;">
            <svg viewBox="0 0 1200 1227" width="20" height="20" fill="white" xmlns="http://www.w3.org/2000/svg">
              <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" />
            </svg>
          </span>
          <span class="text-gray-300 text-base font-normal">(formerly Twitter)</span>
        </a>
        <a href="https://www.instagram.com/nigeria_reads" target="_blank" class="px-6 py-3 rounded-lg bg-gradient-to-r from-pink-600 to-purple-600 text-white font-bold text-lg flex items-center gap-2 shadow-lg hover:bg-gradient-to-r hover:from-pink-700 hover:to-purple-700 transition"><i class="fab fa-instagram"></i> Instagram</a>
      </div>
      <div class="flex flex-col sm:flex-row justify-center items-center gap-2 text-lg">
        <span>Use</span>
        <span class="font-bold bg-green-100 text-green-700 rounded-xl px-4 py-2 ml-2 mr-2">#NaijaReadFest</span>
        <span>and</span>
        <span class="font-bold bg-red-100 text-red-700 rounded-xl px-4 py-2 ml-2 mr-2">#GWROfficialAttempt</span>
        <span>to join the conversation!</span>
      </div>
    </div>
  </div>
</div>
<script>
// Slideshow for hero background with crossfade (slower for cinematic effect)
const images = [
  'public/header-slideshow-images/image1.jpg',
  'public/header-slideshow-images/image2.jpg',
  'public/header-slideshow-images/image3.jpg'
];
let currentImage = 0;
let nextImage = 1;
const heroBg = document.getElementById('hero-bg');
const heroBgNext = document.getElementById('hero-bg-next');
function crossfadeHeroBg() {
  heroBgNext.style.background = `linear-gradient(90deg, rgba(0,128,0,0.7) 0%, rgba(0,0,0,0.79) 50%, rgba(200,0,0,0.79) 100%), url('${images[nextImage]}') center/cover no-repeat`;
  heroBgNext.style.opacity = 1;
  setTimeout(() => {
    heroBg.style.background = heroBgNext.style.background;
    heroBgNext.style.opacity = 0;
    currentImage = nextImage;
    nextImage = (nextImage + 1) % images.length;
  }, 1800); // slower fade
}
setInterval(crossfadeHeroBg, 6000); // slower interval

</script> 