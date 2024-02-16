<?php
include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

if (isset($_GET['detailId'])) {
    $detailId = $_GET['detailId'];

    // Check if mysqli_query was successful
    $result = mysqli_query($db, "SELECT * FROM trainingdetails WHERE Detail_Id = '$detailId'");
    if ($result) {
        // Check if a row was fetched
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "<h2>Training/Seminar Details</h2>";
            echo "<p><strong>Seminar/Training Title:</strong> " . $row['TrainingType'] . "</p>";
            echo "<p><strong>Seminar/Training Type:</strong> " . $row['Type_of_seminar_training'] . "</p>";
            echo "<p><strong>Current Status:</strong> " . $row['CurrentStatus'] . "</p>";
            echo "<p><strong>Target Status:</strong> " . $row['TargetStatus'] . "</p>";
            echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
            // Check if the certificate column is not empty
            if (!empty($row['certificate'])) {
                // The certificate column contains the filename of the image
                $certificateFilename = $row['certificate'];
                // Construct the URL to the image file
                $certificateImageUrl = "img/" . $certificateFilename;
                // Output the image tag
                echo "<p><strong>Certificate:</strong> <img src='$certificateImageUrl' alt='Certificate' style='width: 200px; height: auto;'></p>";
            } else {
                echo "<p>No certificate found</p>";
            }
        } else {
            echo "<p>No data found for the specified detailId</p>";
        }
    } else {
        echo "<p>Error fetching data from the database</p>";
    }
}
?>
