function Validation(event) {
    const service = document.querySelector('#service');
    const employee = document.querySelector('input[name="type"]:checked');
    const date = document.querySelector('input[name="date"]');
    const time = document.querySelector('input[name="time"]');

    if(service.value == 'choose' || employee.value.length == 0 || date.value.length == 0 || time.value.length == 0) {
        event.preventDefault();
    }
}

document.querySelector('form').addEventListener('submit', Validation);

function onEmployeeJson(json) {
    console.log('JSON nrws ricevuto');
    console.log(json);   

    const block = document.querySelector('#show');
    block.innerHTML = '';

    const label = document.createElement('label');
    label.htmlFor = 'employee';
    label.textContent = 'Impiegato: ';

    for(let item in json) {
        block.appendChild(label);
        
        const options = document.createElement('div');
        block.appendChild(options);
        options.id = "employee";

        const radiobox = document.createElement('input');
        const option_label = document.createElement('label');

        options.appendChild(radiobox);
        options.appendChild(option_label);

        radiobox.type = 'radio';
        radiobox.name = 'type';
        radiobox.value = json[item].nome + ' ' + json[item].cognome;
        option_label.textContent = json[item].nome + ' ' + json[item].cognome;
        
        if(item == 0) {
            radiobox.checked = "true";
        }
    }

    if(json.length !== 0) {
        const date_block = document.createElement('div');
        block.appendChild(date_block);
        date_block.classList.add("date");
        const label_input1 = document.createElement('label');
        const input1 = document.createElement('input');

        date_block.appendChild(label_input1);
        date_block.appendChild(input1);

        label_input1.htmlFor = 'date';
        label_input1.textContent = 'Data appuntamento: ';
        input1.type = 'date';
        input1.name = 'date';
        input1.id = 'date';
        const today = new Date();
        input1.min = today;

        const time_block = document.createElement('div');
        block.appendChild(time_block);
        time_block.classList.add("time");

        const label_input2 = document.createElement('label');
        const input2 = document.createElement('input');

        time_block.appendChild(label_input2);
        time_block.appendChild(input2);

        label_input2.htmlFor = 'time';
        label_input2.textContent = 'Ora appuntamento: ';
        input2.type = 'time';
        input2.name = 'time';
        input2.min = '08:30:00';
        input2.max = '19:30:00';

        const submit_block = document.createElement('div');
        block.appendChild(submit_block);

        const submit = document.createElement('input');
        submit_block.appendChild(submit);

        submit.classList.add('submit');
        submit.type = 'submit';
        submit.value = 'Prenota';
    } else {
        const message = document.createElement('p');
        block.appendChild(message);
        message.id = 'message';
        message.textContent = 'La tua filiale del centro benessere Quiet Wave non ha ancora questo dipartimento, scegli un altro servizio';

    }
}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

function showEmployee(event) {
    const option = event.currentTarget.value;
    console.log(option);

    fetch('new_appointment/employee/' + encodeURIComponent(option)).then(onResponse).then(onEmployeeJson);
}

document.querySelector("#service").addEventListener("change", showEmployee);
