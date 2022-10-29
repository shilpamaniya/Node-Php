<?php
  include "connection.php";
  $category_id = $_GET['category_id'];
  $query = "DELETE FROM `category` WHERE category_id='$category_id'";
  $data = mysqli_query($conn,$query);
  if ($data) {
    echo "<script> alert('Category Is Remove Successfully..') </script>";
    echo "<script type='text/javascript'> document.location = 'view_category.php'; </script>";
    exit;
  }
  else {
    echo "<script> alert('Category Can't Deleted') </script>";
    echo "<script type='text/javascript'> document.location = 'view_category.php'; </script>";
    exit;
  }
?>
