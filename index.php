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
    <title>Laundry</title>
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
      <main class="max-w-[80%] mx-auto">

        <!-- Alert -->
        <?php
          include "components/alert.php";
        ?>

        <!-- Greeting -->
        <div class="flex items-center gap-4 py-8">
          <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="w-16 rounded-full" />
          <div>
            <h1 class="text-2xl font-bold">Hello, <?php echo $name; ?>!</h1>
            <p class="text-[#A5A5A5]">Have a great day!</p>
          </div>
        </div>

        <!-- Main menu -->
        <div class="grid grid-cols-2 gap-4">
          <a href="transaction.php" class="block flex justify-center w-full h-32 text-[#13975C] bg-[#CDE7DB] rounded-md">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto hover:scale-125 transition-all duration-200"><path fill-rule="evenodd" clip-rule="evenodd" d="M13 9C13 8.44772 12.5523 8 12 8C11.4477 8 11 8.44772 11 9V11H9C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13H11V15C11 15.5523 11.4477 16 12 16C12.5523 16 13 15.5523 13 15V13H15C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11H13V9ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z" fill="currentColor"></path></svg>
          </a>
          <a href="new.php" class="flex justify-center w-full h-32 text-[#13975C] bg-[#CDE7DB] rounded-md">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto hover:scale-125 transition-all duration-200"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25024 4.66355C8.11998 3.36729 9.62311 2 12 2C14.3769 2 15.8801 3.36729 16.7498 4.66355C17.6074 5.94174 17.9252 7.2474 17.9711 7.44762C17.9775 7.47579 17.9821 7.49925 17.9853 7.51539L19.52 15.4288C19.8791 17.2803 18.4609 19 16.5749 19H7.42516C5.53916 19 4.12096 17.2803 4.48004 15.4288L6.01476 7.51539C6.01789 7.49925 6.02253 7.47579 6.02897 7.44762C6.07479 7.2474 6.39262 5.94174 7.25024 4.66355Z" fill="currentColor"></path><path d="M8.51355 20C8.76552 20.4807 9.15137 20.9831 9.73641 21.3672C10.3462 21.7675 11.113 22 12.0464 22C12.9799 22 13.7467 21.7675 14.3565 21.3672C14.9415 20.9831 15.3274 20.4807 15.5793 20H8.51355Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17.2929 2.29289C16.9024 2.68342 16.9024 3.31658 17.2929 3.70711C18.119 4.53324 18.5549 5.34278 19.0299 7.24254C19.1638 7.77833 19.7067 8.10409 20.2425 7.97014C20.7783 7.83619 21.1041 7.29326 20.9702 6.75746C20.4451 4.65722 19.881 3.46676 18.7071 2.29289C18.3166 1.90237 17.6834 1.90237 17.2929 2.29289Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.7071 2.29289C7.09762 2.68342 7.09762 3.31658 6.7071 3.70711C5.88097 4.53324 5.44507 5.34278 4.97013 7.24254C4.83619 7.77833 4.29325 8.10409 3.75746 7.97014C3.22166 7.83619 2.8959 7.29326 3.02985 6.75746C3.55491 4.65722 4.11902 3.46676 5.29289 2.29289C5.68341 1.90237 6.31657 1.90237 6.7071 2.29289Z" fill="currentColor"></path></svg>
          </a>
          <a href="process.php" class="flex justify-center w-full h-32 text-[#13975C] bg-[#CDE7DB] rounded-md">
            <svg fill="currentColor" height="200px" width="200px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 366.891 366.891" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 366.891 366.891" class="w-1/2 h-auto hover:scale-125 transition-all duration-200"><path d="m322.618,149.858l-5.361,38.766c-9.527,1.936-15.74,6.12-20.608,9.406-5.385,3.635-8.636,5.829-16.561,5.829-7.925,0-11.176-2.194-16.561-5.829-6.553-4.423-15.528-10.48-31.767-10.48-16.238,0-25.212,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.557,5.829-7.923,0-11.173-2.193-16.557-5.829-6.553-4.423-15.528-10.481-31.766-10.481-16.239,0-25.213,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.556,5.829s-11.171-2.193-16.555-5.829c-4.868-3.286-11.079-7.469-20.606-9.406l-5.361-38.766-29.717,4.109 24.041,173.824c2.75,22.301 21.734,39.099 44.22,39.099h201.26c22.485,0 41.47-16.798 44.22-39.099l24.041-173.824-29.719-4.11z"></path><path d="m64.153,96.296h17.208v73.182c2.075,1.273 3.879,2.484 5.432,3.532 8.143-5.495 23.146-15.461 48.32-15.461 25.181,0 40.185,9.971 48.324,15.462 8.146-5.496 23.149-15.462 48.323-15.462 25.187,0 40.193,9.976 48.328,15.464 1.555-1.049 3.361-2.261 5.44-3.536v-73.181h17.209c13.113,0 23.781-10.669 23.781-23.782v-48.732c-0.001-13.113-10.669-23.782-23.782-23.782h-58.859l-1.445,2.496c-12.151,21.005-34.754,34.053-58.988,34.053s-46.837-13.048-58.988-34.053l-1.445-2.496h-58.858c-13.113,0-23.782,10.669-23.782,23.782v48.731c0,13.114 10.669,23.783 23.782,23.783z"></path></svg>
          </a>
          <a href="done.php" class="flex justify-center w-full h-32 text-[#13975C] bg-[#CDE7DB] rounded-md">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto hover:scale-125 transition-all duration-200"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path></svg>
          </a>
        </div>

        <!-- Recent transaction -->
        <div class="space-y-4 mb-10 py-8">
          <p class="text-xl font-bold">Recent transaction</p>
          <div class="flex flex-col gap-2">

            <!-- Transactions -->
            <?php
              include "config/connection.php";

              $transactions = mysqli_query($conn, "SELECT * FROM transactions ORDER BY id DESC LIMIT 5");

              while ($transaction = mysqli_fetch_array($transactions)) {
                if ($transaction['status'] == 'new') {
                  ?>
                    <div class="w-full bg-[#E5E5E5] rounded-lg">
                      <div class="flex items-center gap-2 p-2">
                        <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25024 4.66355C8.11998 3.36729 9.62311 2 12 2C14.3769 2 15.8801 3.36729 16.7498 4.66355C17.6074 5.94174 17.9252 7.2474 17.9711 7.44762C17.9775 7.47579 17.9821 7.49925 17.9853 7.51539L19.52 15.4288C19.8791 17.2803 18.4609 19 16.5749 19H7.42516C5.53916 19 4.12096 17.2803 4.48004 15.4288L6.01476 7.51539C6.01789 7.49925 6.02253 7.47579 6.02897 7.44762C6.07479 7.2474 6.39262 5.94174 7.25024 4.66355Z" fill="currentColor"></path><path d="M8.51355 20C8.76552 20.4807 9.15137 20.9831 9.73641 21.3672C10.3462 21.7675 11.113 22 12.0464 22C12.9799 22 13.7467 21.7675 14.3565 21.3672C14.9415 20.9831 15.3274 20.4807 15.5793 20H8.51355Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17.2929 2.29289C16.9024 2.68342 16.9024 3.31658 17.2929 3.70711C18.119 4.53324 18.5549 5.34278 19.0299 7.24254C19.1638 7.77833 19.7067 8.10409 20.2425 7.97014C20.7783 7.83619 21.1041 7.29326 20.9702 6.75746C20.4451 4.65722 19.881 3.46676 18.7071 2.29289C18.3166 1.90237 17.6834 1.90237 17.2929 2.29289Z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.7071 2.29289C7.09762 2.68342 7.09762 3.31658 6.7071 3.70711C5.88097 4.53324 5.44507 5.34278 4.97013 7.24254C4.83619 7.77833 4.29325 8.10409 3.75746 7.97014C3.22166 7.83619 2.8959 7.29326 3.02985 6.75746C3.55491 4.65722 4.11902 3.46676 5.29289 2.29289C5.68341 1.90237 6.31657 1.90237 6.7071 2.29289Z" fill="currentColor"></path></svg>
                        </div>
                        <div>
                          <p class="font-bold">Order No: <?=$transaction['id']?></p>
                          <p class="text-sm"><?=ucfirst($transaction['status'])?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                } elseif ($transaction['status'] == 'process') {
                  ?>
                    <div class="w-full bg-[#E5E5E5] rounded-lg">
                      <div class="flex items-center gap-2 p-2">
                        <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                          <svg fill="currentColor" height="200px" width="200px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 366.891 366.891" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 366.891 366.891" class="w-1/2 h-auto"><path d="m322.618,149.858l-5.361,38.766c-9.527,1.936-15.74,6.12-20.608,9.406-5.385,3.635-8.636,5.829-16.561,5.829-7.925,0-11.176-2.194-16.561-5.829-6.553-4.423-15.528-10.48-31.767-10.48-16.238,0-25.212,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.557,5.829-7.923,0-11.173-2.193-16.557-5.829-6.553-4.423-15.528-10.481-31.766-10.481-16.239,0-25.213,6.058-31.765,10.481-5.384,3.635-8.634,5.829-16.556,5.829s-11.171-2.193-16.555-5.829c-4.868-3.286-11.079-7.469-20.606-9.406l-5.361-38.766-29.717,4.109 24.041,173.824c2.75,22.301 21.734,39.099 44.22,39.099h201.26c22.485,0 41.47-16.798 44.22-39.099l24.041-173.824-29.719-4.11z"></path><path d="m64.153,96.296h17.208v73.182c2.075,1.273 3.879,2.484 5.432,3.532 8.143-5.495 23.146-15.461 48.32-15.461 25.181,0 40.185,9.971 48.324,15.462 8.146-5.496 23.149-15.462 48.323-15.462 25.187,0 40.193,9.976 48.328,15.464 1.555-1.049 3.361-2.261 5.44-3.536v-73.181h17.209c13.113,0 23.781-10.669 23.781-23.782v-48.732c-0.001-13.113-10.669-23.782-23.782-23.782h-58.859l-1.445,2.496c-12.151,21.005-34.754,34.053-58.988,34.053s-46.837-13.048-58.988-34.053l-1.445-2.496h-58.858c-13.113,0-23.782,10.669-23.782,23.782v48.731c0,13.114 10.669,23.783 23.782,23.783z"></path></svg>
                        </div>
                        <div>
                          <p class="font-bold">Order No: <?=$transaction['id']?></p>
                          <p class="text-sm"><?=ucfirst($transaction['status'])?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                } else {
                  ?>
                    <div class="w-full bg-[#E5E5E5] rounded-lg">
                      <div class="flex items-center gap-2 p-2">
                        <div class="flex justify-center w-14 h-14 text-[#13975C] bg-[#CDE7DB] rounded-md">
                          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-1/2 h-auto"><path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM15.7071 9.29289C16.0976 9.68342 16.0976 10.3166 15.7071 10.7071L12.0243 14.3899C11.4586 14.9556 10.5414 14.9556 9.97568 14.3899L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929C8.68342 10.9024 9.31658 10.9024 9.70711 11.2929L11 12.5858L14.2929 9.29289C14.6834 8.90237 15.3166 8.90237 15.7071 9.29289Z" fill="currentColor"></path></svg>
                        </div>
                        <div>
                          <p class="font-bold">Order No: <?=$transaction['id']?></p>
                          <p class="text-sm"><?=ucfirst($transaction['status'])?></p>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </main>

      <!-- Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    </div>
  </body>
</html>