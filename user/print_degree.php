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
            $degreeId = $_GET['detailId'];

            // Fetch employee ID from degreedetails table
            $empIdResult = mysqli_query($db, "SELECT EmpId FROM degreedetails WHERE Detail_Id = '$degreeId'");
            $empIdData = mysqli_fetch_assoc($empIdResult);
            $empId = $empIdData['EmpId'];

            // Fetch employee data
            $employeeQuery = mysqli_query($db, "SELECT * FROM employee WHERE EmployeeId = '$empId'");
            $employeeData = mysqli_fetch_assoc($employeeQuery);

            // Check if mysqli_query was successful
            $result = mysqli_query($db, "SELECT * FROM degreedetails WHERE Detail_Id = '$degreeId'");
            if ($result) {
                // Check if a row was fetched
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    echo '<img src="img/essu_logo.png" alt="Essu Logo">';
                    echo "<div class='center'>";
                    echo "<strong>CY {$row['CalendarYear']}</strong>";
                    echo "<p><strong>Implementation Year: {$row['ImplementationYear']}</strong></p>";
                    echo "<p><strong>Year: </strong> {$row['Year']} &nbsp;&nbsp;&nbsp; <strong>No Development is required /desired: </strong> {$row['NoDevelopment']}</p>";
                    echo "<p><strong>Name</strong>: {$employeeData['FirstName']} {$employeeData['MiddleName']} {$employeeData['LastName']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Years in ESSU</strong>: {$row['YearsInEssu']}</p>";
                    echo "<p><strong>Current Position</strong>: {$employeeData['AcademicRank']} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Recent Performance rating</strong>: {$row['PerformanceRating']}</p>";
                    echo "</div>";
                    echo "<table>";
                    echo "<tr><th colspan='3'>DEGREE DETAILS</th></tr>";
                    echo "<tr><th>Degree Type</th><th>Degree Name</th><th>Year Completed</th></tr>";
                    echo "<tr><td>{$row['DegreeType']}</td><td>{$row['DegreeName']}</td><td>{$row['YearCompleted']}</td></tr>";
                    echo "</table>";
                } else {
                    echo "<p>No data found for the specified degreeId</p>";
                }
            } else {
                echo "<p>Error fetching data from the database</p>";
            }
        }
        ?>
    </div>
</body>
</html>
