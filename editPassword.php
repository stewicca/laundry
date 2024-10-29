<?php
  // Initialization
  session_start();

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  $name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password | Laundry</title>
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
    <div class="max-w-md min-h-screen mx-auto bg-[#E5E5E5]">

      <!-- Alert -->
      <?php
        include "components/alert.php";
      ?>
      
      <!-- Profile -->
      <div class="flex flex-col items-center justify-center gap-2 w-full h-64 bg-[#13975C]">
        <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-28 rounded-full" />
        <p class="text-white text-2xl font-bold"><?php echo $name; ?></p>
      </div>

      <!-- Menus -->
      <div class="relative max-w-[80%] mx-auto">
        <div class="absolute flex inset-y-0 -top-10 flex-col gap-4 w-full min-h-96 py-2 px-4 bg-white rounded-lg">
          <h1 class="mt-2 text-[#13975C] text-xl text-center font-semibold">Edit Password</h1>
          <form action="actions/editPasswordAction.php" method="POST" class="flex flex-col gap-6 mt-2">
            <input type="number" name="id" value="<?=$_SESSION['id']?>" class="hidden" />
            <input type="password" name="oldPassword" placeholder="Old Password" required class="w-full px-4 py-2 border-2 rounded-lg" />
            <input type="password" name="newPassword" placeholder="Old Password" required class="w-full px-4 py-2 border-2 rounded-lg" />
            <button type="submit" class="w-1/2 mx-auto py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Submit</button>
          </form>
        </div>
      </div>

      <?php
        include "components/navbar.php";
      ?>
    </div>
  </body>
</html>