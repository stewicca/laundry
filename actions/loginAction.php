<?php
  // Initialization
  session_start();
  include '../config/connection.php';
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Get user
  $user = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

  if (mysqli_num_rows($user) > 0) {
    $data = mysqli_fetch_assoc($user);

    $_SESSION['id'] = $data['id'];
    $_SESSION['name'] = $data['name'];
    $_SESSION['role'] = $data['role'];

    header("location:../index.php?alert=success");
  } else {
    header("location:../login.php?alert=failed");
  }
?>
