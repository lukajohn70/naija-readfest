<?php
require_once 'db.php';
header('Content-Type: application/msword');
header('Content-Disposition: attachment; filename="naijareadfest_exhibitors.doc"');

echo '<html><head><meta charset="UTF-8"><title>Naija ReadFest Exhibitor Applications</title></head><body style="font-family:sans-serif;">';
echo '<div style="text-align:center; margin-bottom:30px;">';
echo '<img src="public/naijareadfest-logo.png" style="height:60px; margin-right:20px;">';
echo '<img src="public/partners/nigeria-reads.png" style="height:60px; margin-right:20px;">';
echo '<img src="public/gwr.png" style="height:60px;">';
echo '<h1 style="margin:18px 0 0 0; color:#008000; font-size:2.2em;">Naija ReadFest Exhibitor Applications</h1>';
echo '<h3 style="margin:8px 0 0 0; color:#444; font-weight:normal;">Guinness World Record – Official Attempt</h3>';
echo '<div style="font-size:15px; color:#333; margin-bottom:18px;">Exported: '.date('F j, Y, g:i a').'</div>';
echo '</div>';
echo '<table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse; width:100%; font-size:14px; margin-bottom:30px;">';
echo '<tr style="background:#008000; color:#fff;">';
echo '<th>#</th><th>Organization</th><th>Contact</th><th>Phone</th><th>Email</th><th>Titles</th><th>Submitted</th>';
echo '</tr>';
$where = '';
if (!empty($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $where = "WHERE org_name LIKE '%$search%' OR contact_name LIKE '%$search%' OR contact_email LIKE '%$search%' OR org_profile LIKE '%$search%' OR booth_requirements LIKE '%$search%' OR special_requests LIKE '%$search%'";
}
$result = $mysqli->query("SELECT * FROM exhibitors $where ORDER BY submitted_at ASC");
$i = 1;
$rowCount = 0;
while ($row = $result->fetch_assoc()) {
    $bg = $i % 2 == 0 ? '#f5fff5' : '#fff';
    echo '<tr style="background:'.$bg.'">';
    echo '<td>'.$i.'</td>';
    echo '<td>'.htmlspecialchars($row['org_name']).'</td>';
    echo '<td>'.htmlspecialchars($row['contact_name']).'</td>';
    echo '<td style="mso-number-format:\@;">'.htmlspecialchars($row['contact_phone']).'</td>';
    echo '<td>'.htmlspecialchars($row['contact_email']).'</td>';
    echo '<td style="text-align:center;">'.(int)$row['num_titles'].'</td>';
    echo '<td>'.htmlspecialchars($row['submitted_at']).'</td>';
    echo '</tr>';
    $i++;
    $rowCount++;
}
echo '</table>';
echo '<div style="text-align:right; font-size:1.1em; color:#008000; font-weight:bold;">Total Applications: '.$rowCount.'</div>';
echo '<div style="margin-top:40px; text-align:center; color:#666; font-size:13px;">Naija ReadFest | Nigeria Reads | GWR Official Attempt</div>';
echo '</body></html>';
?> 