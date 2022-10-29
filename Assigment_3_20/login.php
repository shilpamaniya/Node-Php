<?php

// Start PHP session at the beginning
session_start();

// Create database connection using config file
include_once("connection.php");

// If form submitted, collect email and password from form
if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Check if a user exists with given username & password
    // $e_password = md5($password);
    $result = mysqli_query($conn, "select * from users
        where email='$email' and password='$password'");

    // Count the number of user/rows returned by query
    $user_total = mysqli_num_rows($result);

    // Check If user matched/exist, store user email in session and redirect to sample page-1
    if ($user_total==1) {

        $_SESSION["user_email"] = $email;
        header("location:home.php");
    } else {
        echo "<script type='text/javascript'> alert('User email or password is not matched ')</script>";
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
		exit();
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
							<img src="images/favicon.png"/> 
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
						Log in
					</span>
					
					<div class="wrap-input3 input3">
						<input class="input3" type="email" name="email" placeholder="Email" style="color: #003d4e;">
						<span class="focus-input3"></span>
					</div>	

					<div class="wrap-input3 input3">
						<input class="input3" type="password" name="password" placeholder="Password" style="color: #003d4e;">
						<span class="focus-input3"></span>
					</div>	

					<div class="validate-input" data-validate="">
						<div class="input3" name="forget_password">
						    <span class="t3"><a class="text-blue" href="signup.php">Create New Account ?</a></span>
						</div>
					</div>
					
					<div class="container-contact3-form-btn">
						<button class="contact3-form-btn" name="login">
							Log In
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
