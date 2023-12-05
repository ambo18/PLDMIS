<?php include('header.php'); ?>
<?php
  include_once('controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();
  $TotalEmp =mysqli_query($db,"select count(EmployeeId) as emp from employee");
  $TotalEmploId = mysqli_fetch_assoc($TotalEmp);
  $pandingleave = mysqli_query($db,"select count(LeaveStatus) as pleave from leavedetails where LeaveStatus='Pending'");
  $tpandingleave = mysqli_fetch_assoc($pandingleave);
?>

<!--four-grids here-->
		<div class="row" style="margin-top: 20px;">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="panel panel-default bg-light dash-summary">
							<div class="panel-body">
								<a href="employeeview.php">
									<div class="icon">
										<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Employee</h3>
										<h4><?php echo(isset($TotalEmploId['emp']))?$TotalEmploId['emp']:"";?></h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="panel panel-default bg-light dash-summary">
							<div class="panel-body">
								<a href="leaverequest.php">
									<div class="icon">
										<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
									</div>
									<div class="four-text">
										<h3>Leave Request</h3>
										<h4><?php echo(isset($tpandingleave['pleave']))?$tpandingleave['pleave']:"";?></h4>
									</div>
								</a>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
  
<?php include('footer.php'); ?>

