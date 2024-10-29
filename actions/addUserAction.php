<?php
  // Initialization
  include '../config/connection.php';
  $name = $_POST['name'];
  $username = str_replace(' ', '', strtolower($_POST['username']));
  $password = md5($_POST['password']);
  $role = $_POST['role'];

  // Check username
  $username_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

  if (mysqli_num_rows($username_check) > 0) {
    header("location:../addUser.php?alert=username");
    die();
  }

  // Insert user
  $user = mysqli_query($conn, "INSERT INTO users (name, username, password, role) VALUES ('$name', '$username', '$password', '$role')") or die(mysqli_error($conn));

  if ($user) {
    header("location:../users.php?alert=success");
  } else {
    header("location:../users.php?alert=failed");
  }
?>