/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import Swal from 'sweetalert2';
window.Swal = Swal;

import './bootstrap';

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';


window.addEventListener('alreadyBanned', (event) => {
    let data = event.detail;
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
window.addEventListener('reportedPopup', (event) => {
  let data = event.detail;
    let timerInterval;
Swal.fire({
title: data.title,
icon: data.type,
timer: 1800,
width: 400,
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
window.addEventListener('reportedRejectedPopup', (event) => {
  let data = event.detail;
  let timerInterval;

  Swal.fire({
    title: data.title,
    icon: data.type,
    timer: 1000,
    width: 400,
    position: data.position,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
    },
    didClose: () => {  // Dodajemy obsługę zdarzenia didClose
      location.reload();
    }
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
      location.reload();
    }
  });
});
