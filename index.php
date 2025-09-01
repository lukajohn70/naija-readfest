<?php
// Main entry point for Naija ReadFest PHP version
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$valid_pages = [
  'home', 'about', 'objectives', 'team', 'schedule', 'reading-list', 'partners', 'progress', 'contact', 'gallery'
];
if (!in_array($page, $valid_pages)) {
  $page = 'home';
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naija ReadFest</title>
  <link rel="icon" type="image/png" href="public/naijareadfest-logo-white.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <style>
    body { font-family: 'Inter', sans-serif; }
    h1, h2, h3, .heading-font { font-family: 'Montserrat', sans-serif; letter-spacing: -0.02em; }
    .gradient-text { background-clip: text; -webkit-background-clip: text; color: transparent; background-image: linear-gradient(90deg, #008000, #006000); }
  </style>
</head>
<body class="bg-gray-50 text-gray-900 transition-colors duration-300 overflow-x-hidden">
  <?php include 'navbar.php'; ?>
  <main class="flex-grow">
    <?php include $page . '.php'; ?>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html> 