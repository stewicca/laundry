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
    <title>Process | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Header -->
      <header class="flex items-center justify-center h-20 bg-[#D7F7E8]">
        <h1 class="text-[#13975C] text-2xl font-bold">Orders in Process</h1>
      </header>
      
      <!-- Main -->
      <main class="flex flex-col gap-4 max-w-[80%] mx-auto mt-6">

        <!-- New Orders -->
        <?php
          include "config/connection.php";

          $transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE status='process' ORDER BY id DESC");

          while ($transaction = mysqli_fetch_array($transactions)) {
          ?>
            <div class="flex justify-between p-2 bg-[#E5E5E5] rounded-xl">
              <div class="flex gap-2">
                <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                  <svg fill="currentColor" height="200px" width="200px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 366.891 366.891" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 366.891 366.891" class="w-1/2 h-auto"><path d="m322.618,149.858l-5.361,38.766c-9.527,1.936-15.74,6.12-20.608,9.406-5.385,3.635-8.636,5.829-16.561,5.829-7.925,0-11.176-2.194-16.561-5.829-6.553-4.423-15.528-10.48-31.767-10.48-16.238,0-25.212,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.557,5.829-7.923,0-11.173-2.193-16.557-5.829-6.553-4.423-15.528-10.481-31.766-10.481-16.239,0-25.213,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.556,5.829s-11.171-2.193-16.555-5.829c-4.868-3.286-11.079-7.469-20.606-9.406l-5.361-38.766-29.717,4.109 24.041,173.824c2.75,22.301 21.734,39.099 44.22,39.099h201.26c22.485,0 41.47-16.798 44.22-39.099l24.041-173.824-29.719-4.11z"></path><path d="m64.153,96.296h17.208v73.182c2.075,1.273 3.879,2.484 5.432,3.532 8.143-5.495 23.146-15.461 48.32-15.461 25.181,0 40.185,9.971 48.324,15.462 8.146-5.496 23.149-15.462 48.323-15.462 25.187,0 40.193,9.976 48.328,15.464 1.555-1.049 3.361-2.261 5.44-3.536v-73.181h17.209c13.113,0 23.781-10.669 23.781-23.782v-48.732c-0.001-13.113-10.669-23.782-23.782-23.782h-58.859l-1.445,2.496c-12.151,21.005-34.754,34.053-58.988,34.053s-46.837-13.048-58.988-34.053l-1.445-2.496h-58.858c-13.113,0-23.782,10.669-23.782,23.782v48.731c0,13.114 10.669,23.783 23.782,23.783z"></path></svg>
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
              <div class="flex flex-col justify-between mr-4 mt-2">
                <a href="editStatus.php?id=<?=$transaction['id']?>" class="h-fit px-4 py-1 text-white text-xs text-center bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Edit</a>
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