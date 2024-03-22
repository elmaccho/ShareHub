/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
*/
import './bootstrap';

import Swal from 'sweetalert2';
window.Swal = Swal;

import TypeIt from 'typeit';
window.TypeIt = TypeIt;

import ScrollMagic from 'scrollmagic'
window.ScrollMagic = ScrollMagic;

import Aos from 'aos';
window.Aos = Aos;
Aos.init();

import { CountUp } from 'countup.js';
window.CountUp = CountUp;

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

// document.addEventListener("DOMContentLoaded", function () {
//     new TypeIt('#typing1', {
//       startDelay: 200,
//       speed: 0,
//       cursorChar: "",
//     })
//     .type("<div class='dot-flashing'></div>", { delay: 2000 })
//     .delete(1)
//     .type("Our community is a place where passions meet opportunities and ideas take wings. Whether you're an expert in your field or just looking for inspiration, you'll find your place on ShareHub.")
//     .go();


//   new TypeIt('#typing2', {
//     startDelay: 2200,
//     speed: 0,
//     cursorChar: "",
//   })
//   .type("1 seconds ago")
//   .go();


//   new TypeIt('#typing3', {
//     startDelay: 2500,
//     speed: 20,
//     strings: "Join us today to share, inspire and make new, valuable connections!",
//     waitUntilVisible: true,
//   }).go();

//   setTimeout(() => {
//     document.querySelector('.input-btn').disabled = false
//   }, 4500);
// });
var aboutController = new ScrollMagic.Controller();

new ScrollMagic.Scene({
  triggerElement: '#about',
  triggerHook: 0.8,
  reverse: false
})
.on("enter", function () {
  new TypeIt('#typing1', {
    startDelay: 200,
    speed: 0,
    cursorChar: "",
  })
  .type("<div class='dot-flashing'></div>", { delay: 2000 })
  .delete(1)
  .type("Our community is a place where passions meet opportunities and ideas take wings. Whether you're an expert in your field or just looking for inspiration, you'll find your place on ShareHub.")
  .go();

  new TypeIt('#typing2', {
    startDelay: 2200,
    speed: 0,
    cursorChar: "",
  })
  .type("1 seconds ago")
  .go();


  new TypeIt('#typing3', {
    startDelay: 2500,
    speed: 20,
    strings: "Join us today to share, inspire and make new, valuable connections!",
    waitUntilVisible: true,
  }).go();

  setTimeout(() => {
    document.querySelector('.input-btn').disabled = false
  }, 4500);
})
.addTo(aboutController);

var popularCategoriesController = new ScrollMagic.Controller();

new ScrollMagic.Scene({
  triggerElement: '#popular-categories',
  triggerHook: 0.8,
  reverse: false
})
.on("enter", function () {
    var options = {
      duration: 3,
  };
    var postCountElements = document.querySelectorAll('.postCount');
      
    postCountElements.forEach(function(element) {
      var target = parseInt(element.getAttribute('data-target'));
      var countUp = new CountUp(element, target, options);
      countUp.start();
    });
})
.addTo(popularCategoriesController)

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