<?php
  // Initialization
  session_start();
  include "config/connection.php";
  $transactionId = $_GET['id'];

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  if (!$transactionId) {
    header("location:index.php");
  }

  // Fetch transaction details
  $result = mysqli_query($conn, "SELECT * FROM transactions WHERE id = $transactionId");
  $transaction = mysqli_fetch_assoc($result);

  // Fetch services for this transaction
  $result = mysqli_query($conn, "
        SELECT s.name, s.price, st.amount 
        FROM servicestransactions st 
        JOIN services s ON st.serviceId = s.id 
        WHERE st.transactionId = $transactionId
    ");
  $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // Calculate total
  $total = 0;
  foreach ($services as $service) {
    $total += $service['price'] * $service['amount'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">
      <main class="flex flex-col items-center justify-start gap-8 max-w-[90%] min-h-screen mx-auto py-8">
        <h1 class="text-[#13975C] text-2xl text-center font-bold">Receipt</h1>

        <div class="w-full space-y-4">
          <p class="font-semibold">Transaction #<?php echo $transactionId; ?></p>
          <p><span class="font-semibold">Name:</span> <?php echo $transaction['name']; ?></p>
          <p><span class="font-semibold">Phone:</span> <?php echo $transaction['phone']; ?></p>
          <p><span class="font-semibold">Date:</span> <?php echo $transaction['created_at']; ?></p>
        </div>

        <div class="w-full overflow-x-auto">
          <table class="w-full mb-4">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-2 py-2 text-left text-sm">Service</th>
                <th class="px-2 py-2 text-left text-sm">Qty</th>
                <th class="px-2 py-2 text-left text-sm">Price</th>
                <th class="px-2 py-2 text-left text-sm">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($services as $service) : ?>
                <tr class="border-b">
                  <td class="px-2 py-2 text-sm"><?php echo $service['name']; ?></td>
                  <td class="px-2 py-2 text-sm"><?php echo $service['amount']; ?></td>
                  <td class="px-2 py-2 text-sm">Rp. <?php echo number_format($service['price'], 2); ?></td>
                  <td class="px-2 py-2 text-sm">Rp. <?php echo number_format($service['price'] * $service['amount'], 2); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr class="font-bold">
                <td class="px-2 py-2 text-sm" colspan="3">Total</td>
                <td class="px-2 py-2 text-sm">Rp. <?php echo number_format($total, 2); ?></td>
              </tr>
            </tfoot>
          </table>
        </div>

        <button onclick="window.print()" class="w-1/2 mt-6 py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">
          Print Receipt
        </button>
        <a href="index.php" class="w-1/2 py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">
          Back To Home
        </a>
      </main>
    </div>
  </body>
</html>