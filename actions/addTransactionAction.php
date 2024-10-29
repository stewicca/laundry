<?php
  // Initialization
  include "../config/connection.php";
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $services = $_POST['services'];
  $amounts = $_POST['amounts'];

  // Calculate total price
  $total = 0;
  $receipt_items = [];
  for ($i = 0; $i < count($services); $i++) {
    $serviceId = $services[$i];
    $amount = $amounts[$i];
    $result = mysqli_query($conn, "SELECT name, price FROM services WHERE id=$serviceId");
    $service = mysqli_fetch_assoc($result);
    $price = $service['price'];
    $subtotal = $price * $amount;
    $total += $subtotal;

    $receipt_items[] = [
      'name' => $service['name'],
      'amount' => $amount,
      'price' => $price,
      'subtotal' => $subtotal
    ];
  }

  // Insert into transactions table
  mysqli_query($conn, "INSERT INTO transactions (name, phone, total) VALUES ('$name', '$phone', $total)");
  $transactionId = mysqli_insert_id($conn);

  // Insert into transactionservices table
  for ($i = 0; $i < count($services); $i++) {
    $serviceId = $services[$i];
    $amount = $amounts[$i];
    $query = "INSERT INTO servicestransactions (serviceId, transactionId, amount) VALUES ($serviceId, $transactionId, $amount)";
    mysqli_query($conn, $query);
  }

  // Redirect to the receipt page
  header("Location:../receipt.php?id=$transactionId");
  exit();
?>