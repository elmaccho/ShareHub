const toggleMenuBtn = document.querySelector('.toggleMenuBtn')
const navContent = document.querySelector('.nav-content')

const toggleMenu = (params) => {
    navContent.classList.toggle('toggle-active');
}

toggleMenuBtn.addEventListener('click', toggleMenu)