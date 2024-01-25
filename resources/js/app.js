/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import Swal from 'sweetalert2';
window.Swal = Swal;

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';


window.addEventListener('alreadyBanned', (event) => {
    let data = event.detail;

    // Swal.fire({
    //     position: data.position,
    //     icon: data.type,
    //     title: data.title,
    //     showConfirmButton: false,
    //     timer: 3000
    //   });


      let timerInterval;
Swal.fire({
title: data.title,
  icon: data.type,
  timer: 2000,
  position: data.position,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    location.reload();
  }
});
});
