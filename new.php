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
    <title>New | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Header -->
      <header class="flex items-center justify-center h-20 bg-[#D7F7E8]">
        <h1 class="text-[#13975C] text-2xl font-bold">New Orders</h1>
      </header>
      
      <!-- Main -->
      <main class="flex flex-col gap-4 max-w-[80%] mx-auto mt-6">

        <!-- New Orders -->
        <?php
          include "config/connection.php";

          $transactions = mysqli_query($conn, "SELECT * FROM transactions WHERE status='new' ORDER BY id DESC");

          while ($transaction = mysqli_fetch_array($transactions)) {
          ?>
            <div class="flex justify-between p-2 bg-[#E5E5E5] rounded-xl">
              <div class="flex gap-2">
                <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25024 4.66355C8.11998 3.36729 9.62311 2 12 2C14.3769 2 15.8801 3.36729 16.7498 4.66355C17.6074 5.94174 17.9252 7.2474 17.9711 7.44762C17.9775 7.47579 17.9821 7.49925 17.9853 7.51539L19.52 15.4288C19.8791 17.2803 18.4609 19 16.5749 19H7.42516C5.53916 19 4.12096 17.2803 4.48004 15.4288L6.01476 7.51539C6.01789 7.49925 6.02253 7.47579 6.02897 7.44762C6.07479 7.2474 6.39262 5.94174 7.25024 4.66355Z" fill="currentColor"></path><path d="M8.51355 20C8.76552 20.4807 9.15137 20.9831 9.73641 21.3672C10.3462 21.7675 11.113 22 12.0464 22C12.9799 22 13.7467 21.7675 14.3565 21.3672C14.9415 20.9831 15.3274 20.4807 15.5793 20H8.51355Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17.2929 2.29289C16.9024 2.68342 16.9024 3.31658 17.2929 3.70711C18.119 4.53324 18.5549 5.34278 19.0299 7.24254C19.1638 7.77833 19.7067 8.10409 20.2425 7.97014C20.7783 7.83619 21.1041 7.29326 20.9702 6.75746C20.4451 4.65722 19.881 3.46676 18.7071 2.29289C18.3166 1.90237 17.6834 1.90237 17.2929 2.29289Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.7071 2.29289C7.09762 2.68342 7.09762 3.31658 6.7071 3.70711C5.88097 4.53324 5.44507 5.34278 4.97013 7.24254C4.83619 7.77833 4.29325 8.10409 3.75746 7.97014C3.22166 7.83619 2.8959 7.29326 3.02985 6.75746C3.55491 4.65722 4.11902 3.46676 5.29289 2.29289C5.68341 1.90237 6.31657 1.90237 6.7071 2.29289Z" fill="currentColor"></path></svg>
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