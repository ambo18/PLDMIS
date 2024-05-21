<?php

$query      = $_GET['query'];
$tblHeader  = $_GET['tblHeader'];
$fileName   = $_GET['fileName'];

// Ensure $conn is defined
if (!isset($conn)) {
    include_once('controller/connect.php');
    $dbs = new database();
    $conn = $dbs->connection();
}

if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$fileName.'.csv');
$output = fopen('php://output', 'w');
fputcsv($output, explode(",", $tblHeader));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}

// Close the database connection after exporting data
mysqli_close($conn);
?>
