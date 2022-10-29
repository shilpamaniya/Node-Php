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

$category_id = $_GET['category_id'];
$category_query = "SELECT * FROM category WHERE category_id='$category_id'";
$category_data = mysqli_query($conn,$category_query);
$category_result = mysqli_fetch_assoc($category_data);

if(isset($_POST['update_category']))
    {
        $category_name = $_POST["category_name"];
        $filename = $_FILES["category_image"]["name"];
        $tempname = $_FILES["category_image"]["tmp_name"];
        $folder = "Category_Image/".$filename;
        move_uploaded_file($tempname,$folder);

        if ($category_name != "" && $filename != "")
        {
            // $upload_category_query = "INSERT INTO category(category_name,category_image) VALUES ('$category_name','$folder')";
            $update_category_query = "UPDATE `category` SET `category_name`='$category_name',`category_image`='$folder' WHERE `category_id`='$category_id'";
            $upload_category_data = mysqli_query($conn,$update_category_query);

            if ($upload_category_data) {
                echo "<script type='text/javascript'> alert('Category Update Successfully')</script>";
                          echo "<script type='text/javascript'> document.location = 'view_category.php'; </script>";
                          exit();
              }
              else {
                echo "<script type='text/javascript'> alert('Failed to update Category')</script>";
                          echo "<script type='text/javascript'> document.location = 'view_category.php'; </script>";
                          exit();
              }
        }

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Category <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="view_category.php">View Category</a></li>
          <li><a href="add_category.php">Add Category</a></li>
          
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Product <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="view_product.php">View Product</a></li>
          <li><a href="add_product.php">Add Product</a></li>
          
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

        <form method="post" enctype="multipart/form-data">
            <label>Category Name</label>
            <input class="form-control" type="text" value="<?php echo $category_result['category_name'];?>" name="category_name"><br/>
            <label>Category Image</label>
            <input  class="form-control" type="file" name="category_image"><br/>
            <button type="submit" name="update_category">Update Category</button>
        </form>



</div>

</body>
</html>
