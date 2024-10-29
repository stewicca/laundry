<?php
  // Initialization
  include '../config/connection.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $unit = strtolower($_POST['unit']);

  // Insert service
  $service = mysqli_query($conn, "UPDATE services SET name='$name', price='$price', unit='$unit' WHERE id=$id");

  if ($service) {
    header("location:../services.php?alert=success");
  } else {
    header("location:../services.php?alert=failed");
  }
?>
