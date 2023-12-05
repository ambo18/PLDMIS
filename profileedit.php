<?php include('header.php'); ?>
<?php
include_once('controller/connect.php');
$dbs = new database();
$db = $dbs->connection();

$ProfileEmpId = $_SESSION['User']['EmployeeId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data when the form is submitted
    if (isset($_POST['update'])) {
        // Retrieve and sanitize form data
        // You should add additional validation and sanitization as needed
        $newPfimg = mysqli_real_escape_string($db, $_POST['new_pfimg']);
        $newEmpid = mysqli_real_escape_string($db, $_POST['new_empid']);
        $newFname = mysqli_real_escape_string($db, $_POST['new_fname']);
        $newMname = mysqli_real_escape_string($db, $_POST['new_mname']);
        $newLname = mysqli_real_escape_string($db, $_POST['new_lname']);
        $newCountry = mysqli_real_escape_string($db, $_POST['new_country']);
        $newState = mysqli_real_escape_string($db, $_POST['new_state']);
        $newStatus = mysqli_real_escape_string($db, $_POST['new_status']);

        $newAddress1 = mysqli_real_escape_string($db, $_POST['new_address1']);
        $newAddress2 = mysqli_real_escape_string($db, $_POST['new_address2']);
        $newAddress3 = mysqli_real_escape_string($db, $_POST['new_address3']);
        $newCityId = mysqli_real_escape_string($db, $_POST['new_city']);
        $newGenderId = mysqli_real_escape_string($db, $_POST['new_gender']);
        $newMaritalId = mysqli_real_escape_string($db, $_POST['new_marital']);
        $newBirthdate = mysqli_real_escape_string($db, $_POST['new_bdate']);
        $newEmail = mysqli_real_escape_string($db, $_POST['new_email']);
        $newPassword = mysqli_real_escape_string($db, $_POST['new_password']);
        $newMobile = mysqli_real_escape_string($db, $_POST['new_mnumber']);
        $newRoleId = mysqli_real_escape_string($db, $_POST['new_role']);
        $newPositionId = mysqli_real_escape_string($db, $_POST['new_position']);
        $newJoinDate = mysqli_real_escape_string($db, $_POST['new_joindate']);
        $newLeaveDate = mysqli_real_escape_string($db, $_POST['new_leavedate']);

        // Update user data in the database
        $updateQuery = "UPDATE employee SET EmployeeId='$newEmpid', FirstName='$newFname', 
        MiddleName='$newMname', LastName='$newLname', Address1='$newAddress1', Address2='$newAddress2', 
        Address3='$newAddress3', CityId='$newCityId', Country='$newCountry', Gender='$newGenderId', MaritalStatus='$newMaritalId', 
        Birthdate='$newBirthdate', Email='$newEmail', Password='$newPassword', Mobile='$newMobile', RoleId='$newRoleId', 
        PositionId='$newPositionId', JoinDate='$newJoinDate', LeaveDate='$newLeaveDate' WHERE EmployeeId='$ProfileEmpId'";
        mysqli_query($db, $updateQuery);

        echo "<script>alert('Profile updated successfully!');</script>";
        echo "<script>window.location='profile.php';</script>";
    } elseif (isset($_POST['cancel'])) {
        echo "<script>window.location='profile.php';</script>";
    }
}

// Retrieve user data for display
$view = mysqli_query($db, "SELECT * FROM employee WHERE EmployeeId='$ProfileEmpId'");
$row = mysqli_fetch_assoc($view);
// ... (rest of the existing code remains unchanged)

