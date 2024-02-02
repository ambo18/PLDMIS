<?php
// print_leave.php

include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

if (isset($_GET['EmpId'])) {
    $empId = $_GET['EmpId'];

    // Fetch the data from leavedetails
    $leaveDataQuery = mysqli_query($db, "SELECT * FROM leavedetails WHERE EmpId = '$empId'");
    $leaveData = mysqli_fetch_assoc($leaveDataQuery);

    // Fetch employee details
    $employeeQuery = mysqli_query($db, "SELECT * FROM employee WHERE EmployeeId = '$empId'");
    $employeeData = mysqli_fetch_assoc($employeeQuery);

    if ($leaveData && $employeeData) {
        // Output employee details
        echo "<h2>Employee Information</h2>";
        echo "<p><strong>Employee ID:</strong> " . $employeeData['EmployeeId'] . "</p>";
        echo "<p><strong>First Name:</strong> " . $employeeData['FirstName'] . "</p>";
        echo "<p><strong>Middle Name:</strong> " . $employeeData['MiddleName'] . "</p>";
        echo "<p><strong>Last Name:</strong> " . $employeeData['LastName'] . "</p>";

        // Output the common leave details
        echo "<h2>Leave Application Details</h2>";
        echo "<p><strong>Leave Type:</strong> " . $leaveData['TypesLeaveId'] . "</p>";
        echo "<p><strong>Commutation:</strong> " . $leaveData['Commutation'] . "</p>";
        echo "<p><strong>Start Date:</strong> " . $leaveData['StateDate'] . "</p>";
        echo "<p><strong>End Date:</strong> " . $leaveData['EndDate'] . "</p>";
        echo "<p><strong>Status:</strong> " . $leaveData['LeaveStatus'] . "</p>";

        // Fetch additional data based on leave type
        $leaveType = $leaveData['TypesLeaveId'];
        $additionalDataQuery = '';

        if ($leaveType == 'Sick Leave') {
            $additionalDataQuery = mysqli_query($db, "SELECT * FROM sickleave WHERE EmpId = '$empId'");
        } elseif ($leaveType == 'Vacation Leave' || $leaveType == 'Special Privilege Leave') {
            $additionalDataQuery = mysqli_query($db, "SELECT * FROM vacationleave WHERE EmpId = '$empId'");
        } elseif ($leaveType == 'Other') {
            $additionalDataQuery = mysqli_query($db, "SELECT * FROM otherleave WHERE EmpId = '$empId'");
        }

        if ($additionalDataQuery && mysqli_num_rows($additionalDataQuery) > 0) {
            $additionalData = mysqli_fetch_assoc($additionalDataQuery);

            // Output additional data based on leave type
            if ($leaveType == 'Sick Leave') {
                echo "<p><strong>Illness:</strong> " . $additionalData['Illness'] . "</p>";
            } elseif ($leaveType == 'Vacation Leave' || $leaveType == 'Special Privilege Leave') {
                echo "<p><strong>Details Leave:</strong> " . $additionalData['DetailsLeave'] . "</p>";
                echo "<p><strong>Location:</strong> " . $additionalData['Location'] . "</p>";
            } elseif ($leaveType == 'Other') {
                echo "<p><strong>Other Leave Type:</strong> " . $additionalData['OtherLeaveType'] . "</p>";
            }
        }

        // You can customize the printable format based on your requirements
    } else {
        echo "<p>No leave details found for the specified employee.</p>";
    }
}
?>
