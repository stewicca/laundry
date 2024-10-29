<?php
  // Initialization
  session_start();
  include "config/connection.php";

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  $id = $_GET['id'];

  if (!$id) {
    header("location:index.php");
  }

  $transaction = mysqli_query($conn, "SELECT * FROM transactions WHERE id='$id'");

  if (mysqli_num_rows($transaction) < 1) {
    header("location:index.php?alert=failed");
  }

  $transaction = mysqli_fetch_assoc($transaction);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const alertBox = document.getElementById('alert');
        if (alertBox) {
          setTimeout(() => alertBox.style.display = 'none', 3000);
        }
      });
    </script>
    <style>
      .custom-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5H7z" fill="currentColor"/></svg>');
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 1.5rem;
        transition: background-image 0.3s ease;
      }

      .rotate-arrow {
        background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 14l5-5 5 5H7z" fill="currentColor"/></svg>');
      }
    </style>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Alert -->
      <?php
        include "components/alert.php";
      ?>

      <!-- Header -->
      <header class="flex items-center justify-center h-20 bg-[#D7F7E8]">
        <h1 class="text-[#13975C] text-2xl font-bold">Edit Status</h1>
      </header>

      <main class="max-w-[80%] mx-auto">
        <form action="actions/editStatusAction.php" method="POST" class="flex flex-col gap-6 mt-6">
          <input type="number" name="id" value="<?=$transaction['id']?>" class="hidden" />
          <select name="status" id="statusSelect" class="custom-select w-full px-4 py-2 border-2 rounded-lg">
            <option value="">Please select</option>
            <option value="new">New</option>
            <option value="process">Process</option>
            <option value="done">Done</option>
          </select>
          <button type="submit" class="w-1/2 mx-auto py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Submit</button>
        </form>
      </main>

      <!-- Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    </div>

    <script>
      const selectElement = document.getElementById('statusSelect');

      selectElement.addEventListener('click', function() {
        this.classList.toggle('rotate-arrow');
      });

      selectElement.addEventListener('blur', function() {
        this.classList.remove('rotate-arrow');
      });
    </script>
  </body>
</html>