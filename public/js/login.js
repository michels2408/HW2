function Validation(event) {
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');

    let error = true;
    if(username.value.length == 0) {
        error = false;
    }

    if(password.value.length == 0) {
        error = false;
    }

    if(!error) {
        event.preventDefault();
    }
}

document.querySelector('form').addEventListener('submit', Validation);

function Empty(event) {
    const input = event.currentTarget;

    if(input.value.length == 0) {
        input.classList.add('empty');
    } else {
        input.classList.remove('empty');
    }
}

document.querySelector('input[type="text"]').addEventListener('blur', Empty);
document.querySelector('input[type="password"]').addEventListener('blur', Empty);