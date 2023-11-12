import './bootstrap';

let csrfToken = document.querySelector('meta[name="csrf-token"]').content;
let chatBody = document.querySelector('.chat__body');

window.onload = function () {
    setupChat();
}

function setupChat() {
    document.querySelector('.chat__form').addEventListener('submit', (evt) => {
        evt.preventDefault();
        let formData = new FormData(evt.target);
        const xhttp = new XMLHttpRequest();

        xhttp.onloadend = function () {
            if (xhttp.status == 200) {
                console.log('success');
            } else {
                xhttp.abort();
                console.log('error');
            }
        }

        xhttp.open('POST', '/messages/store', true);
        xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(new URLSearchParams(formData));
    });
}

window.Echo.channel('chat')
    .listen('.message.created', (data) => {
        chatBody.innerHTML += `<p>${data.message.body}</p>`
    });
