<?php
  // Initialization
  include '../config/connection.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $username = str_replace(' ', '', strtolower($_POST['username']));
  $role = $_POST['role'];

  // Check username
  $username_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

  if (mysqli_num_rows($username_check) > 0) {
    header("location:../editUser.php?alert=username&id=$id");
    die();
  }

  // Insert user
  $user = mysqli_query($conn, "UPDATE users SET name='$name', username='$username', role='$role' WHERE id=$id");

  if ($user) {
    header("location:../users.php?alert=success");
  } else {
    header("location:../users.php?alert=failed");
  }
?>