<?php // Gallery page for Naija ReadFest PHP version ?>
<div class="w-full mt-10 mb-16 shadow-xl overflow-hidden" style="min-height: 420px;">
  <div class="w-full h-full flex flex-col items-center justify-center py-16 px-4" style="background: linear-gradient(90deg, #29984A 0%, #232d23 50%, #C0392B 100%);">
    <div class="flex flex-row items-center justify-center space-x-6 mb-6">
      <img src="public/naijareadfest-logo.png" alt="ReadFest Logo" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
      <img src="public/gwr.png" alt="Official Attempt" class="h-16 bg-white rounded shadow p-1" loading="lazy" width="64" height="64" />
    </div>
    <h1 class="text-5xl md:text-6xl font-extrabold text-white text-center mb-2 drop-shadow">Naija ReadFest Gallery</h1>
    <h2 class="text-xl md:text-2xl font-bold text-yellow-300 text-center mb-6 drop-shadow" style="text-shadow: 0 2px 8px rgba(0,0,0,0.10)">Explore moments from our journey towards the Guinness World Record attempt and the vibrant Nigerian literary community.</h2>
    <div class="flex flex-wrap justify-center gap-4 mb-4">
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold flex items-center gap-2 border border-white/20">August 12 - 30, 2025</span>
      <span class="bg-gray-800/80 text-white px-6 py-2 rounded-full text-lg font-semibold border border-white/20">Lagos, Nigeria</span>
    </div>
    <div class="flex justify-center">
      <span class="inline-block bg-yellow-300 text-black font-bold px-8 py-3 rounded-full text-lg shadow border-2 border-white" style="letter-spacing: 0.04em;">Guinness World Record – Official Attempt</span>
    </div>
  </div>
</div>
<div class="flex justify-center w-full px-2 py-8">
  <div class="w-full max-w-7xl bg-white rounded-3xl shadow-2xl p-0 md:p-8">
    <div class="flex flex-col items-center w-full mb-16">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-4xl mx-auto mb-12">
        <div class="relative group rounded-2xl overflow-hidden shadow-lg transition duration-300 transform hover:scale-110 hover:shadow-2xl hover:-translate-y-1 cursor-pointer" onclick="openModal('public/header-slideshow-images/image1.jpg')">
          <img src="public/header-slideshow-images/image1.jpg" alt="Gallery 1" class="w-full h-64 object-cover rounded-2xl" loading="lazy" width="400" height="256" />
          <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="bg-white text-gray-900 font-semibold px-6 py-2 rounded-lg shadow transition duration-200" aria-label="Click to view full image">Click to view full image</span>
          </div>
        </div>
        <div class="relative group rounded-2xl overflow-hidden shadow-lg transition duration-300 transform hover:scale-110 hover:shadow-2xl hover:-translate-y-1 cursor-pointer" onclick="openModal('public/header-slideshow-images/image2.jpg')">
          <img src="public/header-slideshow-images/image2.jpg" alt="Gallery 2" class="w-full h-64 object-cover rounded-2xl" loading="lazy" width="400" height="256" />
          <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="bg-white text-gray-900 font-semibold px-6 py-2 rounded-lg shadow transition duration-200" aria-label="Click to view full image">Click to view full image</span>
          </div>
        </div>
        <div class="relative group rounded-2xl overflow-hidden shadow-lg transition duration-300 transform hover:scale-110 hover:shadow-2xl hover:-translate-y-1 cursor-pointer" onclick="openModal('public/header-slideshow-images/image3.jpg')">
          <img src="public/header-slideshow-images/image3.jpg" alt="Gallery 3" class="w-full h-64 object-cover rounded-2xl" loading="lazy" width="400" height="256" />
          <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <span class="bg-white text-gray-900 font-semibold px-6 py-2 rounded-lg shadow transition duration-200" aria-label="Click to view full image">Click to view full image</span>
          </div>
        </div>
      </div>
      <div class="w-full max-w-5xl bg-white rounded-2xl shadow-xl border-2 border-green-200 p-10 flex flex-col items-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-green-700 mb-2 text-center">Share Your Moments!</h2>
        <p class="text-lg text-gray-700 mb-6 text-center">Tag us in your photos and use <span class="font-bold text-green-700">#NaijaReadFest</span> to be featured in our gallery.</p>
        <div class="flex flex-wrap gap-4 justify-center">
          <a href="https://facebook.com/sharer/sharer.php?u=https://naijareadfest.ng" target="_blank" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg text-lg transition duration-200 hover:scale-105 hover:shadow-xl" aria-label="Share on Facebook">
            <i class="fab fa-facebook-f text-2xl"></i>
            Share on Facebook
          </a>
          <a href="https://www.instagram.com/nigeria_reads" target="_blank" class="flex items-center gap-2 bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-3 rounded-lg text-lg transition duration-200 hover:scale-105 hover:shadow-xl" aria-label="Share on Instagram">
            <i class="fab fa-instagram text-2xl"></i>
            Share on Instagram
          </a>
        </div>
      </div>
    </div>
    <!-- Modal for full image -->
    <div id="galleryModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70" style="display:none;">
      <div class="bg-white rounded-2xl shadow-2xl p-4 max-w-3xl w-full flex flex-col items-center relative">
        <button class="absolute top-2 right-2 text-gray-700 bg-white rounded-full p-2 shadow hover:bg-gray-100" onclick="closeModal()" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <img id="galleryModalImg" src="" alt="Full Gallery" class="max-h-[70vh] w-auto rounded-xl" />
      </div>
    </div>
  </div>
</div>
<script>
function openModal(imgSrc) {
  document.getElementById('galleryModalImg').src = imgSrc;
  document.getElementById('galleryModal').style.display = 'flex';
}
function closeModal() {
  document.getElementById('galleryModal').style.display = 'none';
  document.getElementById('galleryModalImg').src = '';
}
</script> 