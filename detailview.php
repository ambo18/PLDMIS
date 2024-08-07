<?php include('header.php'); ?>
<?php
	include_once('controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();
	$row = "";
	$gendern ="";
	$maritaln ="";
	$cityn ="";
	$staten ="";
	$positionn = "";
	$rolen ="";
	if(isset($_GET['employeeid']))
	{
		$empid = $_GET['employeeid'];

		$view = mysqli_query($db,"select * from employee where EmpId='$empid'");
		$row = mysqli_fetch_assoc($view);
		
		$genderid = $row['Gender'];
		$gid = mysqli_query($db,"select * from gender where GenderId='$genderid'");
		$gendern = mysqli_fetch_assoc($gid);

		$maritalid = $row['MaritalStatus'];
		$mid = mysqli_query($db,"select * from maritalstatus where MaritalId='$maritalid'");
		$maritaln = mysqli_fetch_assoc($mid);

		$positionid = $row['PositionId'];
		$pid = mysqli_query($db,"select * from position where PositionId='$positionid'");
		$positionn = mysqli_fetch_assoc($pid);

		$roleid = $row['RoleId'];
		$rid= mysqli_query($db,"select * from role where RoleId='$roleid'");
		$rolen = mysqli_fetch_assoc($rid);
	}
	if(isset($_POST['edit'])) {
		$employeeid = $_POST['employeeid'];
		echo "<script>window.location='employeeadd.php?empid=$employeeid';</script>";
	}
	else if(isset($_POST['close'])) {
		echo "<script>window.location='employeeview.php';</script>";
	}
	  
?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Tables<i class="fa fa-angle-right"></i>Employee View<i class="fa fa-angle-right"></i>Detail View</li>
</ol>
<form method="post">
<div class="validation-form" style="margin-top: 0;">
<h2 style="text-transform: capitalize; margin: 0px;">
    <?php
    if ($row) {
        echo $row['FirstName'] . "&nbsp;" . $row['MiddleName'] . "&nbsp;" . $row['LastName'] . " -&nbsp;" . $row['AcademicRank'];
    } else {
        echo "Null";
    ?> -&nbsp;&nbsp;<font color="black">
    <?php
        if ($row) {
            echo "Employee ID :: &nbsp;&nbsp;" . $row['EmployeeId'];
        } else {
            echo "<b>Employee ID</b> :: &nbsp;&nbsp; Null";
        }
    }
    ?>
    </font>
</h2>
	<div class="row">
		<div class="col-md-4">
			<table>
				<tbody>
					<tr>
						<td rowspan="2" style="text-align: right;"><b>Photo</b>&nbsp; ::</td>
						<td rowspan="2"><img src="image/<?php if($row) { echo $row['ImageName']; } else{ echo "Null"; }?>" style=" height: 61px; border: double;"></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Permanent Address</b> &nbsp;::</td>
						<td><?php if($row) { echo $row['Address1']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Present Address</b> &nbsp;::</td>
						<td><?php if($row) { echo $row['Address1']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Gender</b> ::</td>
						<td><?php if($gendern) { echo ucfirst($gendern['Name']); } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Birth Date</b> ::</td>
						<td><?php if($row) { echo $row['Birthdate']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Marital</b> ::</td>
						<td><?php if($maritaln) { echo $maritaln['Name']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Email</b> ::</td>
						<td><?php if($row) { echo $row['Email']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Mobile</b> ::</td>
						<td><?php if($row) { echo $row['Mobile']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Designation</b> ::</td>
						<td><?php if($positionn) { echo $positionn['Name']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Highest Attainment</b> ::</td>
						<td><?php if($row) { echo $row['HighAttainment']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Role</b> ::</td>
						<td><?php if($rolen) { echo ucfirst($rolen['Name']); } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-md-4">
			<table>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>GSIS No.</b> ::</td>
						<td><?php if($row) { echo $row['GSISNO']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>PAG-IBIG No.</b> ::</td>
						<td><?php if($row) { echo $row['PAGIBIGNO']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>TIN No.</b> ::</td>
						<td><?php if($row) { echo $row['TINNO']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>PHILHEALTH No.</b> ::</td>
						<td><?php if($row) { echo $row['PHILHEALTHNO']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Department</b> ::</td>
						<td><?php if($row) { echo $row['Department']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
				<tbody>
					<tr>
						<td style="text-align: right;"><b>Date of Employment</b> ::</td>
						<td><?php if($row) { echo $row['JoinDate']; } else{ echo "Null"; }?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row" style="text-align: center; margin-top: 2%;">
		<div class="col-md-12 form-group">
			<input type="hidden" name="employeeid" value="<?php echo $empid; ?>">
			<button type="submit" name="edit" class="btn btn-primary">Edit</button>
			<button type="submit" name="close" class="btn btn-primary">Close</button>
		</div>
	</div>
</div>
</form>
<?php include('footer.php'); ?>