<?php

session_start();
//including the database connection file
include_once("connection.php");

// Check If form submitted, insert user data into database.

if(isset($_POST['register']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql=mysqli_query($conn,"SELECT * FROM users where email='$email'");
		if(mysqli_num_rows($sql)>0)
		{
		  echo "<script> alert('Email Id Already Exists') </script>";
		  echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
		  exit;
		}
		else
		{
			$result   = mysqli_query($conn, "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");

			// check if user data inserted successfully.
			if ($result) {

				echo "<script type='text/javascript'> alert('Successfully Registered ')</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
				exit();
			}
			else {
				echo "<script type='text/javascript'> alert('Registeration Failed')</script>";
				echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
				exit();
			}
		}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Get In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" href="images/favicon1.png" type="image/x-icon"/>
<!--===============================================================================================-->
    <link rel="shortcut icon" href="images/favicon1.png" type="image/x-icon"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@500&display=swap" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/signup.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="bg-contact3" style="background-image: url('images/');">
		<header id="header" class="fixed-top ">
	    	<div class="container-fluid d-flex align-items-center d-flex justify-content-between">
				<div class="logoset">
					<div class="logo"> 
						<a href="index.php"> 
							
						</a>
					</div>
				</div>

                <nav class="navbar navbar-expand-md">
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			             <span class="navbar-toggler-icon"></span>
			        </button>

			        <div class="collapse navbar-collapse" id="collapsibleNavbar">
			            <ul class="navbar-nav">
				            <li class="nav-item">
				          	    <a href="index.php" class="get-started-btn scrollto ">Home</a>
				            </li>
							
			            </ul>
			        </div>
		        </nav>
		    </div> 
	    </header>
		<div class="container-contact3 col-md-12">
			<div class="wrap-contact3">
				<form class="contact3-form validate-form" method="post">
					<span class="contact3-form-title">
						Registration
					</span>

					<div class="wrap-input3 input3">
						<input class="input3" type="text" name="name" placeholder="Name" style="color: #003d4e;">
						<span class="focus-input3"></span>
					</div>	

					<div class="wrap-input3 input3">
						<input class="input3" type="email" name="email" placeholder="Email" style="color: #003d4e;">
						<span class="focus-input3"></span>
					</div>	

					<div class="wrap-input3 input3">
						<input class="input3" type="password" name="password" placeholder="Password" style="color: #003d4e;">
						<span class="focus-input3"></span>
					</div>	
					<div class="form-group">
                        <input type="text" name="captcha" class="form-control" placeholder="Enter captcha" >
                        <img src="captcha.php" alt="captcha">
                    </div>

					<div class="validate-input" data-validate="">
						<div class="input3" name="forget_password">
						    <span class="t3"><a class="text-blue" href="login.php">Already Have A Account ?</a></span>
						</div>
					</div>
					
					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" name="register">
							Register
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
