<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            text-align: justify;
        }
        img {
            margin: 0 auto;
            width: 300px;
            height: 110px;
            text-align: left;
        }
        h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include_once('../controller/connect.php');

        $dbs = new database();
        $db = $dbs->connection();

        if (isset($_GET['detailId'])) {
            $detailId = $_GET['detailId'];

            // Fetch employee ID from trainingdetails table
            $empIdResult = mysqli_query($db, "SELECT EmpId FROM trainingdetails WHERE Detail_Id = '$detailId'");
            $empIdData = mysqli_fetch_assoc($empIdResult);
            $empId = $empIdData['EmpId'];

            // Fetch employee data
            $employeeQuery = mysqli_query($db, "SELECT * FROM employee WHERE EmployeeId = '$empId'");
            $employeeData = mysqli_fetch_assoc($employeeQuery);

            // Calculate years in ESSU
            $joinDate = new DateTime($employeeData['JoinDate']);
            $currentDate = new DateTime();
            $yearsInESSU = $currentDate->diff($joinDate)->y;

            // Check if mysqli_query was successful
            $result = mysqli_query($db, "SELECT * FROM trainingdetails WHERE Detail_Id = '$detailId'");
            if ($result) {
                // Check if a row was fetched
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    echo '<img src="img/essu_logo.png" alt="Essu Logo">';
                    echo "<div class='center'>";
                    echo "<strong>CY {$row['CalendarYear']}</strong>";
                    echo "<p><strong>Implementation Year: 2024</strong></p>";
                    echo "<p><strong>Year: </strong> {$row['Year']} &nbsp;&nbsp;&nbsp; <strong>No Development is required /desired: </strong> {$row['NoDevelopment']}</p>";
                    echo "<p><strong>Name</strong>: {$employeeData['FirstName']} {$employeeData['MiddleName']} {$employeeData['LastName']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Years in ESSU</strong>: $yearsInESSU</p>";
                    echo "<p><strong>Current Position</strong>: {$employeeData['AcademicRank']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Recent Performance rating</strong>: {$row['PerformanceRating']}</p>";
                    echo "</div>";
                    echo "<table>";
                    echo "<tr><th colspan='4'>TRAINING AND SEMINAR DETAILS</th></tr>";
                    echo "<tr><th>Training/Seminar Type</th><th>Current Status<br>Current<br>Current Competency Level</th><th>TARGET STATUS TARGET<br>COMPENTENCY LEVEL</th><th>OBJECTIVES</th></tr>";
                    echo "<tr><td>{$row['Type_of_seminar_training']}</td><td>{$row['CurrentStatus']}</td><td>{$row['TargetStatus']}</td><td>{$row['Objectives']}</td></tr>";
                    echo "</table>";
                } else {
                    echo "<p>No data found for the specified detailId</p>";
                }
            } else {
                echo "<p>Error fetching data from the database</p>";
            }
        }
        ?>
    </div>
</body>
</html>
