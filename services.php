<?php
  // Initialization
  session_start();

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  // Check user role
  if ($_SESSION['role'] != "superadmin") {
    header("location:index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const alertBox = document.getElementById('alert');
        if (alertBox) {
          setTimeout(() => alertBox.style.display = 'none', 3000);
        }
      });
    </script>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Alert -->
      <?php
        include "components/alert.php";
      ?>

      <!-- Header -->
      <header class="flex items-center justify-center h-20 bg-[#D7F7E8]">
        <h1 class="text-[#13975C] text-2xl font-bold">Services</h1>
      </header>
      
      <!-- Main -->
      <main class="flex flex-col gap-4 max-w-[80%] mx-auto">

        <!-- Add button -->
        <a href="addService.php" class="block w-24 mt-6 py-1 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full">ADD</a>

        <!-- Services -->
        <?php
          include "config/connection.php";

          $services = mysqli_query($conn, "SELECT * FROM services");

          while ($service = mysqli_fetch_array($services)) {
          ?>
            <div class="flex items-center justify-between px-4 py-2 bg-[#E5E5E5] rounded-xl">
              <div class="flex items-center gap-2">
                <div class="flex items-center justify-center w-12 h-12 bg-[#D7F7E8] rounded-lg">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3/4"><path d="M8.11547 14.2081C8.00236 14.2809 7.88681 14.3548 7.77104 14.4256C7.98453 16.573 9.79642 18.25 12 18.25C14.3472 18.25 16.25 16.3472 16.25 14L16.25 13.9945C16.1169 14.0184 15.9793 14.0397 15.8461 14.0603L15.8305 14.0627C15.6688 14.0878 15.5091 14.1125 15.3451 14.142C14.6442 14.2683 14.0781 14.2172 13.5869 14.036C13.1303 13.8675 12.786 13.6003 12.5321 13.4031L12.5084 13.3847C12.233 13.1711 12.0529 13.0377 11.83 12.9555C11.6273 12.8807 11.3371 12.832 10.857 12.9186C10.1533 13.0454 9.52387 13.3448 8.9424 13.688C8.69352 13.8348 8.46278 13.9839 8.23511 14.1309L8.11547 14.2081Z" fill="#13975C"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10ZM17.75 14C17.75 13.7807 17.7377 13.5644 17.7138 13.3515L17.7338 13.3378L17.643 12.8902C17.1259 10.2456 14.796 8.25 12 8.25C8.82436 8.25 6.25 10.8244 6.25 14C6.25 17.1756 8.82436 19.75 12 19.75C15.1756 19.75 17.75 17.1756 17.75 14ZM8 5.25C7.58579 5.25 7.25 5.58579 7.25 6C7.25 6.41421 7.58579 6.75 8 6.75H16C16.4142 6.75 16.75 6.41421 16.75 6C16.75 5.58579 16.4142 5.25 16 5.25H8Z" fill="#13975C"></path></svg>
                </div>
                <div>
                  <p><?=$service['name']?></p>
                  <p class="text-[#A5A5A5] text-xs">Rp <?=$service['price']?> / <?=$service['unit']?></p>
                </div>
              </div>
              <div class="flex gap-2">
                <a href="editService.php?id=<?=$service['id']?>" class="px-4 py-1 text-white text-xs text-center bg-[#13975C] hover:bg-[#13975C]/90 rounded-full">Edit</a>
                <a href="actions/deleteServiceAction.php?id=<?=$service['id']?>" class="px-4 py-1 text-white text-xs text-center bg-red-500 hover:bg-red-500/90 rounded-full">Delete</a>
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