<?php
// admin.php - Enhanced admin dashboard for exhibitor applications
require_once 'db.php';

// Handle CSV export
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="exhibitor_applications.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['#', 'Organization', 'Contact Person', 'Phone', 'Email', 'Profile', 'Titles', 'Booth', 'Special Requests', 'Submitted']);
    $res = $mysqli->query("SELECT * FROM exhibitors ORDER BY submitted_at ASC");
    $i = 1;
    while ($row = $res->fetch_assoc()) {
        fputcsv($out, [
            $i++, 
            $row['org_name'],
            $row['contact_name'],
            "'" . $row['contact_phone'], // force Excel to treat as text
            $row['contact_email'],
            $row['org_profile'],
            $row['num_titles'],
            $row['booth_requirements'],
            $row['special_requests'],
            $row['submitted_at'],
        ]);
    }
    fclose($out);
    exit;
}

// Search/filter
$search = trim($_GET['search'] ?? '');
$where = '';
if ($search !== '') {
    $search_esc = $mysqli->real_escape_string($search);
    $where = "WHERE org_name LIKE '%$search_esc%' OR contact_name LIKE '%$search_esc%' OR contact_email LIKE '%$search_esc%' OR org_profile LIKE '%$search_esc%' OR booth_requirements LIKE '%$search_esc%' OR special_requests LIKE '%$search_esc%'";
}
$result = $mysqli->query("SELECT * FROM exhibitors $where ORDER BY submitted_at ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Exhibitor Applications</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">
  <div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-extrabold mb-8 text-green-700 flex items-center gap-3"><i class="fas fa-user-shield"></i> Admin Dashboard <span class="text-lg font-normal text-gray-500">Exhibitor Applications</span></h1>
    <form method="get" class="mb-6 flex flex-col sm:flex-row gap-4 items-center justify-between">
      <div class="flex gap-2 w-full sm:w-auto">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search applications..." class="border border-green-300 rounded-lg px-4 py-2 w-full sm:w-64 focus:outline-none focus:ring-2 focus:ring-green-400" />
        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold px-6 py-2 rounded-lg shadow flex items-center gap-2"><i class="fas fa-search"></i> Search</button>
      </div>
      <div class="flex flex-wrap gap-2">
        <a href="?export=csv" class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold px-6 py-2 rounded-lg shadow flex items-center gap-2"><i class="fas fa-file-csv"></i> Export CSV</a>
        <a href="export_pdf.php" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-2 rounded-lg shadow flex items-center gap-2" target="_blank"><i class="fas fa-file-pdf"></i> Export PDF</a>
        <a href="export_doc.php" class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-6 py-2 rounded-lg shadow flex items-center gap-2" target="_blank"><i class="fas fa-file-word"></i> Export DOC</a>
        <a href="export_excel.php" class="bg-green-700 hover:bg-green-800 text-white font-bold px-6 py-2 rounded-lg shadow flex items-center gap-2" target="_blank"><i class="fas fa-file-excel"></i> Export Excel</a>
      </div>
    </form>
    <div class="overflow-x-auto bg-white rounded-xl shadow-xl p-6">
      <table class="min-w-full text-sm">
        <thead>
          <tr class="bg-green-100 text-green-800">
            <th class="py-2 px-3 text-left">#</th>
            <th class="py-2 px-3 text-left">Organization</th>
            <th class="py-2 px-3 text-left">Contact Person</th>
            <th class="py-2 px-3 text-left">Phone</th>
            <th class="py-2 px-3 text-left">Email</th>
            <th class="py-2 px-3 text-left">Titles</th>
            <th class="py-2 px-3 text-left">Submitted</th>
            <th class="py-2 px-3 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): $i = 1; ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr class="border-b hover:bg-green-50">
                <td class="py-2 px-3 font-bold text-gray-700"><?= $i ?></td>
                <td class="py-2 px-3 font-semibold text-green-700"><?= htmlspecialchars($row['org_name']) ?></td>
                <td class="py-2 px-3 text-gray-800"><?= htmlspecialchars($row['contact_name']) ?></td>
                <td class="py-2 px-3 text-gray-800"><?= htmlspecialchars($row['contact_phone']) ?></td>
                <td class="py-2 px-3 text-blue-700 underline"><a href="mailto:<?= htmlspecialchars($row['contact_email']) ?>"><?= htmlspecialchars($row['contact_email']) ?></a></td>
                <td class="py-2 px-3 text-center text-gray-900 font-bold"><?= (int)$row['num_titles'] ?></td>
                <td class="py-2 px-3 text-gray-500 text-xs"><?= htmlspecialchars($row['submitted_at']) ?></td>
                <td class="py-2 px-3">
                  <button onclick="showDetails(<?= $i ?>)" class="text-green-700 hover:text-green-900 font-bold flex items-center gap-1"><i class="fas fa-eye"></i> View</button>
                  <div id="detailsModal<?= $i ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
                    <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-lg w-full text-left border-2 border-green-600 relative">
                      <button onclick="closeDetails(<?= $i ?>)" class="absolute top-3 right-3 text-gray-400 hover:text-red-600 text-2xl font-bold">&times;</button>
                      <h2 class="text-2xl font-bold text-green-700 mb-4">Application Details</h2>
                      <div class="mb-2"><span class="font-bold">Organization:</span> <?= htmlspecialchars($row['org_name']) ?></div>
                      <div class="mb-2"><span class="font-bold">Contact Person:</span> <?= htmlspecialchars($row['contact_name']) ?></div>
                      <div class="mb-2"><span class="font-bold">Phone:</span> <?= htmlspecialchars($row['contact_phone']) ?></div>
                      <div class="mb-2"><span class="font-bold">Email:</span> <a href="mailto:<?= htmlspecialchars($row['contact_email']) ?>" class="text-blue-700 underline"><?= htmlspecialchars($row['contact_email']) ?></a></div>
                      <div class="mb-2"><span class="font-bold">Profile:</span> <?= nl2br(htmlspecialchars($row['org_profile'])) ?></div>
                      <div class="mb-2"><span class="font-bold">Titles/Products:</span> <?= (int)$row['num_titles'] ?></div>
                      <div class="mb-2"><span class="font-bold">Booth Requirements:</span> <?= nl2br(htmlspecialchars($row['booth_requirements'])) ?></div>
                      <div class="mb-2"><span class="font-bold">Special Requests:</span> <?= nl2br(htmlspecialchars($row['special_requests'])) ?></div>
                      <div class="mb-2"><span class="font-bold">Submitted:</span> <?= htmlspecialchars($row['submitted_at']) ?></div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php $i++; endwhile; ?>
          <?php else: ?>
            <tr><td colspan="8" class="py-6 text-center text-gray-400">No applications found.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    function showDetails(i) {
      document.getElementById('detailsModal'+i).classList.remove('hidden');
    }
    function closeDetails(i) {
      document.getElementById('detailsModal'+i).classList.add('hidden');
    }
  </script>
</body>
</html>
<?php if ($result) $result->free(); $mysqli->close(); ?> 