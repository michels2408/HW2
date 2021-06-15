function onNewsJson(json) {
    console.log('JSON nrws ricevuto');
    console.log(json);

    const board = document.querySelector('#board');
    board.innerHTML = '';

    if(json.length == 0) {
      const errore = document.createElement("h1"); 
      const messaggio = document.createTextNode("Nessun risultato!"); 
      errore.appendChild(messaggio); 
      board.appendChild(errore);
    }

    for(let item in json) {
        const board = document.querySelector('#board');
        
        const news_block = document.createElement('div');
        board.appendChild(news_block);
        news_block.classList.add('news_block')

        const title = document.createElement('h1');
        const article = document.createElement('p');
        const button = document.createElement('a');

        news_block.appendChild(title);
        news_block.appendChild(article);
        news_block.appendChild(button);

        button.classList.add('view');

        title.textContent = json[item].title;
        article.textContent = json[item].article;
        button.href = json[item].url;
        button.textContent = "Continua a leggere";
    }
}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

function search(event) {
    const form = document.querySelector("form");
    const stringa = form.type.value;
    fetch("search_news/" + stringa).then(onResponse).then(onNewsJson);
    
    event.preventDefault();
}

const form = document.querySelector('form');
form.addEventListener('submit', search);