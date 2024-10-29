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
    <title>Transaction | Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .overflow-scroll::-webkit-scrollbar {
        display: none;
      }
    </style>
  </head>
  <body class="bg-[#F5F5F5]">
    <div class="relative max-w-md min-h-screen mx-auto bg-white">

      <!-- Form -->
      <form id="orderForm" action="actions/addTransactionAction.php" method="POST" class="space-y-6">
        <div class="flex items-center h-56 bg-[#13975C] rounded-b-3xl">
          <div class="space-y-4 w-full max-w-[80%] mx-auto">
            <h1 class="text-white text-2xl font-bold">Create Order</h1>
            <input type="text" name="name" placeholder="Name" required class="w-full px-4 py-2 border-2 rounded-lg" />
            <input type="text" name="phone" placeholder="Phone" required class="w-full px-4 py-2 border-2 rounded-lg" />
          </div>
        </div>
        <div class="max-w-[80%] mx-auto">
          <div class="flex items-center gap-4">
            <h2 class="text-2xl font-bold">Services</h2>
            <button type="button" id="add" class="px-6 py-1 text-white text-sm font-semibold bg-[#13975C] hover:bg-[#13975C]/90 rounded-full transition-all duration-200">ADD</button>
          </div>
          <div id="services" class="space-y-2 mt-4">
            <!-- Service cards will be appended here -->
          </div>
          <button type="button" id="submitBtn" class="w-fit px-6 py-2 mt-4 text-white bg-[#13975C] hover:bg-[#13975C]/90 rounded-lg hidden transition-all duration-200">Submit</button>
        </div>
      </form>

      <!-- Blur -->
      <div id="blur" class="absolute inset-0 w-full h-full bg-black/30 hidden"></div>

      <!-- Modal -->
      <div id="modal" class="overflow-scroll absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 space-y-4 w-[80%] h-72 p-6 bg-white hidden">
        <h2 class="text-2xl text-center font-bold">Select Services</h2>

        <!-- Services -->
        <?php
          include "config/connection.php";

          $services = mysqli_query($conn, "SELECT * FROM services");

          while ($service = mysqli_fetch_array($services)) {
          ?>
            <div class="service flex items-center justify-between px-4 py-2 bg-[#E5E5E5] rounded-xl cursor-pointer" data-id="<?=$service['id']?>" data-name="<?=$service['name']?>" data-price="<?=$service['price']?>" data-unit="<?=$service['unit']?>">
              <div class="flex items-center gap-2">
                <div class="flex items-center justify-center w-12 h-12 bg-[#D7F7E8] rounded-lg">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3/4"><path d="M8.11547 14.2081C8.00236 14.2809 7.88681 14.3548 7.77104 14.4256C7.98453 16.573 9.79642 18.25 12 18.25C14.3472 18.25 16.25 16.3472 16.25 14L16.25 13.9945C16.1169 14.0184 15.9793 14.0397 15.8461 14.0603L15.8305 14.0627C15.6688 14.0878 15.5091 14.1125 15.3451 14.142C14.6442 14.2683 14.0781 14.2172 13.5869 14.036C13.1303 13.8675 12.786 13.6003 12.5321 13.4031L12.5084 13.3847C12.233 13.1711 12.0529 13.0377 11.83 12.9555C11.6273 12.8807 11.3371 12.832 10.857 12.9186C10.1533 13.0454 9.52387 13.3448 8.9424 13.688C8.69352 13.8348 8.46278 13.9839 8.23511 14.1309L8.11547 14.2081Z" fill="#13975C"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10ZM17.75 14C17.75 13.7807 17.7377 13.5644 17.7138 13.3515L17.7338 13.3378L17.643 12.8902C17.1259 10.2456 14.796 8.25 12 8.25C8.82436 8.25 6.25 10.8244 6.25 14C6.25 17.1756 8.82436 19.75 12 19.75C15.1756 19.75 17.75 17.1756 17.75 14ZM8 5.25C7.58579 5.25 7.25 5.58579 7.25 6C7.25 6.41421 7.58579 6.75 8 6.75H16C16.4142 6.75 16.75 6.41421 16.75 6C16.75 5.58579 16.4142 5.25 16 5.25H8Z" fill="#13975C"></path></svg>
                </div>
                <div>
                  <p><?=$service['name']?></p>
                  <p class="text-[#A5A5A5] text-xs">Rp <?=$service['price']?> / <?=$service['unit']?></p>
                </div>
              </div>
            </div>
          <?php
          }
        ?>
      </div>

      <!-- Confirmation Modal -->
      <div id="confirmationModal" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[80%] p-6 bg-white shadow-lg hidden">
        <h2 class="text-xl font-bold mb-4">Confirmation</h2>
        <p id="confirmName">Name: </p>
        <p id="confirmPhone">Phone: </p>
        <p id="confirmServices">Services: </p>
        <p id="confirmTotal" class="mt-4 font-bold">Total: </p>
        <div class="mt-4 flex justify-end gap-4">
          <button id="cancelConfirm" class="px-4 py-2 bg-gray-300 hover:bg-gray-300/90 rounded transation-all duration-200">Cancel</button>
          <button id="confirmOrder" class="px-4 py-2 bg-[#13975C] hover:bg-[#13975C]/90 text-white rounded transition-all duration-200">Confirm</button>
        </div>
      </div>

      <!-- Navbar -->
      <?php
        include "components/navbar.php";
      ?>
    </div>

    <script>
      const servicesArray = [];
      const servicesContainer = document.getElementById('services');
      const submitButton = document.getElementById('submitBtn');
      const orderForm = document.getElementById('orderForm');
      const confirmationModal = document.getElementById('confirmationModal');
      const confirmName = document.getElementById('confirmName');
      const confirmPhone = document.getElementById('confirmPhone');
      const confirmServices = document.getElementById('confirmServices');
      const confirmTotal = document.getElementById('confirmTotal');
      const cancelConfirm = document.getElementById('cancelConfirm');
      const confirmOrder = document.getElementById('confirmOrder');
      const blur = document.getElementById('blur');

      document.getElementById('add').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
        blur.classList.remove('hidden');
      });

      blur.addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
        confirmationModal.classList.add('hidden');
        blur.classList.add('hidden');
      });

      document.querySelectorAll('.service').forEach(function(serviceItem) {
        serviceItem.addEventListener('click', function() {
          const serviceId = serviceItem.getAttribute('data-id');
          const serviceName = serviceItem.getAttribute('data-name');
          const servicePrice = serviceItem.getAttribute('data-price');
          const serviceUnit = serviceItem.getAttribute('data-unit');

          addServiceCard(serviceId, serviceName, servicePrice, serviceUnit);
          document.getElementById('modal').classList.add('hidden');
          blur.classList.add('hidden');
        });
      });

      function addServiceCard(id, name, price, unit) {
        const serviceCard = document.createElement('div');
        serviceCard.className = 'flex items-center justify-between px-4 py-2 bg-[#E5E5E5] rounded-xl';
        serviceCard.innerHTML = `
          <div class="flex items-center gap-2">
            <div class="flex items-center justify-center w-12 h-12 bg-[#D7F7E8] rounded-lg">
              <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-3/4"><path d="M8.11547 14.2081C8.00236 14.2809 7.88681 14.3548 7.77104 14.4256C7.98453 16.573 9.79642 18.25 12 18.25C14.3472 18.25 16.25 16.3472 16.25 14L16.25 13.9945C16.1169 14.0184 15.9793 14.0397 15.8461 14.0603L15.8305 14.0627C15.6688 14.0878 15.5091 14.1125 15.3451 14.142C14.6442 14.2683 14.0781 14.2172 13.5869 14.036C13.1303 13.8675 12.786 13.6003 12.5321 13.4031L12.5084 13.3847C12.233 13.1711 12.0529 13.0377 11.83 12.9555C11.6273 12.8807 11.3371 12.832 10.857 12.9186C10.1533 13.0454 9.52387 13.3448 8.9424 13.688C8.69352 13.8348 8.46278 13.9839 8.23511 14.1309L8.11547 14.2081Z" fill="#13975C"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10ZM17.75 14C17.75 13.7807 17.7377 13.5644 17.7138 13.3515L17.7338 13.3378L17.643 12.8902C17.1259 10.2456 14.796 8.25 12 8.25C8.82436 8.25 6.25 10.8244 6.25 14C6.25 17.1756 8.82436 19.75 12 19.75C15.1756 19.75 17.75 17.1756 17.75 14ZM8 5.25C7.58579 5.25 7.25 5.58579 7.25 6C7.25 6.41421 7.58579 6.75 8 6.75H16C16.4142 6.75 16.75 6.41421 16.75 6C16.75 5.58579 16.4142 5.25 16 5.25H8Z" fill="#13975C"></path></svg>
            </div>
            <div>
              <p>${name}</p>
              <p class="text-[#A5A5A5] text-xs">Rp ${price} / ${unit}</p>
            </div>
          </div>
          <div>  
            <input type="hidden" name="services[]" value="${id}">
            <input type="number" name="amounts[]" placeholder="Amount" class="w-24 px-2 py-1 bg-[#E5E5E5] border-b-2 border-[#A5A5A5]">
            <button type="button" class="remove-service text-red-500" data-id="${id}">Cancel</button>
          </div>
        `;

        servicesContainer.appendChild(serviceCard);

        serviceCard.querySelector('.remove-service').addEventListener('click', function() {
          serviceCard.remove();
          toggleSubmitButton();
          removeServiceFromArray(id);
        });

        addServiceToArray(id, name, price, unit);
        toggleSubmitButton();
      }

      function addServiceToArray(id, name, price, unit) {
        servicesArray.push({ id: id, name: name, price: price, unit: unit });
      }

      function removeServiceFromArray(id) {
        const index = servicesArray.findIndex(service => service.id === id);
        if (index !== -1) {
          servicesArray.splice(index, 1);
        }
      }

      function toggleSubmitButton() {
        if (servicesContainer.children.length > 0) {
          submitButton.classList.remove('hidden');
        } else {
          submitButton.classList.add('hidden');
        }
      }

      submitButton.addEventListener('click', function(e) {
        e.preventDefault();
        showConfirmationModal();
      });

      function showConfirmationModal() {
        const name = document.querySelector('input[name="name"]').value;
        const phone = document.querySelector('input[name="phone"]').value;
        let servicesText = '';
        let total = 0;

        servicesArray.forEach((service, index) => {
          const amount = document.querySelectorAll('input[name="amounts[]"]')[index].value;
          total += service.price * amount;
          servicesText += `${index + 1}. ${service.name} ${amount} ${service.unit}<br>`;
        });

        confirmName.innerHTML = `Name: ${name}`;
        confirmPhone.innerHTML = `Phone: ${phone}`;
        confirmServices.innerHTML = `Services: <br>${servicesText}`;
        confirmTotal.innerHTML = `Total: Rp ${total}`;

        confirmationModal.classList.remove('hidden');
        blur.classList.remove('hidden');
      }

      cancelConfirm.addEventListener('click', function() {
        confirmationModal.classList.add('hidden');
        blur.classList.add('hidden');
      });

      confirmOrder.addEventListener('click', function() {
        orderForm.submit();
      });
    </script>
  </body>
</html>