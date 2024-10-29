<?php
  // Initialization
  include '../config/connection.php';
  $id = $_POST['id'];
  $oldPassword = md5($_POST['oldPassword']);
  $newPassword = md5($_POST['newPassword']);

  // Check username match
  $current = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
  $data = mysqli_fetch_assoc($current);

  if ($oldPassword !== $data['password']) {
    header("location:../editPassword.php?alert=failed");
    die();
  }

  // Insert user
  $user = mysqli_query($conn, "UPDATE users SET password='$newPassword' WHERE id=$id");

  if ($user) {
    header("location:../profile.php?alert=success");
  } else {
    header("location:../profile.php?alert=failed");
  }
?>