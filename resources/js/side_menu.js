const openSideMenu = document.querySelector('.open-side-menu');
const closeSideMenu = document.querySelector('.close-side-menu');
const sideMenu = document.querySelector('.side-menu')

const toggleSideMenu = () => {
    sideMenu.classList.toggle('sm-active')
}

const checkOutsideClick = (e) => {
    if(!sideMenu.contains(e.target) && !openSideMenu.contains(e.target) && !closeSideMenu.contains(e.target)){
        sideMenu.classList.remove('sm-active')
    }
}

closeSideMenu.addEventListener('click', toggleSideMenu)
openSideMenu.addEventListener('click', toggleSideMenu)
document.addEventListener('click', checkOutsideClick)