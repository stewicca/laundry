<?php
  // Initialization
  session_start();
  include "../config/connection.php";

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:../login.php");
  }

  // Check user role
  if ($_SESSION['role'] != "superadmin") {
    header("location:../index.php");
  }

  $id = $_GET['id'];

  if ($id) {
    $delete = mysqli_query($conn, "DELETE FROM services WHERE id=$id");

    if ($delete) {
      header("location:../services.php?alert=success");
    } else {
      header("location:../services.php?alert=failed");
    }
  } else {
    header("location:../services.php");
  }
?>