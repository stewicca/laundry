<?php
  // Initialization
  session_start();

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Header -->
      <header class="flex items-center justify-center h-20 bg-[#D7F7E8]">
        <h1 class="text-[#13975C] text-2xl font-bold">Done Orders</h1>
      </header>
      
      <!-- Main -->
      <main class="flex flex-col gap-4 max-w-[80%] mx-auto mt-6">

        <!-- New Orders -->
        <?php
          include "config/connection.php";

          $transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE status='done' ORDER BY id DESC");

          while ($transaction = mysqli_fetch_array($transactions)) {
          ?>
            <div class="flex justify-between p-2 bg-[#E5E5E5] rounded-xl">
              <div class="flex gap-2">
                <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path></svg>
                </div>
                <div class="flex flex-col gap-2">
                  <p class="font-bold">Order No: <?=$transaction['id']?></p>
                  <div>
                    <p class="text-[#A5A5A5] text-sm font-semibold">Order Created</p>
                    <p class="text-sm font-semibold"><?=$transaction['created_at']?></p>
                  </div>
                  <div>
                    <p class="text-[#A5A5A5] text-sm font-semibold">Ordered By</p>
                    <p class="text-sm font-semibold"><?=$transaction['name']?> | <?=$transaction['phone']?></p>
                  </div>
                </div>
              </div>
              <div class="flex flex-col justify-end mr-4 mt-2">
                <div>
                  <p class="text-[#A5A5A5] text-sm font-semibold">Total</p>
                  <p class="text-sm font-semibold">Rp. <?=$transaction['total']?></p>
                </div>
              </div>
            </div>
          <?php
          }
        ?>
      </main>

      <!-- Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    </div>
  </body>
</html>