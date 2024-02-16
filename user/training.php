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
    $currentstatus = $_POST['currentstatus'];
    $targetstatus = $_POST['targetstatus'];
    $date = $_POST['date'];

    // Handle file upload
    $certificateFileName = $_FILES['certificate']['name'];
    $certificateTempName = $_FILES['certificate']['tmp_name'];
    $certificatePath = "img/" . $certificateFileName;
    move_uploaded_file($certificateTempName, $certificatePath);

    mysqli_query($db,"INSERT INTO trainingdetails VALUES (null,'$empid','$trainingtype','$Type_of_seminar_training','$currentstatus','$targetstatus','$date','$certificateFileName')");
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
        <label for="currentstatus">Current Status/Current Competency Level</label>
        <input type="text" id="currentstatus" name="currentstatus" placeholder="Current Status" title="Current Status" required="" autocomplete="off">
        <label for="targetstus">Target Status/Target Competency Level</label>
        <input type="text" id="targetstatus" name="targetstatus" placeholder="Target Status" title="Target Status" required="" autocomplete="off">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" class="form-control" required="">
        <label for="certificate">Certificate</label><br>
        <input type="file" name="certificate" title="certificate" required="" autocomplete="off">
        <input type="submit" name="training" title="Save" value="Save">
    </form>
</div>
<div class="l-4">
    <a href="trainingsview.php" style="float: right; margin-top: 520px;">View Training/Seminar Attended</a>
</div>
<?php include('userfooter.php'); ?>
