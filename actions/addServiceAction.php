<?php
  // Initialization
  include '../config/connection.php';
  $name = $_POST['name'];
  $price = $_POST['price'];
  $unit = strtolower($_POST['unit']);

  // Insert service
  $service = mysqli_query($conn, "INSERT INTO services (name, price, unit) VALUES ('$name', '$price', '$unit')") or die(mysqli_error($conn));

  if ($service) {
    header("location:../services.php?alert=success");
  } else {
    header("location:../services.php?alert=failed");
  }
?>
