<?php include('userheader.php'); ?>
<?php
include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

$empid = $_SESSION['User']['EmployeeId'];
$sql = mysqli_query($db, "select * from type_of_leave ");

if (isset($_POST['Apply'])) {
    $leave = $_POST['leavestatus'];
    $commutation = $_POST['commutation'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $leavestatus = "Pending";

    $otherLeave = isset($_POST['otherLeave']) ? $_POST['otherLeave'] : '';
    $detailsLeave = isset($_POST['detailsLeave']) ? $_POST['detailsLeave'] : '';
    $illness = isset($_POST['illness']) ? $_POST['illness'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';

    /*date format*/
    $date = str_replace('/', '-', $startdate);
    $startd = date('Y-m-d', strtotime($date));
    $datee = str_replace('/', '-', $enddate);
    $endd = date('Y-m-d', strtotime($datee));
    /*end date format*/

    // Check if required fields are filled based on the selected type of leave
    if (
        ($leave == 'Sick Leave' && (!$detailsLeave || (!$illness && ($detailsLeave == 'In Hospital' || $detailsLeave == 'Out Patient')))) ||
        ($leave == 'Vacation Leave' && (!$detailsLeave || !$location || !$startdate || !$enddate)) ||
        ($leave == 'Special Privilege Leave' && (!$detailsLeave || !$location || !$startdate || !$enddate)) ||
        ($leave == 'Other' && !$otherLeave)
    ) {
        echo "<script>alert('Please fill in all required fields.');</script>";
    } else {
        // Insert into the corresponding tables based on leave type
        if ($leave == 'Vacation Leave' || $leave == 'Special Privilege Leave') {
            mysqli_query($db, "INSERT INTO vacationleave VALUES (null, '$empid', '$detailsLeave', '$location')");
        } elseif ($leave == 'Sick Leave') {
            mysqli_query($db, "INSERT INTO sickleave VALUES (null, '$empid', '$detailsLeave', '$illness')");
        } elseif ($leave == 'Other') {
            mysqli_query($db, "INSERT INTO otherleave VALUES (null, '$empid', '$otherLeave')");
        }

        mysqli_query($db, "INSERT INTO leavedetails VALUES (null, '$empid', '$leave', '$commutation', '$startd', '$endd', '$leavestatus')");
        echo "<script>window.location='leavestatus.php';</script>";
    }
}
?>
<div class="s-12 l-10">
    <h1>Apply Leave</h1><hr>
    <div class="clearfix"></div>
</div>
<div class="s-12 l-6">
    <form action="" method="post">
        <label>Type Leave</label>
        <select id="country" name="leavestatus" title="Select Leave" required="" onchange="checkLeaveType(this)">
            <option value="">-- Select Leave --</option>
            <option value="Sick Leave">Sick Leave</option>
            <option value="Vacation Leave">Vacation Leave</option>
            <option value="Special Privilege Leave">Special Privilege Leave</option>
            <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                <option value="<?php echo $row['Type_of_Name']; ?>"><?php echo ucfirst($row['Type_of_Name']); ?></option>
            <?php } ?>
            <option value="Other">Other</option>
        </select>

        <div id="otherLeaveField" class="s-12" style="display:none;">
            <label for="otherLeave">Other Leave Type</label>
            <input type="text" id="otherLeave" name="otherLeave" placeholder="Other Leave Type" title="Other Leave Type" autocomplete="off">
        </div>

        <div id="detailsLeaveField" class="s-12" style="display:none;">
            <label for="detailsLeave">Details Leave</label>
            <select id="detailsLeave" name="detailsLeave" onchange="checkDetailsLeave(this)">
                <option value="">-- Select Details Leave --</option>
                <option value="Within Philippines">Within the Philippines</option>
                <option value="Abroad">Abroad</option>
                <option value="In Hospital">In Hospital</option>
                <option value="Out Patient">Out Patient</option>
            </select>
        </div>

        <div id="locationField" class="s-12" style="display:none;">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" placeholder="Location" title="Location" autocomplete="off">
        </div>

        <div id="illnessField" class="s-12" style="display:none;">
            <label for="illness">Illness</label>
            <input type="text" id="illness" name="illness" placeholder="Illness" title="Illness" autocomplete="off">
        </div>

        <label for="commutation">Commutation</label>
        <select id="commutation" name="commutation">
            <option value="">-- Select Commutation --</option>
            <option value="Not Requested">Not Requested</option>
            <option value="Requested">Requested</option>
        </select>

        <label for="numberofworkingdays">Number of Working Days Applied For</label>
        <div class="s-6" style="padding: 10px;">
            <label for="lname">Start Date</label>
            <input type="text" id="StartDate" name="startdate" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" placeholder="Start Date" title="Start Date" required="">
        </div>

        <div class="s-6" style="padding: 10px;">
            <label for="lname">End Date</label>
            <input type="text" id="EndDate" name="enddate" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off" placeholder="End Date" title="End Date" required="">
        </div>

        <input type="submit" name="Apply" title="Submit" value="Submit">
    </form>
</div>

<?php include('userfooter.php'); ?>

<script type="text/javascript">
    function checkLeaveType(select) {
        var otherLeaveField = document.getElementById('otherLeaveField');
        var detailsLeaveField = document.getElementById('detailsLeaveField');
        var locationField = document.getElementById('locationField');
        var illnessField = document.getElementById('illnessField');
        var otherLeaveInput = document.getElementById('otherLeave');
        var detailsLeaveSelect = document.getElementById('detailsLeave');

        otherLeaveField.style.display = 'none';
        detailsLeaveField.style.display = 'none';
        locationField.style.display = 'none';
        illnessField.style.display = 'none';

        otherLeaveInput.required = false;

        if (select.value === 'Other') {
            otherLeaveField.style.display = 'block';
            otherLeaveInput.required = true;
        } else if (select.value === 'Vacation Leave' || select.value === 'Special Privilege Leave') {
            detailsLeaveField.style.display = 'block';
            locationField.style.display = 'block';

            updateDetailsLeaveOptions(['-- Select Details Leave --', 'Within Philippines', 'Abroad']);
        } else if (select.value === 'Sick Leave') {
            detailsLeaveField.style.display = 'block';
            illnessField.style.display = 'block';

            updateDetailsLeaveOptions(['-- Select Details Leave --', 'In Hospital', 'Out Patient']);
        }
    }

    function updateDetailsLeaveOptions(options) {
        var detailsLeaveSelect = document.getElementById('detailsLeave');

        // Clear existing options
        detailsLeaveSelect.innerHTML = '';

        // Add new options
        options.forEach(function (option) {
            var optionElement = document.createElement('option');
            optionElement.text = option;
            optionElement.value = option;
            detailsLeaveSelect.add(optionElement);
        });
    }

    function checkDetailsLeave(select) {
        var countryField = document.getElementById('countryField');
        var locationField = document.getElementById('locationField');
        var illnessField = document.getElementById('illnessField');

        countryField.style.display = 'none';
        locationField.style.display = 'none';
        illnessField.style.display = 'none';

        if (select.value === 'Abroad' || select.value === 'Within Philippines') {
            locationField.style.display = 'block';
        } else if (select.value === 'In Hospital' || select.value === 'Out Patient') {
            illnessField.style.display = 'block';
        }
    }

    $('#EndDate').datetimepicker({
        yearOffset: 0,
        lang: 'ch',
        timepicker: false,
        format: 'd/m/Y',
        formatDate: 'Y/m/d',
        minDate: '2015/01/01',
        maxDate: '2030/01/01'
    });

    $('#StartDate').datetimepicker({
        yearOffset: 0,
        lang: 'ch',
        timepicker: false,
        format: 'd/m/Y',
        formatDate: 'Y/m/d',
        minDate: '2015/01/01',
        maxDate: '2030/01/01'
    });
</script>
