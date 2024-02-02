<?php
include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

if (isset($_GET['detailId'])) {
    $detailId = $_GET['detailId'];

    $result = mysqli_query($db, "SELECT * FROM trainingdetails WHERE Detail_Id = '$detailId'");
    $row = mysqli_fetch_assoc($result);

    echo "<h2>Training/Seminar Details</h2>";
    echo "<p><strong>Seminar/Training Title:</strong> " . $row['TrainingType'] . "</p>";
    echo "<p><strong>Seminar/Training Type:</strong> " . $row['Type_of_seminar_training'] . "</p>";
    echo "<p><strong>Current Status:</strong> " . $row['CurrentStatus'] . "</p>";
    echo "<p><strong>Target Status:</strong> " . $row['TargetStatus'] . "</p>";
    echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";

}
?>
