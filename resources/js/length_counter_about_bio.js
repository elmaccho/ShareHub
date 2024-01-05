const aboutBio = document.querySelector('.about-bio');
const words = document.querySelector('.words');

const lengthCounter = (params) => {
    words.textContent = aboutBio.value.length;
}

aboutBio.addEventListener('input', lengthCounter)