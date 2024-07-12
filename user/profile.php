<?php include('userheader.php');?>
<?php //print_r($_SESSION);exit;
	include_once('../controller/connect.php');
	
	$dbs = new database();
	$db=$dbs->connection();

	$genderid = $_SESSION['User']['Gender'];
	$gid = mysqli_query($db,"select * from gender where GenderId='$genderid'");
	$gendern = mysqli_fetch_assoc($gid);

	$statusid = $_SESSION['User']['StatusId'];
	$sid = mysqli_query($db,"select * from status where StatusId='$statusid'");
	$status = mysqli_fetch_assoc($sid);

	$maritalid = $_SESSION['User']['MaritalStatus'];
	$mid = mysqli_query($db,"select * from maritalstatus where MaritalId='$maritalid'");
	$maritaln = mysqli_fetch_assoc($mid);

	$positionid = $_SESSION['User']['PositionId'];
	$pid = mysqli_query($db,"select * from position where PositionId='$positionid'");
	$positionn = mysqli_fetch_assoc($pid);
?>
               	<div class="s-12 l-10">
               	<h1>Profile</h1><hr>
               	<div class="clearfix"></div>
               	</div>
               	<form action="" method="post"  style="padding: 10px;">

               	<div class="s-12 l-2">
                 	<table>
                 		<tbody>
                 			<tr>
                 				<td align="center"><img src="../image/<?php echo (isset($_SESSION['User']['ImageName']))?$_SESSION['User']['ImageName']:""; ?>" id="myImg" style="height: 144px; border: 2px groove; border-radius:8px;"></td>
                 			</tr>
                 			<tr>
                 				<td align="center"><u style="margin-bottom: 5px;"><b><?php echo ucfirst($_SESSION['User']['FirstName'])."&nbsp;".ucfirst($_SESSION['User']['LastName']); ?></b></u></td>
                 			</tr>
                 			<tr>
                 				<td align="center"><b>Employee ID :</b> <?php echo(isset($_SESSION['User']['EmployeeId']))?$_SESSION['User']['EmployeeId']:"Null";?></td>
                 			</tr>
							<tr>
								<td align="center"><b>GSIS NO. :</b> <?php echo(isset($_SESSION['User']['GSISNO']))?$_SESSION['User']['GSISNO']:"Null";?></td>
							</tr>
                 		</tbody>
                 	</table>
               	</div>
               	<div class="s-12 l-5" >
                 	<table>
                 		<tbody>
                 			<tr>
                 				<td style="text-align: right;"><b>Gender :</b></td>
                 				<td ><?php echo(isset($gendern['Name']))?ucfirst($gendern['Name']):"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Birth Date&nbsp;:</b></td>
                 				<td ><?php echo(isset($_SESSION['User']['Birthdate']))?$_SESSION['User']['Birthdate']:"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Email :</b></td>
                 				<td ><?php echo(isset($_SESSION['User']['Email']))?$_SESSION['User']['Email']:"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Mobile&nbsp;No&nbsp;:</b></td>
                 				<td ><?php echo(isset($_SESSION['User']['Mobile']))?$_SESSION['User']['Mobile']:"Null";?></td>
                 			</tr>
                 			
                 			<tr>
                 				<td style="text-align: right;"><b>Permanent Address :</b></td>
                 				<td ><?php echo(isset($_SESSION['User']['Address1']))?$_SESSION['User']['Address1']:"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Present Address :</b></td>
                 				<td ><?php echo(isset($_SESSION['User']['Address2']))?$_SESSION['User']['Address2']:"Null";?></td>
                 			</tr>
                 		</tbody>
                 	</table>
               	</div>
               	<div class="s-12 l-3">
                 	<table>
                 		<tbody>
                 			<tr>
                 				<td style="text-align: right;"><b>Marital :</b></td>
                 				<td><?php echo(isset($maritaln['Name']))?ucfirst($maritaln['Name']):"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Date of Employment :</b></td>
                 				<td><?php echo(isset($_SESSION['User']['JoinDate']))?$_SESSION['User']['JoinDate']:"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Role :</b></td>
                 				<td><?php echo(isset($_SESSION['role']['Name']))?ucfirst($_SESSION['role']['Name']):"Null";?></td>
                 			</tr>
							<tr>
								<td style="text-align: right;"><b>Highest Attainment :</td>
								<td><?php echo(isset($_SESSION['User']['HighAttainment']))?$_SESSION['User']['HighAttainment']:"Null";?></td>
							</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Position :</b></td>
                 				<td><?php echo(isset($positionn['Name']))?ucfirst($positionn['Name']):"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Academic Rank :</b></td>
                 				<td><?php echo(isset($_SESSION['User']['AcademicRank']))?$_SESSION['User']['AcademicRank']:"Null";?></td>
                 			</tr>
                 			<tr>
                 				<td style="text-align: right;"><b>Status :</b></td>
                 				<td style="color: Red; font-weight: bold;"><?php echo(isset($status['Name']))?ucfirst($status['Name']):"Null";?></td>
                 			</tr>
                 		</tbody>
                 	</table>
               	</div>
               	</form>

<div id="myModal" class="modal">
<span class="close">&times;</span>
<img class="modal-content" id="img01">
<div id="caption"></div>
</div>



<?php include('userfooter.php');?>

<!-- The Modal -->


<!--image Popup-->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<!--End image Popup -->