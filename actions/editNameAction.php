<?php
  // Initialization
  session_start();
  include '../config/connection.php';
  $id = $_POST['id'];
  $name = $_POST['name'];

  // Insert user
  $user = mysqli_query($conn, "UPDATE users SET name='$name' WHERE id=$id");

  if ($user) {
    $_SESSION['name'] = $name;
    header("location:../profile.php?alert=success");
  } else {
    header("location:../profile.php?alert=failed");
  }
?>