?>
<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Profile<i class="fa fa-angle-right"></i> Employee Add</li>
</ol>
<!--grid-->
 	<div class="validation-system" style="margin-top: 0;">
 		
 		<div class="validation-form">

     <form method="POST">
 	<!---->
        <div class="vali-form-group">
          <div class="col-md-4 control-label">
              <label class="control-label">Employee ID*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="new_empid" title="Employee ID" value="<?php echo $row['EmployeeId']; ?>" class="form-control" placeholder="Employee ID" required="">
              </div>
            </div>
            

            <div class="col-md-4 control-label">
              <label class="control-label">Profile Image*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
              </span>
              <input type="file" name="new_pfimg" title="Profile Image" class="form-control" name="fileupload"  >
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Gender*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-male" aria-hidden="true"></i>
              </span>
              <select name="new_gender" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM gender");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['GenderId'] . "'";
                      if ($genderRow['GenderId'] == $row['Gender']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>
            </div>
            <div class="clearfix"> </div>

         	<div class="vali-form-group">
            <div class="col-md-4 control-label">
              <label class="control-label">First Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="new_fname" title="First Name" value="<?php echo $row['FirstName']; ?>" class="form-control" placeholder="First Name" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Middel Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="new_mname" title="Middel Name" value="<?php echo $row['MiddleName']; ?>" class="form-control" placeholder="Middel Name" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Last Name*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <input type="text" name="new_lname" title="Last Name" value="<?php echo $row['LastName']; ?>" class="form-control" placeholder="Last Name" required="">
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-4 control-label">
              <label class="control-label">Birth Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="Birthdate" title="Birth Date" name="new_bdate" placeholder="Birth Date" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo $row['Birthdate']; ?>"  class="form-control" required="">
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Marital*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="new_marital" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM maritalstatus");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['MaritalId'] . "'";
                      if ($genderRow['MaritalId'] == $row['MaritalStatus']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>

            <div class="col-md-4 control-label">
              <label class="control-label">Mobile Number*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-mobile" aria-hidden="true"></i>
              </span>
              <input type="text" name="new_mnumber" title="Mobile Number" value="<?php echo $row['Mobile']; ?>" class="form-control" placeholder="Mobile Number" min="10" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
              </div>
            </div>

            
            </div>
            <div class="clearfix"> </div>

            <div class="col-md-12 control-label">
              <label class="control-label">Address 1*</label>
              <div class="input-group">   
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>          
              <input type="text" name="new_address1" title="Address 1" value="<?php echo $row['Address1']; ?>" class="form-control" placeholder="Address Line 1" required="">
              </div>
            </div>
            <div class="clearfix"> </div>

            <div class="col-md-12 control-label">
              <label class="control-label">Address 2*</label>
              <div class="input-group">
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>
                          
              <input type="text" name="new_address2" title="Address 2" value="<?php echo $row['Address2']; ?>" class="form-control" placeholder="Address Line 2" required>
              </div>
            </div>
            <div class="clearfix"> </div>
            <div class="col-md-12 control-label">
              <label class="control-label">Address 3</label>
              <div class="input-group"> 
              <span class="input-group-addon">
              <i class="fa fa-pencil " aria-hidden="true"></i>
              </span>            
              <input type="text" name="new_address3" title="Address 3" value="<?php echo $row['Address3']; ?>" class="form-control" placeholder="Address Line 3">
              </div>
            </div>
            <div class="clearfix"> </div>



            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Country*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-globe" aria-hidden="true"></i>
              </span>
              <select name="new_country" required>
                  <option value="">Select Country</option>
                  <?php
                  $countryQuery = mysqli_query($db, "SELECT * FROM country");
                  while ($countryRow = mysqli_fetch_assoc($countryQuery)) {
                      echo "<option value='" . $countryRow['CountryId'] . "'";
                      if (isset($row['CountryId']) && $countryRow['CountryId'] == $row['CountryId']) {
                          echo " selected";
                      }
                      echo ">" . $countryRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">State*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="new_state" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM state");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['StateId'] . "'";
                      if ($genderRow['StateId'] == $row['Gender']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">City*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="new_city" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM city");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['CityId'] . "'";
                      if ($genderRow['CityId'] == $row['CityId']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
              <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Join Date*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="JoinDate" title="Join Date" name="new_joindate" placeholder="Join Date" value="<?php echo(isset($editemp["JoinDate"]))?$editemp["JoinDate"]:""; ?>" class="form-control" required="" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Leave Date</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-calendar" aria-hidden="true"></i>
              </span>
              <input type="text" id="LeaveDate" title="Leave Date" name="new_leavedate" placeholder="Leave Date" value="<?php echo(isset($editemp["LeaveDate"]))?$editemp["LeaveDate"]:""; ?>" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Status</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              </span>
              <select name="new_status" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM status");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['StatusId'] . "'";
                      if ($genderRow['StatusId'] == $row['StatusId']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Role*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-user" aria-hidden="true"></i>
              </span>
              <select name="new_role" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM role");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['RoleId'] . "'";
                      if ($genderRow['RoleId'] == $row['RoleId']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form-group">
            <div class="col-md-3 control-label">
              <label class="control-label">Position*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-language" aria-hidden="true"></i>
              </span>
              <select name="new_position" required>
                  <option value="" disabled>--</option>
                  <!-- Assume you have a table 'gender' with columns 'GenderId' and 'Name' -->
                  <?php
                  $genderQuery = mysqli_query($db, "SELECT * FROM position");
                  while ($genderRow = mysqli_fetch_assoc($genderQuery)) {
                      echo "<option value='" . $genderRow['PositionId'] . "'";
                      if ($genderRow['PositionId'] == $row['PositionId']) {
                          echo " selected";
                      }
                      echo ">" . $genderRow['Name'] . "</option>";
                  }
                  ?>
              </select>
              </div>
            </div>

            <div class="col-md-3 control-label">
              <label class="control-label">Email*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <input type="email" name="new_email" title="Email" value="<?php echo $row['Email']; ?>" class="form-control" placeholder="Email Address" required="">
              </div>
            </div>
            
            <div class="col-md-3 control-label">
              <label class="control-label">Password*</label>
              <div class="input-group">             
                  <span class="input-group-addon">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              </span>
              <input type="password" id="Psw" title="Password" value="<?php echo $row['Password']; ?>" name="new_password" placeholder="Password " class="form-control" required="">
              <span class="input-group-addon">
              <a><i class='fa fa-eye' aria-hidden='false' onclick="passwordeyes()"></i></a>
              </span>
              </div>              
            </div>
          
              <div class="clearfix"> </div>
          </div>
            <div class="col-md-12 form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <input type="text" name="imagefilename" hidden="" value="<?php echo $row['ImageName']; ?>">
            </div>
          <div class="clearfix"> </div>
        </form>
 	<!---->
 </div>
</div>
<script>
function passwordeyes() {
    var x = document.getElementById("Psw").type;
    if(x=="password")
      document.getElementById("Psw").type="text";
    else
      document.getElementById("Psw").type="password";
}

</script>
<script>
var OneStepBack;
function nmac(val,e){
  if(e.keyCode!=8)
  {
    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14)
      {
        document.getElementById("mac").value = val+"-";   
      }
  }
}

function nmac1(val,e){
if(e.keyCode==32){
return false;
}

  if(e.keyCode!=8){

    if(val.length==2)
      document.getElementById("mac").value = val+"-";
    if(val.length==5)
      document.getElementById("mac").value = val+"-";
    if(val.length==8)
      document.getElementById("mac").value = val+"-";
      if(val.length==11)
      document.getElementById("mac").value = val+"-";
      if(val.length==14){
      document.getElementById("mac").value = val+"-";   
    }

    if(val.length==17){
        return false;
    }
  } 
}
</script>
<script>
  contrychange();
  function contrychange()
  {
    var selectedstateid = "<?php echo $StateId; ?>";
    var selectedstateid = parseInt(selectedstateid);

    var selectedcountry = $('#contryid').val();
    $.get("controller/getstatecity.php?Type=s&ci="+selectedcountry+"&ss="+selectedstateid,function(data,status){
        $("#stateid").html(data);
    });
    statechange(selectedstateid);
  }
  function statechange(si)
  {

    var selectedstate = $('#stateid').val();
    if(si!=undefined)
      selectedstate=si;

    var selectedcityid = "<?php echo $CityId; ?>";
    selectedcityid = parseInt(selectedcityid);
    
    $.get("controller/getstatecity.php?Type=c&si="+selectedstate+"&sc="+selectedcityid,function(data,status){
      $("#cityid").html(data);
    });
  }
</script>

<script>
  
  var birthdate = $('#Birthdate').val();
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yy = today.getFullYear();
    var tdate = yy+"/"+mm+"/"+dd;

$('#Birthdate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  maxDate: tdate // and tommorow is maximum date calendar
});

$('#JoinDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

$('#LeaveDate').datetimepicker({
  yearOffset:0,
  lang:'ch',
  timepicker:false,
  format:'Y/m/d',
  formatDate:'Y/m/d',
  //minDate:'-1980/01/01', // yesterday is minimum date
  //maxDate: tdate // and tommorow is maximum date calendar
});

</script>
<?php include('footer.php'); ?>

