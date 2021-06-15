function onJson(json) {
    console.log("Response ricevuta");
    console.log(json);

    const article = document.querySelector('article');

    const r_block = document.createElement('div');
    const m_block = document.createElement('div');
    const b_block = document.createElement('div');

    article.appendChild(r_block);
    article.appendChild(m_block);
    article.appendChild(b_block);

    r_block.classList.add('department');
    m_block.classList.add('department');
    b_block.classList.add('department');

    const r_title = document.createElement('h1');
    const m_title = document.createElement('h1');
    const b_title = document.createElement('h1');

    r_block.appendChild(r_title);
    m_block.appendChild(m_title);
    b_block.appendChild(b_title);

    r_title.textContent = "Roma";
    m_title.textContent = "Milano";
    b_title.textContent = "Bologna";

    const rome = document.createElement('div');
    const milan = document.createElement('div');
    const bologne = document.createElement('div'); 

    r_block.appendChild(rome);
    m_block.appendChild(milan);
    b_block.appendChild(bologne);

    rome.classList.add('department_text');
    milan.classList.add('department_text');
    bologne.classList.add('department_text');

    for(let item in json) {
        if(json[item].citta == "Roma") {
            const name_surname = document.createElement('h2');
            const department = document.createElement('p');
            const dob = document.createElement('p');

            rome.appendChild(name_surname);
            rome.appendChild(department);
            rome.appendChild(dob);

            name_surname.textContent = json[item].nome + ' ' + json[item].cognome;
            department.textContent = "Dipartimento: " + json[item].dip_nome;
            dob.textContent = "Data di nascita: " + json[item].data_nascita;
        } else if(json[item].citta == "Milano") {
            const name_surname = document.createElement('h2');
            const department = document.createElement('p');
            const dob = document.createElement('p');

            milan.appendChild(name_surname);
            milan.appendChild(department);
            milan.appendChild(dob);

            name_surname.textContent = json[item].nome + ' ' + json[item].cognome;
            department.textContent = "Dipartimento: " + json[item].dip_nome;
            dob.textContent = "Data di nascita: " + json[item].data_nascita;   
        } else if(json[item].citta == "Bologna") {
            const name_surname = document.createElement('h2');
            const department = document.createElement('p');
            const dob = document.createElement('p');

            bologne.appendChild(name_surname);
            bologne.appendChild(department);
            bologne.appendChild(dob);

            name_surname.textContent = json[item].nome + ' ' + json[item].cognome;
            department.textContent = "Dipartimento: " + json[item].dip_nome;
            dob.textContent = "Data di nascita: " + json[item].data_nascita;
        }
    }

}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

fetch("about_employee").then(onResponse).then(onJson);