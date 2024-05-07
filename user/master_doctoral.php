<?php include('userheader.php'); ?>
<?php
include_once('../controller/connect.php');

$dbs = new database();
$db = $dbs->connection();

$empid = $_SESSION['User']['EmployeeId'];

if(isset($_POST['add_degree'])) {
    $degree_type = $_POST['degree_type'];
    $degree_name = $_POST['degree_name'];
    $units = $_POST['units'];
    $location = $_POST['location'];
    $calendar_year = $_POST['calendar_year'];
    $implementation_year = $_POST['implementation_year'];
    $year = $_POST['year'];
    $no_development = $_POST['no_development'];
    $years_essu = $_POST['years_essu'];
    $performance_rating = $_POST['performance_rating'];
    $year_completed = $_POST['year_completed'];

    mysqli_query($db, "INSERT INTO degreedetails (EmpId, CalendarYear, ImplementationYear, Year, NoDevelopment, YearsInEssu, PerformanceRating, DegreeType, DegreeName, Units, Location, YearCompleted) 
    VALUES ('$empid', '$calendar_year', '$implementation_year', '$year','$no_development','$years_essu','$performance_rating', '$degree_type', '$degree_name', '$units', '$location', '$year_completed')");
    echo "<script>window.location='degreesview.php';</script>";
}
?>
<div class="s-12 l-10">
    <h1>Doctoral/Masteral Degree</h1><hr>
    <div class="clearfix"></div>
</div>
<div class="s-12 l-6">
    <form action="" method="post"> 
        <label for="degree_type">Degree Type</label>
        <select id="degree_type" name="degree_type" required="">
            <option value="">-- Select Degree Type --</option>
            <option value="Doctoral">Doctoral</option>
            <option value="Masteral">Masteral</option>
        </select>
        <label for="degree_name">Degree Name</label>
        <input type="text" id="degree_name" name="degree_name" placeholder="Degree Name" title="Degree Name" required="" autocomplete="off">
        <label for="units">Units</label>
        <input type="text" id="units" name="units" placeholder="Units" title="Units" required="" autocomplete="off">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" placeholder="Location" title="Location" required="" autocomplete="off">
        <label for="year_completed">Year Completed</label>
        <input type="number" id="year_completed" name="year_completed" placeholder="Year Completed" title="Year Completed" required="" autocomplete="off">
        <label for="calendar_year">Calendar Year</label>
        <input type="text" id="calendar_year" name="calendar_year" placeholder="Calendar Year" title="Calendar Year" required="" autocomplete="off">
        <label for="implementation_year">Implementation Year</label>
        <input type="number" id="implementation_year" name="implementation_year" placeholder="Implementation Year" title="Implementation Year" required="" autocomplete="off">
        <label for="year">Year</label>
        <select id="year" name="year" required="">
            <option value="">-- Select Year --</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <label for="no_development">No Development is required/desired</label>
        <input type="text" id="no_development" name="no_development" placeholder="No Development" title="No Development" required="" autocomplete="off">
        <label for="years_essu">Years in ESSU</label>
        <input type="number" id="years_essu" name="years_essu" placeholder="Years in ESSU" title="Years in ESSU" required="" autocomplete="off">
        <label for="performance_rating">Performance Rating</label>
        <input type="text" id="performance_rating" name="performance_rating" placeholder="Performance Rating" title="Performance Rating" required="" autocomplete="off">
        <input type="submit" name="add_degree" title="Save" value="Save">
    </form>
</div>
<div class="l-4">
    <a href="degreesview.php" style="float: right; margin-top: 141vh;">View Degrees</a>
</div>
<?php include('userfooter.php'); ?>
