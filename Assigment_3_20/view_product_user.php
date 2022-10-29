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

$select_product_name_query = "SELECT * FROM product";
$select_product_name_result = mysqli_query($conn,$select_product_name_query);
$cnt=1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>shopping card</title>
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
      <a class="navbar-brand" href="#">Shopping Card User</a>
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
          <li><a href="view_product.php">View Product</a></li>
          <!-- <li><a href="add_product.php">Add Product</a></li> -->
          
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
<center>
<table border="2" class="table">>
  <!-- <tr>
      <th>#</th>
      <th>product Name</th>
      <th>product Image</th>
      <th>product price</th>
      <th colspan="2">Action</th>
  </tr> -->
<?php
   while($select_product_name_total = mysqli_fetch_assoc($select_product_name_result))
    {
?>
  <div class='col-md-4'>
            <div class='card'>
            <img src=<?php echo $select_product_name_total['product_image'];?> class='card-img-top' width="200px" alt='product image' style='height: 225px;'>
            <div class='card-body'>
            <h5 class='card-title'><?php echo $select_product_name_total['product_name'];?></h5>
            <p class='card-text'><?php echo $select_product_name_total['product_price'];?></p>
            <a href='add_to_cart.php?id=".$row['product_id']."'><button type='button' class='btn btn-sm btn-outline-secondary'>Add to cart</button></a>
            </div>
            </div>
            </div>
  <!-- <tr>
      <td><?php echo $cnt;?></td>
      <td><?php echo $select_product_name_total['product_name'];?></td>
     
      <td><img  width="100px"  src="<?php echo $select_product_name_total['product_image'];?>" alt=""></td>
      <td><?php echo $select_product_name_total['product_price'];?></td>
       <td><a href="delete_product.php?product_id=<?php echo $select_product_name_total['product_id'];?>">Delete</a></td>
      <td><a href="update_product.php?product_id=<?php echo $select_product_name_total['product_id'];?>">Edit</a></td> 
  </tr> -->
<?php
    $cnt=$cnt+1;
    }
?>
  
</table>
  </center>



</div>

</body>
</html>
