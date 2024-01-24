<?php include('userheader.php'); ?>
<?php
  include_once('../controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  $empid = $_SESSION['User']['EmployeeId'];

  if(isset($_POST['seminar']))
  {
    $seminartype = $_POST['seminartype'];
    $date = $_POST['date'];
    $progress = $_POST['progress'];

    mysqli_query($db,"insert into seminardetails values(null,'$empid','$seminartype','$date','$progress')");
    echo "<script>window.location='home.php';</script>";
  }
?>
               <div class="s-12 l-10">
               <h1>Seminar</h1><hr>
               <div class="clearfix"></div>
               </div>
               <div class="s-12 l-6">
                 	<form action="" method="post">
					    <label for="seminartype">Seminar</label>
					        <input type="text" id="seminartype" name="seminartype" placeholder="Seminar" title="Seminar" required="" autocomplete="off">
                        <label for="date">Date</label>
					        <input type="date" id="date" name="date" placeholder="Date" title="Date" class="form-control" required="">
                        <label for="progress">Progress</label>
					        <input type="number" pattern="\d{1,3}" min="0" max="100" id="progress" name="progress" placeholder="0-100" title="progress" required="">
					    <input type="submit" name="seminar" title="Submit" value="Submit">
				  	</form>
               </div>

<?php include('userfooter.php'); ?>


