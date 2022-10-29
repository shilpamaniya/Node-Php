<?php
session_start();
error_reporting(0);
include "connection.php";
$user_profile = $_SESSION['user_email'];
if($user_profile==true)
{

}
else
{
  header('location:index.php');
}

$user_query = "SELECT * FROM users WHERE email='$user_profile'";
$user_data = mysqli_query($conn,$user_query);
$user_result = mysqli_fetch_assoc($user_data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shopping Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shopping cart </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="view_category_user.php">View Category</a></li>
          <!-- <li><a href="add_category.php">Add Category</a></li> -->
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="view_product_user.php">View Product</a></li>
         </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">


  <h3>Hellow , <?php echo $user_result['name']; ?></h3>
  <h3>Your Email Is :- <?php echo $user_result['email']; ?></h3>
</div>

</body>
</html>
