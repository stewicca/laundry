<?php
  // Initialization
  session_start();
  include "config/connection.php";

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  // Check user role
  if ($_SESSION['role'] != "superadmin") {
    header("location:index.php");
  }

  $id = $_GET['id'];

  if (!$id) {
    header("location:services.php");
  }

  $service = mysqli_query($conn, "SELECT * FROM services WHERE id='$id'");

  if (mysqli_num_rows($service) < 1) {
    header("location:services.php?alert=failed");
  }

  $service = mysqli_fetch_assoc($service);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service | Laundry</title>
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
        <h1 class="text-[#13975C] text-2xl font-bold">Edit Service</h1>
      </header>

      <main class="max-w-[80%] mx-auto">
        <form action="actions/editServiceAction.php" method="POST" class="flex flex-col gap-6 mt-6">
          <input type="number" name="id" value="<?=$service['id']?>" class="hidden" />
          <input type="text" name="name" placeholder="Name" value="<?=$service['name']?>" required class="w-full px-4 py-2 border-2 rounded-lg" />
          <input type="number" name="price" placeholder="Price" value="<?=$service['price']?>" required class="w-full px-4 py-2 border-2 rounded-lg" />
          <input type="text" name="unit" placeholder="Unit" value="<?=$service['unit']?>" required class="w-full px-4 py-2 border-2 rounded-lg" />
          <button type="submit" class="w-1/2 mx-auto mt-6 py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Submit</button>
        </form>
      </main>

      <!-- Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    </div>
  </body>
</html>