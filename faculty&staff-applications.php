<?php include('header.php');?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db = $dbs->connection();

  $pageTraining = "";
  $pageTrainingNeed = "";
  $pageDegrees = "";
  $EmpId = $_SESSION['User']['EmployeeId'];

  // Retrieve total number of records for training/seminars
  $SearchName = isset($_GET['search']) ? $_GET['search'] : '';
  $total_query = mysqli_query($db, "SELECT COUNT(Detail_Id) as total FROM trainingdetails WHERE EmpId = '$EmpId' AND TrainingType LIKE '%$SearchName%'"); 
  $total_result = mysqli_fetch_array($total_query);
  $total_records = $total_result['total'];

  // Retrieve total number of records for training needed
  $SearchTrainingneed = isset($_GET['search3']) ? $_GET['search3'] : '';
  $total_query3 = mysqli_query($db, "SELECT COUNT(Detail_Id) as total FROM training_need WHERE EmpId = '$EmpId' AND TrainingType LIKE '%$SearchTrainingneed%'"); 
  $total_result3 = mysqli_fetch_array($total_query3);
  $total_records3 = $total_result3['total'];

  // Retrieve total number of records for doctoral/masteral degrees
  $SearchDegree = isset($_GET['search2']) ? $_GET['search2'] : '';
  $total_query2 = mysqli_query($db, "SELECT COUNT(Detail_Id) as total FROM degreedetails WHERE EmpId = '$EmpId' AND DegreeType LIKE '%$SearchDegree%'"); 
  $total_result2 = mysqli_fetch_array($total_query2);
  $total_records2 = $total_result2['total'];

  $RecordLimit = 10;

  // Retrieve data based on EmpId for training/seminars
  $sql = mysqli_query($db, "SELECT * FROM trainingdetails WHERE TrainingType LIKE '%$SearchName%' LIMIT $RecordLimit");

  // Retrieve data based on EmpId for doctoral/masteral degrees
  $sql2 = mysqli_query($db, "SELECT * FROM degreedetails WHERE DegreeType LIKE '%$SearchDegree%' LIMIT $RecordLimit");

  // Retrieve data based on EmpId for training needed
  $sql2 = mysqli_query($db, "SELECT * FROM training_need WHERE TrainingType LIKE '%$SearchTrainingneed%' LIMIT $RecordLimit");

  for ($i = 0; $i < ceil($total_records / $RecordLimit); $i++) {
      $d = $i + 1;
      $pageTraining .= "<a href='?search=$SearchName&bn=$d'>$d</a>&nbsp &nbsp &nbsp";
  }

  for ($i2 = 0; $i2 < ceil($total_records2 / $RecordLimit); $i2++) {
      $d2 = $i2 + 1;
      $pageDegrees .= "<a href='?search2=$SearchDegree&bn=$d2'>$d2</a>&nbsp &nbsp &nbsp";
  }
  
  for ($i3 = 0; $i3 < ceil($total_records3 / $RecordLimit); $i3++) {
    $d3 = $i3 + 1;
    $pageTrainingNeed .= "<a href='?search2=$SearchTrainingneed&bn=$d3'>$d3</a>&nbsp &nbsp &nbsp";
  }
