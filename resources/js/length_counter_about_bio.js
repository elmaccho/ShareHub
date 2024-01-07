const aboutBio = document.querySelector('.about-bio');
const words = document.querySelector('.words');

words.textContent = aboutBio.value.length;

const lengthCounter = (params) => {
    words.textContent = aboutBio.value.length;
}

aboutBio.addEventListener('input', lengthCounter)