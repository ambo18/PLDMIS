<?php include('userheader.php'); ?>
<?php
  include_once('../controller/connect.php');
  
  $dbs = new database();
  $db=$dbs->connection();

  $empid = $_SESSION['User']['EmployeeId'];
  $leavedetails = mysqli_query($db,"SELECT * FROM leavedetails WHERE EmpId='$empid'");
?>
            <div class="s-12 l-10">
               <h1>Leave Applications</h1><hr>
               <div class="clearfix"></div>
               
               	<div class="s-12 l-2">
               		<h4 style="background: #858282; color: white; text-align: center;">Leave Type</h4>
               	</div>
               	<div class="s-12 l-3">
               		<h4 style="background: #858282; color: white; text-align: center;">Commutation</h4>
               	</div>
               	<div class="s-12 l-2">
               		<h4 style="background: #858282; color: white; text-align: center;">Start Date</h4>
               	</div>
               	<div class="s-12 l-2">
               		<h4 style="background: #858282; color: white; text-align: center;">End Date</h4>
               	</div>
               	<div class="s-12 l-1">
               		<h4 style="background: #858282; color: white; text-align: center;">Status</h4>
               	</div>
               	<div class="s-12 l-2">
               		<h4 style="background: #858282; color: white; text-align: center; border-radius: 0px 4px 4px 0px;">Action</h4>
               	</div>
               
               <?php $i=1; while($rom = mysqli_fetch_assoc($leavedetails)) { //print_r($rom);exit;
			      $typeid = $rom['TypesLeaveId'];
			      $typename = mysqli_query($db,"select * from type_of_leave where LeaveId='$typeid' ");
			      $typen = mysqli_fetch_assoc($typename); ?>
        	
	               	<div class="s-12 l-2" style="text-align: center;"><?php echo ucfirst((isset($rom['TypesLeaveId']))?$rom['TypesLeaveId']:""); ?></div>
	               	<div class="s-12 l-3" style="text-align: center;"><?php echo(isset($rom['Commutation']))?$rom['Commutation']:""; ?></div>
	               	<div class="s-12 l-2" style="text-align: center;"><?php echo(isset($rom['StateDate']))?$rom['StateDate']:""; ?></div>
	               	<div class="s-12 l-2" style="text-align: center;"><?php echo(isset($rom['EndDate']))?$rom['EndDate']:""; ?></div>
	               	<div class="s-12 l-1" style="text-align: center;"><?php echo(isset($rom['LeaveStatus']))?$rom['LeaveStatus']:""; ?></div>

	               	<?php if($rom['LeaveStatus'] == "Pending") {?>
	               		<div class="s-12 l-1" style="text-align: center; padding-left: 50px;""><a onclick="history.go(0)" title="Refresh"><i class="la fa fa-refresh" style="color: #050100;" aria-hidden="true"></i></a></div>
						<div class="s-12 l-1" style="text-align: center; padding-right: 50px;">
							<a title="Print" onclick="printLeaveApplication('<?php echo $rom['EmpId']; ?>')">
								<i class="fa fa-print" style="color: #2ecc71;" aria-hidden="true"></i>
							</a>
						</div>
	               	<?php } else if($rom['LeaveStatus'] == "Accept"){ ?>
	               		<div class="s-12 l-1" style="text-align: center; padding-left: 50px;"><a title="Accept"><i class="fa fa-check" style="color: #008DE7;" aria-hidden="true"></i></a></div>
						<div class="s-12 l-1" style="text-align: center; padding-right: 50px;">
							<a title="Print" onclick="printLeaveApplication('<?php echo $rom['EmpId']; ?>')">
								<i class="fa fa-print" style="color: #2ecc71;" aria-hidden="true"></i>
							</a>
						</div>
	               	<?php } else {?>
	               		<div class="s-12 l-1" style="text-align: center;"><a title="Denied"><i class="fa fa-times" style="color: #E83114;" aria-hidden="true"></i></a></div>
	               	<?php } ?>
	            		<hr style="margin-bottom: 10px;">
     				<?php } ?>
               </div>

<script>
	$(".la").mouseover(function (e) 
    {
        $(this).removeClass('fa fa-refresh')
        $(this).addClass('fa fa-refresh fa-spin')
    }).mouseout(function (e)
    {
        $(this).removeClass('fa fa-refresh fa-spin')
        $(this).addClass('fa fa-refresh')
    })
</script>
<script>
    function printLeaveApplication(EmpId) {
        // You can customize this URL based on your actual file structure
        var printUrl = 'print_leave.php?EmpId=' + EmpId;
        window.open(printUrl, '_blank');
    }
</script>


<?php include('userfooter.php'); ?>