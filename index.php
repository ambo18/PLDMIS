<?php
	$result ="";
	if(isset($_GET['msg']))
	{
		$result=$_GET['msg'];
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Login Page - PLDMIS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<style>
	html {
		min-height: calc(100%);
		width: calc(100%);
	}

	body,
	.main-wthree {
		width: calc(100%);
		min-height: 100vh;
		margin: 0; /* Remove default margin */
		background: url('image/bg1.jpg') center center;
		background-size: 100% 100%; /* Cover the entire element without gaps */
		background-attachment: fixed; /* Prevent background from scrolling with content */
	}

	.main-wthree {
		padding-bottom: 2em;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		background-color: rgba(0, 0, 0, 0.8); /* Darker background color with more transparency */
	}
	.footer{
		width:100%;
		position:fixed;
		bottom:0;
		left:0
	}
	.sin-w3-agile{
		padding:0;
	}
	.login {
		background-color: #010101;
		background-image: linear-gradient(160deg, #010101 0%, #4e6865 100%);
	}

	.login-w3 {
		width: 100%;
		float: unset;
		text-align: center;
	}

	.main-wthree input[type="submit"]:hover {
		background: #3e5250;
	}
</style>
</head> 
<body>
	<div class="main-wthree">
		<div class="container">
			<h1 class="text-center text-white"><b>Development of a Personnel Learning And Development Management Information System</b></h1>
		<div class="sin-w3-agile">
			<h2></h2>
			<form action="controller/login.php" method="post">
				<div class="email">
					<span class="email">Username:</span>
					<input type="text" name="name" class="name"  placeholder="Enter Username">
					<div class="clearfix"></div>
				</div>
				<div class="password-agileits">
					<span class="username">Password: <i class="fa fa-eye-slash" aria-hidden="false" style="padding-left: 20px;" onclick="passwordeyes(this);"></i></span>
					<input type="password" name="password" id="Psw" class="password"  placeholder="Enter Password">
					<div class="clearfix"></div>
				</div>
				<h4 style="color: #F1C40F;"><?php echo $result; ?></h4>
				
				<div class="login-w3">
					<input type="submit" name="submit" class="login" value="Log In">
				</div>
				<div class="clearfix"></div>
				<h5 class="text-center"><a href="./user" class="text-white" >Login as an Admin</a></h5>
				<div class="clearfix"></div>
			</form>
					<!-- <div class="back">
						<a href="index.php">Back to home</a>
					</div> -->
					<div class="footer">
						<p>Development of a Personnel Learning And Development Management Information System &copy; <?= date("Y") ?> </p>
					</div>
		</div>
		</div>
	</div>
	<script>
function passwordeyes(_this) {
    var x = document.getElementById("Psw").type;
    if(x=="password"){
      document.getElementById("Psw").type="text";
	  _this.setAttribute('class', "fa fa-eye")
    }else{
      document.getElementById("Psw").type="password";
	  _this.setAttribute('class', "fa fa-eye-slash")
	}
}
</script>
</body>
</html>
