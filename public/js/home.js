function onModal() {
    fetch('appointment').then(onResponse).then(OpenModal);
}

function OpenModal(json) {
    console.log(json);
    const results = json; 

    const modal = document.querySelector('#modal');
    modal.classList.remove('hidden');

    modal.innerHTML = '';

    const white_block = document.createElement('div');
    modal.appendChild(white_block);
    white_block.id = "white";

    if(results.length == 0) {
        const message = document.createElement('h1');
        white_block.appendChild(message);
        message.id = "no_appointment";
        message.textContent = "Nessun appuntamento!"
    }

    let i = 1;

    for(result of results) {
        const app_block = document.createElement('div');
        white_block.appendChild(app_block);
        app_block.id = "appointment";

        const n_app = document.createElement('h1');
        const branch = document.createElement('p');
        const service = document.createElement('p');
        const date = document.createElement('p');
        const time = document.createElement('p');
        const employee = document.createElement('p');

        app_block.appendChild(n_app);
        app_block.appendChild(branch);
        app_block.appendChild(service);
        app_block.appendChild(date);
        app_block.appendChild(time);
        app_block.appendChild(employee);

        n_app.textContent = "Appuntamento " + i;
        branch.textContent = "Centro: " + result.centro;
        service.textContent = "Trattamento: " + result.trattamento;
        date.textContent = "Data: " + result.data;
        time.textContent = "Ora: " + result.ora;
        employee.textContent = "Impiegato: " + result.nome_imp + " " + result.cognome_imp;

        i++;
    }

    const close = document.createElement('p');
    white_block.appendChild(close);
    close.id = "close_button";
    close.textContent = "Chiudi";

    document.body.classList.add('no-scroll');

    close.addEventListener("click", CloseModal);
}

function CloseModal(event) {
    const modal = document.querySelector("#modal");
    modal.classList.add("hidden");

    document.body.classList.remove('no-scroll');
}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

const modal = document.querySelector("#view");
modal.addEventListener("click", onModal);