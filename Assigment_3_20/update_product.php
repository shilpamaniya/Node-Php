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

$select_category_name_query = "SELECT * FROM category";
$select_category_name_result = mysqli_query($conn,$select_category_name_query);

$product_id = $_GET['product_id'];
$product_query = "SELECT * FROM `product` WHERE product_id='$product_id'";
$product_data = mysqli_query($conn,$product_query);
$product_result = mysqli_fetch_assoc($product_data);

    if(isset($_POST['update_product']))
    {
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $category_name = $_POST["category_name"];
        $filename = $_FILES["product_image"]["name"];
        $tempname = $_FILES["product_image"]["tmp_name"];
        $folder = "Product_Image/".$filename;
        move_uploaded_file($tempname,$folder);

        if ($product_name != "" && $product_price != "" && $category_name != "" && $filename != "")
        {
            // $upload_product_query = "INSERT INTO product(product_name,product_price,category_name,product_image) VALUES ('$product_name','$product_price','$category_name','$folder')";
            $update_product_query = "UPDATE `product` SET `product_name`='$product_name',`product_price`='$product_price',`category_name`='$category_name',`product_image`='$folder' WHERE `product_id`='$product_id'";
            $update_product_data = mysqli_query($conn,$update_product_query);

            if ($update_product_data) {
                echo "<script type='text/javascript'> alert('Product Uploaded Successfully')</script>";
                          echo "<script type='text/javascript'> document.location = 'view_product.php'; </script>";
                          exit();
              }
              else {
                echo "<script type='text/javascript'> alert('Failed to upload Product')</script>";
                          echo "<script type='text/javascript'> document.location = 'add_product.php'; </script>";
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
<!-- <h1> User Name : - <?php echo $user_result['name']; ?></h3> -->
<form method="post" enctype="multipart/form-data">
            <label>Product Name</label>
            <input class="form-control" type="text" value="<?php echo $product_result['product_name'];?>" name="product_name"><br/>
            <label>Product Price</label>
            <input class="form-control" type="text" value="<?php echo $product_result['product_price'];?>" name="product_price"><br/>
            <label>Category Name</label>
            <select class="form-control" name="category_name">
                                             <option><?php echo $product_result['category_name'];?></option>
                                             <?php
                                              while($select_category_name_total = mysqli_fetch_assoc($select_category_name_result))
                                              {                                              
                                                ?>

                                                    <option><?php echo $select_category_name_total['category_name']; ?></option>
                                                  <?php } ?>
                                            </select><br/>
            <label>Product Image</label>
            <input class="form-control" type="file" name="product_image"><br/>
            <button  type="submit" name="update_product">Add Product</button>
        </form>



</div>

</body>
</html>
