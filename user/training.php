<?php include('userheader.php'); ?>
<?php
include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

$empid = $_SESSION['User']['EmployeeId'];
$sql = mysqli_query($db,"select * from type_of_seminar_training");
if(isset($_POST['training']))
{
    $trainingtype = $_POST['trainingtype'];
    $Type_of_seminar_training = $_POST['Type_of_seminar_training'];
    $calendar_year = $_POST['calendar_year'];
    $implementation_year = $_POST['implementation_year'];
    $year = $_POST['year'];
    $no_development = $_POST['no_development'];
    $years_essu = $_POST['years_essu'];
    $performance_rating = $_POST['performance_rating'];
    $currentstatus = $_POST['currentstatus'];
    $targetstatus = $_POST['targetstatus'];
    $objectives = $_POST['objectives'];
    $location = $_POST['location'];
    $sponsor_agency = $_POST['sponsor_agency'];
    $category = $_POST['category'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $no_of_hours = $_POST['no_of_hours'];

    // Handle file upload
    $certificateFileName = $_FILES['certificate']['name'];
    $certificateTempName = $_FILES['certificate']['tmp_name'];
    $certificatePath = "img/" . $certificateFileName;
    move_uploaded_file($certificateTempName, $certificatePath);

    mysqli_query($db,"INSERT INTO trainingdetails VALUES (null,'$empid','$trainingtype','$Type_of_seminar_training', 
    '$calendar_year', '$implementation_year', '$year','$no_development','$performance_rating', 
    '$currentstatus','$targetstatus','$objectives','$location','$sponsor_agency','$category','$start_date','$end_date','$no_of_hours','$certificateFileName')");
    echo "<script>window.location='trainingsview.php';</script>";
}
?>
<div class="s-12 l-10">
    <h1>Training/Seminar</h1><hr>
    <div class="clearfix"></div>
</div>
<div class="s-12 l-6">
    <form action="" method="post" enctype="multipart/form-data"> <!-- Add enctype attribute for file upload -->
        <label for="trainingtype">Training/Seminar Title</label>
        <input type="text" id="trainingtype" name="trainingtype" placeholder="Training/Seminar Title" title="Training" required="" autocomplete="off">
        <label>Type Seminar/Training</label>
        <select id="type_of_seminar/training" name="Type_of_seminar_training" title="Select Type of Seminar/Training" required="">
            <option value="">-- Select Type Seminar/Training --</option>
            <?php while($row = mysqli_fetch_assoc($sql)) { ?>
                <option value="<?php echo $row['Type_of_seminar_training']; ?>"><?php echo ucfirst($row['Type_of_seminar_training']);?></option>
            <?php } ?>
        </select>
        <label for="start_date">Start Date</label>
        <input type="date" id="start_date" name="start_date" title="Start Date" required="" autocomplete="off">
        <label for="end_date">End Date</label>
        <input type="date" id="end_date" name="end_date" title="End Date" required="" autocomplete="off">
        <label for="no_of_hours">No. of Hours</label>
        <input type="number" id="no_of_hours" name="no_of_hours" placeholder="No. of Hours" title="No. of Hours" required="" autocomplete="off">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" placeholder="Location" title="Location" required="" autocomplete="off">
        <label for="sponsor_agency">Sponsor Agency</label>
        <input type="text" id="sponsor_agency" name="sponsor_agency" placeholder="Sponsor Agency" title="Sponsor Agency" required="" autocomplete="off">
        <label for="category">Category</label>
        <select id="category" name="category" required="">
            <option value="">-- Select Category --</option>
            <option value="National">National</option>
            <option value="Local">Local</option>
            <option value="Regional">Regional</option>
            <option value="International">International</option>
        </select>
        <label for="certificate">Certificate</label><br>
        <input type="file" name="certificate" title="certificate" required="" autocomplete="off">
        <hr>
        <label for="calendar_year">Calendar Year</label>
        <input type="text" id="calendar_year" name="calendar_year" placeholder="Calendar Year" title="Calendar Year" required="" autocomplete="off">
        <label for="implementation_year">Implementation Year</label>
        <input type="number" id="implementation_year" name="implementation_year" placeholder="CaleImplementationndar Year" title="Implementation Year" required="" autocomplete="off">
        <label for="year">Year</label>
        <select id="year" name="year" required="">
            <option value="">-- Select Year --</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <label for="no_development">No Development is required/desired</label>
        <input type="text" id="no_development" name="no_development" placeholder="No Development" title="No Development" required="" autocomplete="off">
        <label for="performance_rating">Performance Rating</label>
        <input type="text" id="performance_rating" name="performance_rating" placeholder="Performance Rating" title="Performance Rating" required="" autocomplete="off">
        <label for="currentstatus">Current Status/Current Competency Level</label>
        <input type="text" id="currentstatus" name="currentstatus" placeholder="Current Status" title="Current Status" required="" autocomplete="off">
        <label for="targetstus">Target Status/Target Competency Level</label>
        <input type="text" id="targetstatus" name="targetstatus" placeholder="Target Status" title="Target Status" required="" autocomplete="off">
        <label for="objectives">Objectives</label>
        <input type="text" id="objectives" name="objectives" placeholder="Objectives" title="Objectives" required="" autocomplete="off">
        <input type="submit" name="training" title="Save" value="Save">
    </form>
</div>
<div class="l-4">
    <a href="trainingsview.php" style="float: right; margin-top: 207vh;">View Training/Seminar Attended</a>
</div>
<?php include('userfooter.php'); ?>
