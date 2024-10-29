<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Laundry</title>
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
      <main class="flex flex-col items-center justify-center gap-8 max-w-[80%] min-h-screen mx-auto">

        <!-- Alert -->
        <?php
          include "components/alert.php";
        ?>

        <!-- Header image -->
        <img src="./public/6057216.jpg" class="w-full h-auto" />

        <!-- Login form -->
        <div class="w-full space-y-8">
          <h1 class="text-[#13975C] text-2xl text-center font-bold">Login</h1>
          <form action="actions/loginAction.php" method="POST" class="flex flex-col items-center gap-4">
            <input type="text" name="username" placeholder="Username" class="w-full h-10 pl-4 border-b-2" />
            <input type="password" name="password" placeholder="Password" class="w-full h-10 pl-4 border-b-2" />
            <button type="submit" class="w-1/2 mt-6 py-2 text-white text-center font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">Submit</button>
          </form>
        </div>
      </main>
    </div>
  </body>
</html>