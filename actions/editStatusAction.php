<?php
  // Initialization
  include '../config/connection.php';
  $id = $_POST['id'];
  $status = $_POST['status'];

  // Insert transaction
  $transaction = mysqli_query($conn, "UPDATE transactions SET status='$status' WHERE id=$id");

  if ($transaction) {
    header("location:../index.php?alert=success");
  } else {
    header("location:../index.php?alert=failed");
  }
?>