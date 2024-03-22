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