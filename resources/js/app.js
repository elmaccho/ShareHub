/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
*/
import './bootstrap';

import Swal from 'sweetalert2';
window.Swal = Swal;

// import Alpine from 'alpinejs'
// window.Alpine = Alpine
// Alpine.start()

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// import './components/Example';

// PhotoSwipe
// import PhotoSwipeLightbox from 'photoswipe/lightbox';
// import 'photoswipe/style.css';

// const lightbox = new PhotoSwipeLightbox({
//   gallery: '#my-gallery',
//   children: 'a',
//   pswpModule: () => import('photoswipe')
// });
// lightbox.init();


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
window.addEventListener('settingsUpdated', (event) => {
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
    }
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
      location.reload();
    }
  });
});
window.addEventListener('popUpTimer', (event) => {
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
    }
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {

    }
  });
});
window.addEventListener('popUpTimerReload', (event) => {
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
    }
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
      location.reload();
    }
  });
});
window.addEventListener('popUpConfirm', (event) => {
  let data = event.detail;

  Swal.fire({
    title: data.title,
    text : data.text,
    icon: data.type,
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: data.confirmButton
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Deleted!",
        text: data.subtext,
        icon: "success"
      });

      window.Livewire.dispatch('remove');
    }
  });
});