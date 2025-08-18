<?php
// Navbar for Naija ReadFest PHP version
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$navItems = [
  ['name' => 'Home', 'id' => 'home'],
  ['name' => 'About', 'id' => 'about'],
  ['name' => 'Objectives', 'id' => 'objectives'],
  ['name' => 'Live Stream', 'id' => 'live-stream'],
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
<nav class="bg-white shadow-xl sticky top-0 z-50 rounded-b-lg backdrop-blur-md bg-white/95">
  <div class="container mx-auto px-4 py-2 flex justify-between items-center flex-wrap">
    <div class="flex items-center space-x-2 cursor-pointer" onclick="window.location='index.php?page=home'" style="cursor:pointer;">
      <img src="public/naijareadfest-logo.png" alt="Naija ReadFest Logo" class="h-12 w-auto rounded drop-shadow-sm" loading="lazy" width="48" height="48" />
      <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-green-700">Naija ReadFest</span>
    </div>
    <div class="md:hidden">
      <button id="mobile-menu-toggle" aria-label="Open menu" class="text-gray-800 hover:text-gray-600 focus:outline-none p-2 rounded" type="button">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
    <div id="mobile-menu" class="md:flex flex-grow justify-end w-full md:w-auto hidden md:block">
      <ul class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0 mt-4 md:mt-0 items-center">
        <?php foreach ($navItems as $item): ?>
          <li>
            <a href="index.php?page=<?= $item['id'] ?>" class="relative block px-3 py-2 rounded-md text-lg font-medium transition-colors duration-200 <?= $page === $item['id'] ? 'text-green-600' : 'text-gray-700 hover:text-green-600' ?> group nav-link">
              <span><?= $item['name'] ?></span>
              <span class="absolute left-0 right-0 -bottom-1 h-1 rounded bg-green-600 transition-all duration-200 <?= $page === $item['id'] ? 'opacity-100 w-full' : 'opacity-0 w-0 group-hover:opacity-100 group-hover:w-full' ?>" style="margin-top:2px;"></span>
            </a>
          </li>
        <?php endforeach; ?>
        <li class="relative group">
          <button class="flex items-center px-3 py-2 rounded-md text-lg font-medium transition-colors duration-200 text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:outline-none" style="min-width:140px;" id="discover-btn">
            Discover <i class="fas fa-chevron-down ml-1"></i>
          </button>
          <ul class="absolute top-full left-0 bg-white shadow-lg rounded-md mt-2 w-56 py-2 z-10 opacity-0 group-hover:opacity-100 group-hover:visible invisible group-hover:visible transition-all duration-200 ease-in-out pointer-events-auto" id="discover-dropdown">
            <?php foreach ($discoverItems as $item): ?>
              <li>
                <a href="index.php?page=<?= $item['id'] ?>" class="block w-full text-left px-5 py-3 text-base transition-colors duration-200 <?= $page === $item['id'] ? 'text-green-600 font-bold bg-gray-100' : 'text-gray-700 hover:text-green-600 hover:bg-gray-50' ?> rounded-md nav-link">
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
if (menuToggle && mobileMenu) {
  menuToggle.addEventListener('click', function() {
    mobileMenu.classList.toggle('hidden');
  });
}
// Collapse mobile menu on link click
function collapseMobileMenu() {
  if (window.innerWidth < 768) {
    var menu = document.getElementById('mobile-menu');
    if (menu) menu.classList.add('hidden');
    var dd = document.getElementById('discover-dropdown');
    if (dd) dd.classList.remove('group-hover:block', 'opacity-100', 'visible');
    if (dd) dd.classList.add('opacity-0', 'invisible');
  }
}
document.querySelectorAll('.nav-link').forEach(function(link) {
  link.addEventListener('click', collapseMobileMenu);
});
// Also collapse on Discover dropdown click
var discoverBtn = document.getElementById('discover-btn');
if (discoverBtn) {
  discoverBtn.addEventListener('click', function() {
    var dd = document.getElementById('discover-dropdown');
    if (dd) dd.classList.toggle('opacity-0');
    if (dd) dd.classList.toggle('invisible');
    if (dd) dd.classList.toggle('opacity-100');
    if (dd) dd.classList.toggle('visible');
  });
}
</script> 