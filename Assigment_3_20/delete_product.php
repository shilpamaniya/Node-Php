<?php
  include "connection.php";
  $product_id = $_GET['product_id'];
  $query = "DELETE FROM `product` WHERE product_id='$product_id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('Product Is Remove Successfully..') </script>";
    echo "<script type='text/javascript'> document.location = 'view_product.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('Product Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'view_product.php'; </script>";
    exit;
  }
?>