?>

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Faculty & Staff Development</li>
</ol>
<form method="GET">
    <div class="validation-form">
        <input type="text" style="float: right;" placeholder="Search" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" name="search"><br>
        <h2>Training/Seminars</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background: #202a29;">Name of Employee</th>
                        <th style="background: #202a29;">Seminar/Training Title</th>
                        <th style="background: #202a29;">Seminar/Training Type</th>
                        <th style="background: #202a29;">Current Status</th>
                        <th style="background: #202a29;">Target Status</th>
                        <th style="background: #202a29;">Location</th>
                        <th style="background: #202a29;">Sponsor Agency</th>
                        <th style="background: #202a29;">Category</th>
                        <th style="background: #202a29;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Modify the SQL query to join with the employee table
                    $sql = mysqli_query($db, "SELECT t.*, e.FirstName, e.MiddleName, e.LastName FROM trainingdetails t INNER JOIN employee e ON t.EmpId = e.EmployeeId WHERE t.TrainingType LIKE '%$SearchName%' LIMIT $RecordLimit");

                    while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <!-- Concatenate first name, middle name, and last name to display the employee's full name -->
                            <td><?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName']; ?></td>
                            <td><?php echo $row['TrainingType']; ?></td>
                            <td><?php echo $row['Type_of_seminar_training']; ?></td>
                            <td><?php echo $row['CurrentStatus']; ?></td>
                            <td><?php echo $row['TargetStatus']; ?></td>
                            <td><?php echo $row['Location']; ?></td>
                            <td><?php echo $row['SponsorAgency']; ?></td>
                            <td><?php echo $row['Category']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div><?php echo $pageTraining; ?></div>
    </div>
</form>

<form method="get">
    <div class="validation-form"  style="margin-top: 30px;>
        <input type="text" style="float: right;" placeholder="Search" value="<?php echo (isset($_GET['search3'])) ? $_GET['search3'] : ''; ?>" name="search3"><br>
        <h2>Training Requests</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background: #202a29;">Name of Employee</th>
                        <th style="background: #202a29;">Training Title</th>
                        <th style="background: #202a29;">Training Type</th>
                        <th style="background: #202a29;">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Modify the SQL query to join with the employee table
                    $sql = mysqli_query($db, "SELECT t.*, e.FirstName, e.MiddleName, e.LastName FROM training_need t INNER JOIN employee e ON t.EmpId = e.EmployeeId WHERE t.TrainingType LIKE '%$SearchTrainingneed%' LIMIT $RecordLimit");

                    while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                        <tr>
                            <!-- Concatenate first name, middle name, and last name to display the employee's full name -->
                            <td><?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName']; ?></td>
                            <td><?php echo $row['TrainingType']; ?></td>
                            <td><?php echo $row['Type_of_seminar_training']; ?></td>
                            <td><?php echo $row['Semester']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div><?php echo $pageTrainingNeed; ?></div>
    </div>
</form>

<form method="GET">
    <div class="validation-form" style="margin-top: 30px;">
        <input type="text" style="float: right;" placeholder="Search" value="<?php echo (isset($_GET['search2'])) ? $_GET['search2'] : ''; ?>" name="search2"><br>
        <h2>Doctoral/Masteral</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="background: #202a29;">Name of Employee</th>
                        <th style="background: #202a29;">Degree Type</th>
                        <th style="background: #202a29;">Degree Name</th>
                        <th style="background: #202a29;">Units</th>
                        <th style="background: #202a29;">Location</th>
                        <th style="background: #202a29;">Year Completed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Modify the SQL query to join with the employee table
                    $sql2 = mysqli_query($db, "SELECT d.*, e.FirstName, e.MiddleName, e.LastName FROM degreedetails d INNER JOIN employee e ON d.EmpId = e.EmployeeId WHERE d.DegreeType LIKE '%$SearchDegree%' LIMIT $RecordLimit");

                    while ($row = mysqli_fetch_assoc($sql2)) { ?>
                        <tr>
                            <!-- Concatenate first name, middle name, and last name to display the employee's full name -->
                            <td><?php echo $row['FirstName'] . ' ' . $row['MiddleName'] . ' ' . $row['LastName']; ?></td>
                            <td><?php echo $row['DegreeType']; ?></td>
                            <td><?php echo $row['DegreeName']; ?></td>
                            <td><?php echo $row['Units']; ?></td>
                            <td><?php echo $row['Location']; ?></td>
                            <td><?php echo $row['YearCompleted']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div><?php echo $pageDegrees; ?></div>
    </div>
    <div class="clearfix"></div>
</form>

<?php include('footer.php'); ?>
