<?php
session_start();
include("connect.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])) {

	$fName =  $_POST['fName'];

	if (empty($fName)) {
		$first_name_error = "PLEASE ENTER YOUR FIRST NAME";
	} else if (!preg_match("/^[a-zA-Z]*$/", $fName)) {
		$first_name_error =  "FIRST NAME IS ONLY CHARACTER IN A-Z AND a-z:";
	}

	$lName = $_POST['lName'];
	if (empty($lName)) {
		$last_name_error = "PLEASE ENTER YOUR LAST NAME";
	} else if (!preg_match("/^[a-zA-Z]*$/", $lName)) {
		$last_name_error = "LAST NAME IS ONLY CARACTER PLEASE CHECK AGAIN:";
	}

	$gender =  $_POST['gender'];
	if (empty($gender)) {
		$Gender_error = "PLEASE ENTER YOUR FIRST NAME";
	}

	$DOB =  $_POST['DOB'];
	if (empty($DOB)) {
		$DOB_error = "PLEASE ENTER YOUR DATE OG BIRTH:";
	}

	$email = $_POST['email'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$Email_id_error = "Invalid email format";
	}
	if (empty($email)) {
		$Email_id_error =  "PLEASE ENTER YOUR PASSWORD";
	}

	$password =   md5($_POST['password']);
	if (empty($password)) {
		$password_error =  "PLEASE ENTER YOUR PASSWORD";
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
		$password_error = "PLEASE ENTER VALID PASSWORD";
	}

	$mobile_no = $_POST['mobile_no'];
	if (empty($mobile_no)) {
		$Mobile_no_error = "PLEASE ENTER YOUR MOBILE NO.";
	} else if (!preg_match('/^[0-9]*$/', $mobile_no)) {
		$Mobile_no_error = "PLEASE ENTER VALID MOBILE NO";
	} else if (strlen($mobile_no) < 10) {
		$Mobile_no_error = "YOUR MOBILE NO. IS TOO SHORT PLEASE CHECK AGAIN:";
	} else if (strlen($mobile_no) > 10) {
		$Mobile_no_error = "YOUR MOBILE NO. IS TOO LARGE PLEASE CHECK AGAIN:";
	}

	

	$address = $_POST['address'];
	if (strlen($mobile_no) < 5) {
		$address_error = "YOUR ADDRESS  IS TOO SHORT PLEASE CHECK AGAIN:";
	} else if (strlen($mobile_no) > 50) {
		$address_error = "YOUR ADDRESS IS TOO LARGE PLEASE CHECK AGAIN:";
	}

    $file=$_FILES["file"]["name"];
	$tmp_name=$_FILES["file"]["tmp_name"];
	$path="pdf/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	// $allowed=array("jpg","png","gif","pdf","wmv","pdf","zip");
    $allowed=array("pdf","jpg");

    $resume=$_FILES["resume"]["name"];
	$tmp_name=$_FILES["resume"]["tmp_name"];
	$path="pdf/".$file;
	$file1=explode(".",$file);
	$ext=$file1[1];
	// $allowed=array("jpg","png","gif","pdf","wmv","pdf","zip");
    $allowed=array("pdf","jpg");

	$insertquery = "INSERT INTO `user`(`fName`, `lName`, `DOB`, `gender`, `email`, `password`, `mobile_no`,`address`,`file`,`resume`) values('$fName','$lName','$DOB','$gender','$email','$password','$mobile_no', '$address','$file','$resume')";
	$query = mysqli_query($conn, $insertquery);

    // $query_run=mysqli_query($conn,$query);
    // if($query_run)
    // {
    //     move_uploaded_file($_FILES["files"]["tmp_name"],"upload/".$_FILES["files"]["files"]);
    //     $_SESSION['status']="image stored sucessfully";
    //     header('Location:create.php');
    // }
    // else{
    //     $_SESSION['status']="image not inserted...";
    //     header('Location:create.php');
    // }


   
} ?>

<!DOCTYPE html>
<html lang="en">

<body>


	<section >

		<div class="container">
			<h3>Registration...</h3>
			

			<form class="woocommerce-form woocommerce-form-login login comment-one__form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

				<div class="comment-one__form">
					<div class="row">
						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="Fname">First Name<span class="required">*</span></label>
								<input type="text" placeholder="First Name" class="woocommerce-Input woocommerce-Input--text input-text" name="fName" id="First Name" require>
								<?php if (isset($first_name_error)) { ?>
									<div style="color:red"><?php echo  $first_name_error; ?></div>
								<?php } ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="lname">Last Name<span class="required">*</span></label>
								<input type="text" placeholder="Last Name" class="woocommerce-Input woocommerce-Input--text input-text" name="lName" id="lname" require>
								<?php if (isset($last_name_error)) { ?>
									<div style="color:red"><?php echo  $last_name_error; ?></div>
								<?php } ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="DOB">Date Of Birth<span class="required">*</span></label>
								<input type="text" placeholder="0000-00-00 (year-month-date)" class="woocommerce-Input woocommerce-Input--text input-text" name="DOB" id="DOB" require>
								<?php if (isset($DOB_error)) { ?>
									<div style="color:red"><?php echo  $DOB_error; ?></div>
								<?php } ?>
							</div>
						</div>

						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="lname">Gender<span class="required">*</span></label>
								<div class="comment-form__input-box">
									<?php if (isset($Gender_error)) { ?>
										<div style="color:red"><?php echo  $Gender_error; ?></div>
									<?php } ?>
									<select name="gender" class="custom-select-box">
										<option value="FEMALE">Female</option>
										<option value="MALE">Male</option>
									</select>
								</div>
							</div>
						</div>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="Email_id">Email Id<span class="required">*</span></label>
							<span class="comment-form__input-box">
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Email Id" name="email" id="Email_id" autocomplete="off" require>
								<?php if (isset($Email_id_error)) { ?>
									<div style="color:red"><?php echo  $Email_id_error; ?></div>
								<?php } ?>
							</span>
						</p>

						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="Password">Password<span class="required">*</span></label>
								<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Password" type="password" name="password" id="password" autocomplete="off" require>
								<?php if (isset($password_error)) { ?>
									<div style="color:red"><?php echo  $password_error; ?></div>
								<?php } ?>
								<span class="show-password-input" id="message" style="color:red;"></span></span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="comment-form__input-box">
								<label for="Mobile_no">Mobile No<span class="required">*</span></label>
								<input type="text" placeholder="Mobile No" class="woocommerce-Input woocommerce-Input--text input-text" name="mobile_no" id="Mobile_no" require>
								<?php if (isset($Mobile_no_error)) { ?>
									<div style="color:red"><?php echo  $Mobile_no_error; ?></div>
								<?php } ?>
							</div>
						</div>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<label for="Email_id">Address <span class="required">*</span></label>
							<span class="comment-form__input-box">
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="Address" name="address" id="address" autocomplete="off" require>
								<?php if (isset($address_error)) { ?>
									<div style="color:red"><?php echo  $address_error; ?></div>
								<?php } ?>
							</span>
						</p>
                        image Upload:<input type="file" name="file">
                        <br>
                        <br>
                        File Upload:<input type="file" name="resume">
                        <br>
                        <br>
						<button type="submit" class="woocommerce-button button woocommerce-form-login__submit thm-btn" name="submit" value="submit"><span>REGISTATION</span>
						</button>

					</div>

				</div>
		</div>
		</form>
		</div>
	</section>

	

</html>