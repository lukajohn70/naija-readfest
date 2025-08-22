<?php
// Navbar for Naija ReadFest PHP version
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$navItems = [
  ['name' => 'Home', 'id' => 'home'],
  ['name' => 'About', 'id' => 'about'],
  ['name' => 'Objectives', 'id' => 'objectives'],
  ['name' => 'Live Stream', 'id' => 'live-stream'],
  ['name' => 'Progress', 'id' => 'progress'],
  ['name' => 'Contact', 'id' => 'contact'],
  ['name' => 'Exhibitor Application', 'id' => 'exhibitor'],
];
$discoverItems = [
  ['name' => 'Team', 'id' => 'team'],
  ['name' => 'Schedule', 'id' => 'schedule'],
  ['name' => 'Reading List', 'id' => 'reading-list'],
  ['name' => 'Partners', 'id' => 'partners'],
  ['name' => 'Gallery', 'id' => 'gallery'],
  ['name' => 'Volunteer', 'id' => 'volunteer'],
];
?>
<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-200">
  <div class="container mx-auto px-6 py-4 flex justify-between items-center">
    <!-- Logo and Brand -->
    <div class="flex items-center cursor-pointer md:block" id="logo-container" onclick="window.location='index.php?page=home'">
      <img src="public/naijareadfest-logo.png" alt="Naija ReadFest Logo" class="h-12 w-auto rounded" loading="lazy" width="48" height="48" />
    </div>

    <!-- Mobile Menu Button -->
    <div class="md:hidden">
      <button id="mobile-menu-toggle" aria-label="Open menu" class="text-gray-700 hover:text-gray-900 focus:outline-none p-2 rounded-md" type="button">
        <svg id="hamburger-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Desktop Navigation -->
    <div id="mobile-menu" class="md:flex flex-grow justify-end w-full md:w-auto hidden md:block">
      <!-- Mobile Close Button -->
      <div class="md:hidden flex justify-end mb-4">
        <button id="mobile-close-btn" class="text-gray-700 hover:text-gray-900 focus:outline-none p-2 rounded-md" type="button">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <ul class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 mt-4 md:mt-0 items-center">
        <?php foreach ($navItems as $item): ?>
          <li>
            <a href="index.php?page=<?= $item['id'] ?>" class="relative block px-4 py-2 rounded-md text-lg font-medium transition-all duration-200 <?= $page === $item['id'] ? 'text-green-600 bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-gray-50' ?> group nav-link">
              <span><?= $item['name'] ?></span>
              <span class="absolute left-0 right-0 -bottom-0.5 h-0.5 rounded bg-green-600 transition-all duration-200 <?= $page === $item['id'] ? 'opacity-100 w-full' : 'opacity-0 w-0 group-hover:opacity-100 group-hover:w-full' ?>"></span>
            </a>
          </li>
        <?php endforeach; ?>
        
        <!-- Discover Dropdown -->
        <li class="relative group">
          <button class="flex items-center px-4 py-2 rounded-md text-lg font-medium transition-all duration-200 text-gray-700 hover:text-green-600 hover:bg-gray-50 focus:outline-none" id="discover-btn">
            Discover <i class="fas fa-chevron-down ml-1 text-sm"></i>
          </button>
          <ul class="absolute top-full left-0 bg-white shadow-xl rounded-lg mt-1 w-56 py-2 z-10 opacity-0 group-hover:opacity-100 group-hover:visible invisible group-hover:visible transition-all duration-200 ease-in-out pointer-events-auto border border-gray-100" id="discover-dropdown">
            <?php foreach ($discoverItems as $item): ?>
              <li>
                <a href="index.php?page=<?= $item['id'] ?>" class="block w-full text-left px-4 py-3 text-base transition-all duration-200 <?= $page === $item['id'] ? 'text-green-600 font-semibold bg-green-50' : 'text-gray-700 hover:text-green-600 hover:bg-gray-50' ?> rounded-md nav-link">
                  <?= $item['name'] ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
// Hamburger toggle
const menuToggle = document.getElementById('mobile-menu-toggle');
const mobileMenu = document.getElementById('mobile-menu');
const logoContainer = document.getElementById('logo-container');
const hamburgerIcon = document.getElementById('hamburger-icon');
const closeIcon = document.getElementById('close-icon');
const mobileCloseBtn = document.getElementById('mobile-close-btn');

function toggleMobileMenu() {
  mobileMenu.classList.toggle('hidden');
  logoContainer.classList.toggle('hidden');
  hamburgerIcon.classList.toggle('hidden');
  closeIcon.classList.toggle('hidden');
}

if (menuToggle && mobileMenu && logoContainer) {
  menuToggle.addEventListener('click', toggleMobileMenu);
}

if (mobileCloseBtn) {
  mobileCloseBtn.addEventListener('click', toggleMobileMenu);
}

// Collapse mobile menu on link click
function collapseMobileMenu() {
  if (window.innerWidth < 768) {
    mobileMenu.classList.add('hidden');
    logoContainer.classList.remove('hidden');
    hamburgerIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
  }
}

// Add click event to all nav links
document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', collapseMobileMenu);
});

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
  const isClickInsideNav = event.target.closest('nav');
  const isClickOnToggle = event.target.closest('#mobile-menu-toggle');
  const isClickOnCloseBtn = event.target.closest('#mobile-close-btn');
  
  if (!isClickInsideNav && !isClickOnToggle && !isClickOnCloseBtn && window.innerWidth < 768) {
    mobileMenu.classList.add('hidden');
    logoContainer.classList.remove('hidden');
    hamburgerIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
  }
});
</script> 