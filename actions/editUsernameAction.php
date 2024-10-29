<?php
  // Initialization
  include '../config/connection.php';
  $id = $_POST['id'];
  $oldUsername = str_replace(' ', '', strtolower($_POST['oldUsername']));
  $newUsername = str_replace(' ', '', strtolower($_POST['newUsername']));

  // Check username match
  $current = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
  $data = mysqli_fetch_assoc($current);

  if ($oldUsername !== $data['username']) {
    header("location:../editUsername.php?alert=failed");
    die();
  }

  // Check username
  $username_check = mysqli_query($conn, "SELECT * FROM users WHERE username='$newUsername'");

  if (mysqli_num_rows($username_check) > 0) {
    header("location:../editUser.php?alert=username&id=$id");
    die();
  }

  // Insert user
  $user = mysqli_query($conn, "UPDATE users SET username='$newUsername' WHERE id=$id");

  if ($user) {
    header("location:../profile.php?alert=success");
  } else {
    header("location:../profile.php?alert=failed");
  }
?>