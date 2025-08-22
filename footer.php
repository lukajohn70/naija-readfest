<?php
// Footer for Naija ReadFest PHP version
?>
<footer class="bg-gray-800 text-white pt-10 pb-6">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="col-span-1 md:col-span-2">
        <div class="flex items-center mb-4">
          <img src="public/naijareadfest-logo-white.png" alt="Naija ReadFest Logo" class="h-10 mr-3" loading="lazy" width="40" height="40" />
          <span class="text-2xl font-bold">Naija ReadFest</span>
        </div>
        <p class="text-gray-400 text-sm max-w-md">
          An official Guinness World Record attempt for the 'Longest Marathon Reading Aloud by a Team', dedicated to igniting Nigeria's reading culture.
        </p>
      </div>
      <div>
        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
        <ul class="space-y-2 text-sm">
          <li><a href="index.php?page=home" class="text-gray-400 hover:text-green-600 transition-colors duration-200">Home</a></li>
          <li><a href="index.php?page=about" class="text-gray-400 hover:text-green-600 transition-colors duration-200">About</a></li>
          <li><a href="index.php?page=objectives" class="text-gray-400 hover:text-green-600 transition-colors duration-200">Objectives</a></li>
          <li><a href="index.php?page=schedule" class="text-gray-400 hover:text-green-600 transition-colors duration-200">Schedule</a></li>
          <li><a href="index.php?page=live-stream" class="text-gray-400 hover:text-green-600 transition-colors duration-200">Live Stream</a></li>
          <li><a href="index.php?page=contact" class="text-gray-400 hover:text-green-600 transition-colors duration-200">Contact</a></li>
          <li><a href="index.php?page=volunteer-profile" class="text-gray-400 hover:text-green-600 transition-colors duration-200 flex items-center"><i class="fas fa-user-circle mr-2"></i>Volunteer Profile</a></li>
          <li><a href="index.php?page=volunteer-meals" class="text-gray-400 hover:text-green-600 transition-colors duration-200 flex items-center"><i class="fas fa-utensils mr-2"></i>Volunteer Meals</a></li>
        </ul>
      </div>
      <div>
        <h3 class="text-lg font-semibold mb-4">Connect</h3>
        <ul class="space-y-2 text-sm">
          <li class="flex items-center text-gray-400 transition-colors duration-200 hover:text-green-600 cursor-pointer">info@nigeriareads.ng</li>
          <li class="flex items-center text-gray-400 transition-colors duration-200 hover:text-green-600 cursor-pointer">+234 806 781 3462</li>
        </ul>
        <div class="flex space-x-4 mt-4">
          <a href="https://www.facebook.com/NigeriaReads" target="_blank" class="text-gray-400 hover:text-green-600 transition-colors duration-200" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/NigeriaReadsNGO" target="_blank" class="text-gray-400 hover:text-green-600 transition-colors duration-200" aria-label="X (Twitter)">
            <span style="display:inline-block;width:1.25em;height:1.25em;vertical-align:middle;">
              <svg viewBox="0 0 1200 1227" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z" />
              </svg>
            </span>
          </a>
          <a href="https://www.instagram.com/nigeria_reads" target="_blank" class="text-gray-400 hover:text-green-600 transition-colors duration-200" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/company/nigeria-reads/" target="_blank" class="text-gray-400 hover:text-green-600 transition-colors duration-200" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="https://www.tiktok.com/@Nigeria.Reads" target="_blank" class="text-gray-400 hover:text-green-600 transition-colors duration-200" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>
    <div class="border-t border-gray-700 mt-8 pt-6 text-center text-sm text-gray-500">
      <p>&copy; 2025 Naija Read Fest. All rights reserved. A Nigeria Reads Initiative.</p>
      <p class="mt-2">Created & Designed by <a href="https://jlm.com.ng" target="_blank" rel="noopener noreferrer" class="text-green-400 hover:text-green-300 transition-colors duration-200">JLM</a></p>
    </div>
  </div>
</footer>
<!-- Back to Top Button -->
<button id="backToTopBtn" onclick="window.scrollTo({top:0,behavior:'smooth'})" aria-label="Back to top" style="display:none;position:fixed;bottom:2rem;right:2rem;z-index:50;background:#15803d;color:#fff;width:70px;height:70px;padding:0;border-radius:50%;box-shadow:0 8px 32px 0 rgba(0,0,0,0.12);border:none;cursor:pointer;transition:background 0.2s;display:flex;align-items:center;justify-content:center;">
  <i class="fas fa-chevron-up" style="font-size:2rem;"></i>
</button>
<script>
window.addEventListener('scroll',function(){
  var btn=document.getElementById('backToTopBtn');
  if(window.scrollY>100){btn.style.display='flex';}else{btn.style.display='none';}
});
</script> 