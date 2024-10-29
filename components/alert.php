<?php
if (isset($_GET['alert'])) {
  $alertType = $_GET['alert'];
  if ($alertType == 'success') {
    echo '
    <div id="alert" role="alert" class="absolute top-10 right-1/2 translate-x-1/2 px-4 py-2 bg-white rounded-xl border border-green-600">
      <div class="flex items-center gap-2">
        <span class="text-green-600">
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        </span>
        <strong class="block text-gray-900 font-medium">Success</strong>
      </div>
    </div>';
  } elseif ($alertType == 'failed') {
    echo '
    <div id="alert" role="alert" class="absolute top-10 right-1/2 translate-x-1/2 px-4 py-2 bg-white rounded-xl border border-red-600">
      <div class="flex items-center gap-2">
        <span class="text-red-600">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path id="error-circle" d="M32.085,56.058c6.165,-0.059 12.268,-2.619 16.657,-6.966c5.213,-5.164 7.897,-12.803 6.961,-20.096c-1.605,-12.499 -11.855,-20.98 -23.772,-20.98c-9.053,0 -17.853,5.677 -21.713,13.909c-2.955,6.302 -2.96,13.911 0,20.225c3.832,8.174 12.488,13.821 21.559,13.908c0.103,0.001 0.205,0.001 0.308,0Zm-0.282,-4.003c-9.208,-0.089 -17.799,-7.227 -19.508,-16.378c-1.204,-6.452 1.07,-13.433 5.805,-18.015c5.53,-5.35 14.22,-7.143 21.445,-4.11c6.466,2.714 11.304,9.014 12.196,15.955c0.764,5.949 -1.366,12.184 -5.551,16.48c-3.672,3.767 -8.82,6.016 -14.131,6.068c-0.085,0 -0.171,0 -0.256,0Zm-12.382,-10.29l9.734,-9.734l-9.744,-9.744l2.804,-2.803l9.744,9.744l10.078,-10.078l2.808,2.807l-10.078,10.079l10.098,10.098l-2.803,2.804l-10.099,-10.099l-9.734,9.734l-2.808,-2.808Z" /></svg>
        </span>
        <strong class="block text-gray-900 font-medium">Failed</strong>
      </div>
    </div>';
  }
}
?>