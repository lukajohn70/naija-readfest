<?php
require_once 'db.php';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="naijareadfest_exhibitors.xls"');

echo '<html><head><meta charset="UTF-8"><title>Naija ReadFest Exhibitor Applications</title></head><body>';
echo '<div style="text-align:center; margin-bottom:20px;">';
echo '<img src="public/naijareadfest-logo.png" style="height:60px; margin-right:20px;">';
echo '<img src="public/partners/nigeria-reads.png" style="height:60px; margin-right:20px;">';
echo '<img src="public/gwr.png" style="height:60px;">';
echo '<h2 style="margin:10px 0 0 0; color:#008000; font-family:sans-serif;">Naija ReadFest Exhibitor Applications</h2>';
echo '<div style="font-size:14px; color:#333;">Exported: '.date('F j, Y, g:i a').'</div>';
echo '</div>';
echo '<table border="1" cellpadding="6" cellspacing="0" style="border-collapse:collapse; width:100%; font-size:13px; font-family:sans-serif;">';
echo '<tr style="background:#008000; color:#fff;">';
echo '<th>#</th><th>Organization</th><th>Contact</th><th style="mso-number-format:\@;">Phone</th><th>Email</th><th>Titles</th><th>Submitted</th><th>Profile</th><th>Booth</th><th>Special Requests</th>';
echo '</tr>';
$where = '';
if (!empty($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $where = "WHERE org_name LIKE '%$search%' OR contact_name LIKE '%$search%' OR contact_email LIKE '%$search%' OR org_profile LIKE '%$search%' OR booth_requirements LIKE '%$search%' OR special_requests LIKE '%$search%'";
}
$result = $mysqli->query("SELECT * FROM exhibitors $where ORDER BY submitted_at ASC");
$i = 1;
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.htmlspecialchars($row['org_name']).'</td>';
    echo '<td>'.htmlspecialchars($row['contact_name']).'</td>';
    echo '<td style="mso-number-format:\@;">'.htmlspecialchars($row['contact_phone']).'</td>';
    echo '<td>'.htmlspecialchars($row['contact_email']).'</td>';
    echo '<td style="text-align:center;">'.(int)$row['num_titles'].'</td>';
    echo '<td>'.htmlspecialchars($row['submitted_at']).'</td>';
    echo '<td>'.nl2br(htmlspecialchars($row['org_profile'])).'</td>';
    echo '<td>'.nl2br(htmlspecialchars($row['booth_requirements'])).'</td>';
    echo '<td>'.nl2br(htmlspecialchars($row['special_requests'])).'</td>';
    echo '</tr>';
    $i++;
}
echo '</table></body></html>';
?> 