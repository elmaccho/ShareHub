const inputBtn = document.querySelector('.input-btn')
const textArea = document.querySelector('#typing3')
const sendMessageHere = document.querySelector('.send-message-here')

const sendMessage = () => {
    textArea.value = ''

    inputBtn.disabled = true

    const htmlContent = `
    <span>
        <div class="card card-right">
            <p>
                Join us today to share, inspire and make new, valuable connections!
            </p>
        </div>
        <span class="created-at-text">now</span>
    </span>
`;

sendMessageHere.insertAdjacentHTML('beforeend', htmlContent);
}

inputBtn.addEventListener('click', sendMessage)


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
