<?php
  // Initialization
  session_start();

  // Check user login
  if (!$_SESSION['name'] || !$_SESSION['role']) {
    header("location:login.php");
  }

  $name = $_SESSION['name'];
  $role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Laundry</title>
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

          <!-- Edit profile name -->
          <a href="editName.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
            <div class="flex items-center gap-2">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M4 20.0001H20M4 20.0001V16.0001L12 8.00012M4 20.0001L8 20.0001L16 12.0001M12 8.00012L14.8686 5.13146L14.8704 5.12976C15.2652 4.73488 15.463 4.53709 15.691 4.46301C15.8919 4.39775 16.1082 4.39775 16.3091 4.46301C16.5369 4.53704 16.7345 4.7346 17.1288 5.12892L18.8686 6.86872C19.2646 7.26474 19.4627 7.46284 19.5369 7.69117C19.6022 7.89201 19.6021 8.10835 19.5369 8.3092C19.4628 8.53736 19.265 8.73516 18.8695 9.13061L18.8686 9.13146L16 12.0001M12 8.00012L16 12.0001" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <p class="text-lg font-semibold">Edit profile name</p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </a>

          <!-- Change username -->
          <a href="editUsername.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
            <div class="flex items-center gap-2">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M15 12.0024V13C15 14.1046 15.8954 15 17 15C18.1046 15 19 14.1046 19 13V12C19 10.5021 18.5197 9.04388 17.6294 7.83935C16.7391 6.63482 15.4856 5.74757 14.0537 5.3081C12.6218 4.86863 11.0866 4.90001 9.67383 5.39771C8.26109 5.89542 7.04534 6.83359 6.20508 8.07355C5.36482 9.31351 4.94457 10.7899 5.00587 12.2865C5.06717 13.7831 5.60688 15.2207 6.54573 16.3878C7.48458 17.5549 8.77336 18.3899 10.2221 18.7704C11.6708 19.1509 13.2027 19.0566 14.5939 18.5015M15 12.0024C14.9987 13.6582 13.656 15 12 15C10.3431 15 9 13.6568 9 12C9 10.3431 10.3431 8.99999 12 8.99999C13.656 8.99999 14.9987 10.3418 15 11.9976M15 12.0024V11.9976M15 11.9976V8.99999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <p class="text-lg font-semibold">Change username</p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </a>

          <!-- Change password -->
          <a href="editPassword.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
            <div class="flex items-center gap-2">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M9.23047 9H7.2002C6.08009 9 5.51962 9 5.0918 9.21799C4.71547 9.40973 4.40973 9.71547 4.21799 10.0918C4 10.5196 4 11.0801 4 12.2002V17.8002C4 18.9203 4 19.4801 4.21799 19.9079C4.40973 20.2842 4.71547 20.5905 5.0918 20.7822C5.5192 21 6.07902 21 7.19694 21H16.8031C17.921 21 18.48 21 18.9074 20.7822C19.2837 20.5905 19.5905 20.2842 19.7822 19.9079C20 19.4805 20 18.9215 20 17.8036V12.1969C20 11.079 20 10.5192 19.7822 10.0918C19.5905 9.71547 19.2837 9.40973 18.9074 9.21799C18.4796 9 17.9203 9 16.8002 9H14.7689M9.23047 9H14.7689M9.23047 9C9.10302 9 9 8.89668 9 8.76923V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V8.76923C15 8.89668 14.8964 9 14.7689 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <p class="text-lg font-semibold">Change password</p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </a>

          <?php
            if ($role == "superadmin") echo '
            <!-- Manage users -->
            <a href="users.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
              <div class="flex items-center gap-2">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M15 19C15 16.7909 12.3137 15 9 15C5.68629 15 3 16.7909 3 19M19 16V13M19 13V10M19 13H16M19 13H22M9 12C6.79086 12 5 10.2091 5 8C5 5.79086 6.79086 4 9 4C11.2091 4 13 5.79086 13 8C13 10.2091 11.2091 12 9 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p class="text-lg font-semibold">Manage users</p>
              </div>
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a>

            <!-- Manage services -->
            <a href="services.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
              <div class="flex items-center gap-2">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path d="M14 13C14 14.1046 13.1046 15 12 15M17 6H17.01M17 13C17 15.7614 14.7614 18 12 18C9.23858 18 7 15.7614 7 13C7 10.2386 9.23858 8 12 8C14.7614 8 17 10.2386 17 13ZM6 21H18C19.1046 21 20 20.1046 20 19V5C20 3.89543 19.1046 3 18 3H6C4.89543 3 4 3.89543 4 5V19C4 20.1046 4.89543 21 6 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p class="text-lg font-semibold">Manage services</p>
              </div>
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a>

            <!-- All Orders -->
            <a href="orders.php" class="block flex items-center justify-between text-[#13975C] w-full border-b-2 border-[#13975C]">
              <div class="flex items-center gap-2">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M9 11V20M9 11H4.59961C4.03956 11 3.75981 11 3.5459 11.109C3.35774 11.2049 3.20487 11.3577 3.10899 11.5459C3 11.7598 3 12.04 3 12.6001V20H9M9 11V5.6001C9 5.04004 9 4.75981 9.10899 4.5459C9.20487 4.35774 9.35774 4.20487 9.5459 4.10899C9.75981 4 10.0396 4 10.5996 4H13.3996C13.9597 4 14.2403 4 14.4542 4.10899C14.6423 4.20487 14.7948 4.35774 14.8906 4.5459C14.9996 4.75981 15 5.04005 15 5.6001V8M9 20H15M15 20L21 20.0001V9.6001C21 9.04005 20.9996 8.75981 20.8906 8.5459C20.7948 8.35774 20.6429 8.20487 20.4548 8.10899C20.2409 8 19.9601 8 19.4 8H15M15 20V8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <p class="text-lg font-semibold">All Orders</p>
              </div>
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </a>';
          ?>

          <!-- Logout -->
          <a href="actions/logoutAction.php" class="block flex items-center justify-between text-red-500 w-full border-b-2 border-red-500">
            <div class="flex items-center gap-2">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M12 15L15 12M15 12L12 9M15 12H4M4 7.24802V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H16.8002C17.9203 4 18.4796 4 18.9074 4.21799C19.2837 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.07899 20 7.19691V16.8036C20 17.9215 20 18.4805 19.7822 18.9079C19.5905 19.2842 19.2837 19.5905 18.9074 19.7822C18.48 20 17.921 20 16.8031 20H7.19691C6.07899 20 5.5192 20 5.0918 19.7822C4.71547 19.5905 4.40973 19.2839 4.21799 18.9076C4 18.4798 4 17.9201 4 16.8V16.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <p class="text-lg font-semibold">Logout</p>
            </div>
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-auto"><path id="Vector" d="M5 12H19M19 12L13 6M19 12L13 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          </a>
        </div>
      </div>

      <?php
        include "components/navbar.php";
      ?>
    </div>
  </body>
</html>