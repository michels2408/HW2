function prevent(event) {
    event.preventDefault();
}

function Validation(event) {
    const branch = document.querySelector('input[name="branch"]:checked');
    const name = document.querySelector('#name');
    const surname = document.querySelector('#surname');
    const dob = document.querySelector('#dob');
    const cf = document.querySelector('#cf');
    const city = document.querySelector('#city');
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');
    const confirm_password = document.querySelector('#confirm_password');

    if(branch.value.length == null || name.value.length == 0 || surname.value.length == 0 || dob.value.length == 0
    || cf.value.length == 0 || city.value.length == 0 || username.value.length == 0 || password.value.length == 0
    || confirm_password.value.length == 0) {
        event.preventDefault();
    }
}

document.querySelector('form').addEventListener('submit', Validation);

function checkCF(event) {
    const input = event.currentTarget;
    const cf_warning = document.querySelector(".cf span");

    if(input.value.length != 16) {
        cf_warning.classList.remove("hidden");

        document.querySelector('form').addEventListener('submit', prevent);
    } else {
        cf_warning.classList.add("hidden");

        document.querySelector('form').removeEventListener('submit', prevent);
    }

    if(input.value === "") {
        cf_warning.classList.add('hidden');
    }
}

function onJsonUsername(json) {
    console.log(json);
    const un_warning = document.querySelector(".username span");

    if(!json.exists) {
        un_warning.classList.add("hidden");

        document.querySelector('form').removeEventListener('submit', prevent);
    } else {
        un_warning.classList.remove("hidden");
        un_warning.textContent = 'Username già utilizzato.';

        document.querySelector('form').addEventListener('submit', prevent);
    }

}

function onResponse(response) {
    return response.json();
}

function checkUsername(event) {
    const input = event.currentTarget;
    const un_warning = document.querySelector(".username span");

    if(!/^[a-zA-Z0-9_-]{1,15}$/.test(input.value)) {
        un_warning.classList.remove("hidden");
        un_warning.textContent = "Errore, l'username deve contenere fino a 15 caratteri.";

        document.querySelector('form').addEventListener('submit', prevent);
    } else {
        fetch('signup/username/' + encodeURIComponent(input.value)).then(onResponse).then(onJsonUsername);
    }

    if(input.value === "") {
        un_warning.classList.add('hidden');
    }
}

function checkPassword(event) {
    const input = event.currentTarget;
    const pw_warning = document.querySelector(".password span");

    if(input.value.length < 8 || input.value.length > 15) {
        pw_warning.classList.remove("hidden");

        document.querySelector('form').addEventListener('submit', prevent);
    } else {
        pw_warning.classList.add("hidden");

        document.querySelector('form').removeEventListener('submit', prevent);
    }

    if(input.value === "") {
        pw_warning.classList.add('hidden');
    }
}

function checkConfirmPassword(event) {
    const input = event.currentTarget;
    const password = document.querySelector(".password input").value
    const cpw_warning = document.querySelector(".confirm_password span");

    if(input.value !== password) {
        cpw_warning.classList.remove("hidden");

        document.querySelector('form').addEventListener('submit', prevent);
    } else {
        cpw_warning.classList.add("hidden");

        document.querySelector('form').removeEventListener('submit', prevent);
    }

    if(input.value === "") {
        cpw_warning.classList.add('hidden');
    }
}

document.querySelector(".cf input").addEventListener("keyup", checkCF);
document.querySelector(".username input").addEventListener("keyup", checkUsername);
document.querySelector(".password input").addEventListener("keyup", checkPassword);
document.querySelector(".confirm_password input").addEventListener("keyup", checkConfirmPassword);

