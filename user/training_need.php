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
    $semester = $_POST['semester'];

    mysqli_query($db,"INSERT INTO training_need VALUES (null,'$empid','$trainingtype','$Type_of_seminar_training','$semester')");
    echo "<script>window.location='trainings_need_view.php';</script>";
}
?>
<div class="s-12 l-10">
    <h1>Request for Training</h1><hr>
    <div class="clearfix"></div>
</div>
<div class="s-12 l-6">
    <form action="" method="post" enctype="multipart/form-data"> <!-- Add enctype attribute for file upload -->
        <label for="trainingtype">Training Need</label>
        <input type="text" id="trainingtype" name="trainingtype" placeholder="Training/Seminar Title" title="Training Need" required="" autocomplete="off">
        <label>Type Seminar/Training</label>
        <select id="type_of_seminar/training" name="Type_of_seminar_training" title="Select Type of Seminar/Training" required="">
            <option value="">-- Select Type Seminar/Training --</option>
            <?php while($row = mysqli_fetch_assoc($sql)) { ?>
                <option value="<?php echo $row['Type_of_seminar_training']; ?>"><?php echo ucfirst($row['Type_of_seminar_training']);?></option>
            <?php } ?>
        </select>
        <label for="semester">Semester</label>
        <select id="semester" name="semester" required="">
            <option value="">-- Select Semester --</option>
            <option value="1">1</option>
            <option value="2">2</option>
        </select>
        <input type="submit" name="training" title="Save" value="Save">
    </form>
</div>
<div class="l-4">
    <a href="trainings_need_view.php" style="float: right; margin-top: 40vh;">View Trainings Needed</a>
</div>
<?php include('userfooter.php'); ?>
