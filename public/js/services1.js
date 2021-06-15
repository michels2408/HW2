let j = 0;

function onJson(json) {
    console.log("Response ricevuta");
    console.log(json);
    
    const article = document.querySelector('article');
    
    const s_block = document.createElement('div');
    const b_block = document.createElement('div');
    const h_block = document.createElement('div');

    article.appendChild(s_block);
    article.appendChild(b_block);
    article.appendChild(h_block);

    s_block.classList.add('department');
    b_block.classList.add('department');
    h_block.classList.add('department');

    s_block.dataset.departmendId = j++;
    b_block.dataset.departmendId = j++;
    h_block.dataset.departmendId = j++;
    
    const s_name = document.createElement('h1');
    const b_name = document.createElement('h1');
    const h_name = document.createElement('h1');

    const s1_block = document.createElement('div');
    const b1_block = document.createElement('div');
    const h1_block = document.createElement('div');

    
    s_block.appendChild(s_name);
    b_block.appendChild(b_name);
    h_block.appendChild(h_name);

    s_block.appendChild(s1_block);
    b_block.appendChild(b1_block);
    h_block.appendChild(h1_block);

    s1_block.classList.add('services');
    b1_block.classList.add('services');
    h1_block.classList.add('services');
    
    //titolo
    s_name.textContent = json[0].dipartimento;
    b_name.textContent = json[3].dipartimento;
    h_name.textContent = json[6].dipartimento;
    
    //blocco servizi
    const s_image = document.createElement('img');
    const b_image = document.createElement('img');
    const h_image = document.createElement('img');

    const s_list = document.createElement('div');
    const b_list = document.createElement('div');
    const h_list = document.createElement('div');
    
    s1_block.appendChild(s_image);
    b1_block.appendChild(b_image);
    h1_block.appendChild(h_image);

    s1_block.appendChild(s_list);
    b1_block.appendChild(b_list);
    h1_block.appendChild(h_list);
    
    s_image.classList.add('block_image');
    b_image.classList.add('block_image');
    h_image.classList.add('block_image');

    s_list.classList.add('list');
    b_list.classList.add('list');
    h_list.classList.add('list');

    //immagine dentro il blocco servizi
    s_image.src = json[0].foto;
    b_image.src = json[3].foto;
    h_image.src = json[6].foto;

    //listino dentro blocco servizi
    for(let item in json){
        if(json[item].dipartimento == "SKIN CARE") {
            const service = document.createElement('p');

            s_list.appendChild(service);
    
            service.textContent = json[item].trattamento + " - €" + json[item].prezzo + ".00";
        } else if(json[item].dipartimento == "BODY CARE") {
            const service = document.createElement('p');

            b_list.appendChild(service);
    
            service.textContent = json[item].trattamento + " - €" + json[item].prezzo + ".00"; 
        } else if(json[item].dipartimento == "HAIR CARE") {
            const service = document.createElement('p');

            h_list.appendChild(service);
    
            service.textContent = json[item].trattamento + " - €" + json[item].prezzo + ".00";
        }
    }
}

function onMaxPriceJson(json) {
    console.log(json);
    const block = document.querySelector('#list');
    block.innerHTML= " ";

    if(json.length == 0) {
        const message = document.createElement('p');
        block.appendChild(message);
        message.id = "no_service";
        message.textContent = "Nessun servizio individuato";
    } else {
        for(let item in json) {
            const service = document.createElement('div');
            block.appendChild(service);
            service.classList.add('in_budget');
            
            const name = document.createElement('p');
            const price = document.createElement('p');

            service.appendChild(name);
            service.appendChild(price);

            name.textContent = json[item].trattamento;
            price.textContent = '€' + json[item].prezzo + '.00';
        }
    }
}

function maxPrice() {
    const budget = document.querySelector('#budget_text input').value;

    fetch("search_inbudget/" + budget).then(onResponse).then(onMaxPriceJson);
}

function onPhotosJson(json) {
    console.log('JSON ricevuto');
    console.log(json);

    const gallery = document.querySelector('#gallery');
    gallery.innerHTML = '';

    if(json.length == 0) {
      const errore = document.createElement("h1"); 
      const messaggio = document.createTextNode("Nessun risultato!"); 
      errore.appendChild(messaggio); 
      board.appendChild(errore);
    }

    for(let item in json) {
        const image = document.createElement('img');
        gallery.appendChild(image);
        image.classList.add('image');

        image.src = json[item].url;

        image.addEventListener('click', OpenModal);
    }
}

function search(event) {
    const form = document.querySelector("form");
    const type = form.type.value;
    fetch("search_photos/" + type).then(onResponse).then(onPhotosJson);
    
    event.preventDefault();
}

function OpenModal(event) {
    const modal = document.querySelector('#modal');
    modal.classList.remove('hidden');

    const image = document.createElement('img');
    modal.appendChild(image);
    image.id = 'view_image';

	image.src = event.currentTarget.src;

    document.body.classList.add('no-scroll');
}

function CloseModal(event) {
    const modal = event.currentTarget;
    modal.classList.add('hidden');

    modal.innerHTML = '';

    document.body.classList.remove('no-scroll');
}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

fetch("fetch_services").then(onResponse).then(onJson);

document.querySelector('form').addEventListener('submit', search);
document.querySelector('#send_budget').addEventListener('click', maxPrice);
document.querySelector('#modal').addEventListener('click', CloseModal);