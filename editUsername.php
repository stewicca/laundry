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
    <title>Edit Username | Laundry</title>
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

        if (isset($_GET['alert'])) {
          if ($_GET['alert'] == "username") {
            echo '
            <div id="alert" role="alert" class="absolute top-10 right-1/2 translate-x-1/2 px-4 py-2 bg-white rounded-xl border border-red-600">
              <div class="flex items-center gap-2">
                <span class="text-red-600">
                  <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path id="error-circle" d="M32.085,56.058c6.165,-0.059 12.268,-2.619 16.657,-6.966c5.213,-5.164 7.897,-12.803 6.961,-20.096c-1.605,-12.499 -11.855,-20.98 -23.772,-20.98c-9.053,0 -17.853,5.677 -21.713,13.909c-2.955,6.302 -2.96,13.911 0,20.225c3.832,8.174 12.488,13.821 21.559,13.908c0.103,0.001 0.205,0.001 0.308,0Zm-0.282,-4.003c-9.208,-0.089 -17.799,-7.227 -19.508,-16.378c-1.204,-6.452 1.07,-13.433 5.805,-18.015c5.53,-5.35 14.22,-7.143 21.445,-4.11c6.466,2.714 11.304,9.014 12.196,15.955c0.764,5.949 -1.366,12.184 -5.551,16.48c-3.672,3.767 -8.82,6.016 -14.131,6.068c-0.085,0 -0.171,0 -0.256,0Zm-12.382,-10.29l9.734,-9.734l-9.744,-9.744l2.804,-2.803l9.744,9.744l10.078,-10.078l2.808,2.807l-10.078,10.079l10.098,10.098l-2.803,2.804l-10.099,-10.099l-9.734,9.734l-2.808,-2.808Z" /></svg>
                </span>
                <strong class="block text-gray-900 font-medium">Username Taken!</strong>
              </div>
            </div>';
          }
        }
      ?>
      
      <!-- Profile -->
      <div class="flex flex-col items-center justify-center gap-2 w-full h-64 bg-[#13975C]">
        <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-28 rounded-full" />
        <p class="text-white text-2xl font-bold"><?php echo $name; ?></p>
      </div>

      <!-- Menus -->
      <div class="relative max-w-[80%] mx-auto">
        <div class="absolute flex inset-y-0 -top-10 flex-col gap-4 w-full min-h-96 py-2 px-4 bg-white rounded-lg">
          <h1 class="mt-2 text-[#13975C] text-xl text-center font-semibold">Edit Username</h1>
          <form action="actions/editUsernameAction.php" method="POST" class="flex flex-col gap-6 mt-2">
            <input type="number" name="id" value="<?=$_SESSION['id']?>" class="hidden" />
            <input type="text" name="oldUsername" placeholder="Old Username" required class="w-full px-4 py-2 border-2 rounded-lg" />
            <input type="text" name="newUsername" placeholder="New Username" required class="w-full px-4 py-2 border-2 rounded-lg" />
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