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
    <title>Users | Laundry</title>
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
        <h1 class="text-[#13975C] text-2xl font-bold">Users</h1>
      </header>
      
      <!-- Main -->
      <main class="flex flex-col gap-4 max-w-[80%] mx-auto">

        <!-- Add button -->
        <a href="addUser.php" class="block w-24 mt-6 py-1 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">ADD</a>

        <!-- Users -->
        <?php
          include "config/connection.php";

          $users = mysqli_query($conn, "SELECT * FROM users");

          while ($user = mysqli_fetch_array($users)) {
          ?>
            <div class="flex items-center justify-between px-4 py-2 bg-[#E5E5E5] rounded-xl">
              <div class="flex items-center gap-2">
                <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-12 rounded-full" />
                <div>
                  <p><?=$user['name']?></p>
                  <p class="text-[#A5A5A5] text-xs">@<?=$user['username']?> - <?=$user['role']?></p>
                </div>
              </div>
              <div class="flex gap-2">
                <a href="editUser.php?id=<?=$user['id']?>" class="px-4 py-1 text-white text-xs text-center bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Edit</a>
                <a href="actions/deleteUserAction.php?id=<?=$user['id']?>" class="px-4 py-1 text-white text-xs text-center bg-red-500 hover:bg-red-500/90 rounded-full transition-all duration-200">Delete</a>
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