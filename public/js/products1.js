function onProductJson(json) {
    fetch("fetch_fav").then(onResponse).then(onFavJson);
    console.log("Response ricevuta");
    console.log(json);

    //creo la section che deve contenere i prodotti
    const article = document.querySelector('article');
    const block = document.createElement('section');
    article.appendChild(block);
    block.classList.add('product_grid');

    let i = 1;

    for(let item in json) {
    const p_block = document.querySelector('.product_grid');

    const container = document.createElement('div')
    p_block.appendChild(container);
    container.classList.add('container');
    container.dataset.productId = i++;

    const infopref = document.createElement('div');
    const product_img = document.createElement('img');
    const more_info = document.createElement('div');

    container.appendChild(infopref);
    container.appendChild(product_img);
    container.appendChild(more_info);

    infopref.classList.add('info_pref');
    product_img.classList.add('p_img');
    more_info.classList.add('properties');
    more_info.classList.add('hidden');

    //info_pref
    const info = document.createElement('div')
    const checkbox_img = document.createElement('img');

    infopref.appendChild(info);
    infopref.appendChild(checkbox_img);

    info.classList.add('info');
    checkbox_img.classList.add('checkbox');

    //info all'interno di info_pref
    const product_title = document.createElement('h1');
    const product_type = document.createElement('p');

    info.appendChild(product_title);
    info.appendChild(product_type);

    product_title.textContent = json[item].titolo;
    product_type.textContent = json[item].tipo;
    
    //checkbox all'interno di info_pref
    checkbox_img.src = 'images/empty_heart.jpg';

    checkbox_img.addEventListener("click", addFav);

    //product_img
    product_img.src = json[item].foto;

    //more_info
    const link = document.createElement('h1');
    const description = document.createElement('p');

    more_info.appendChild(link);
    more_info.appendChild(description);

    link.classList.add('learn_more');

    link.textContent = 'Scopri di più:';
    description.textContent = json[item].descrizione;

    link.addEventListener("click", ShowContent);
    }
}

function onCommentsJson(json) {
    console.log("Response ricevuta");
    console.log(json);

    const comments_section = document.querySelector("#comments");
    comments_section.innerHTML = "";

    const comm_title = document.createElement('h1');
    comments_section.appendChild(comm_title);
    comm_title.id = 'title_comments';
    comm_title.textContent = 'Commenti';
    

    if(json.length == 0) {
        const message = document.createElement('h1');
        comments_section.appendChild(message);
        message.id = "empty";
        message.textContent = "Nessuna recensione disponibile, sii il primo a commentare!";
    }

    let i = 1;

    for(let item in json) {
        const comment = document.createElement('div');
        comments_section.appendChild(comment);
        comment.classList.add('comment');
        comment.dataset.commentId = i;

        const comment_block = document.createElement('div');
        const nlikes = document.createElement('p');
        const like = document.createElement('img');        
        
        comment.appendChild(comment_block);
        comment.appendChild(nlikes);
        comment.appendChild(like);

        comment_block.classList.add('comment_text');
        like.classList.add('like');
        nlikes.classList.add('n_likes');
        
        fetch('fetch_likes/' + i).then(onResponse).then(onLikeJson);
        nlikes.textContent = json[item].nlikes + ' likes';

        i++;

        const username = document.createElement("h1");
        const time = document.createElement("p");
        const text = document.createElement("p");

        comment_block.appendChild(username);
        comment_block.appendChild(time);
        comment_block.appendChild(text);

        username.classList.add('username');
        time.classList.add('time');
        text.classList.add('text');

        username.textContent = json[item].username;
        time.textContent = json[item].giorno + ',  ' + json[item].ora;
        text.textContent = json[item].testo;
    }

    const new_comment = document.createElement('div');
    comments_section.appendChild(new_comment);
    new_comment.classList.add('new_comment');

    const title = document.createElement('label');
    new_comment.appendChild(title);
    title.htmlFor = 'new_comment';
    title.textContent = 'Scrivi un nuovo commento:';
    
    const new_text = document.createElement('textarea');
    new_comment.appendChild(new_text);
    new_text.name = 'new_comment';
    new_text.id = 'new_comment';
    new_text.rows = "6";

    const send = document.createElement('a');
    new_comment.appendChild(send);
    send.textContent = 'Invia';

    send.addEventListener("click", addComment);
}

//funzione aggiungi commenti
function check(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
}

function addComment() {
    const comment = document.querySelector('#new_comment').value;

    const today = new Date();

    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const yyyy = today.getFullYear();
    const date = yyyy + '-' + mm + '-' + dd;

    const h = check(today.getHours());
    const m = check(today.getMinutes());
    const s = check(today.getSeconds());
    const time = h + ":" + m + ":" + s;

    
    fetch("new_comment/" + comment + "&" + date + "&" + time).then(onResponse).then(onAddComment);
}

function onAddComment(json) {
    console.log(json);

    if(json.ok) {
        fetch("fetch_comments").then(onResponse).then(onCommentsJson);
    }
}

//funzione like commenti dell'username della sessione
function onLikeJson(json) {
    console.log(json);
    console.log(json[0]);
    const likes = document.querySelectorAll('.like');

    for(let like of likes) {
        if(json.ok) {
            if(like.parentNode.dataset.commentId == json[0]) {
                like.src = 'images/full_heart.jpg';

                like.addEventListener("click", unlikeComment);
            }
        } else if(!json.ok){
            if(like.parentNode.dataset.commentId == json[0]) {
                like.src = 'images/empty_heart.jpg';

                like.addEventListener("click", likeComment);
            }
        }
    }

}

//like e unlike commento
function likeComment(event) {
    const comment = event.currentTarget;
    comment.src = 'images/full_heart.jpg';

    comment.removeEventListener("click", likeComment);
    comment.addEventListener("click", unlikeComment);

    const id = comment.parentNode.dataset.commentId;
    fetch("like_comment/" + encodeURIComponent(id)).then(onResponse).then(updateLikes);
}

function unlikeComment(event) {
    const comment = event.currentTarget;
    comment.src = 'images/empty_heart.jpg';

    comment.removeEventListener("click", unlikeComment);
    comment.addEventListener("click", likeComment);

    const id = comment.parentNode.dataset.commentId;
    fetch("unlike_comment/" + encodeURIComponent(id)).then(onResponse).then(updateLikes);
}

function updateLikes(json) {
    console.log(json);
    if(json.ok) {
        const nlikes = document.querySelectorAll('.n_likes');

        for(let nlike of nlikes) {
            if(nlike.parentNode.dataset.commentId === json.commento) {
                nlike.textContent = json.nlikes + ' likes';
            }
        }
    }
}

function onResponse(response) {
    console.log("JSON ricevuto");
    return response.json();
}

function ShowContent(event) {
    const opened = event.currentTarget;
    
    opened.classList.remove('learn_more');
    opened.classList.add('learn_less');

    opened.parentNode.classList.remove('hidden');
    opened.parentNode.classList.add('open');

    const link = opened.parentNode.querySelector('h1');
    link.textContent = 'Scopri meno: ';

    opened.removeEventListener("click", ShowContent);
    opened.addEventListener("click", HideContent);
}

//funzione che nasconde le proprietà dei prodotti
function HideContent(event) {
    const closed = event.currentTarget;

    closed.classList.remove('learn_less');
    closed.classList.add('learn_more');

    closed.parentNode.classList.remove('open');
    closed.parentNode.classList.add('hidden');

    const link1 = closed.parentNode.querySelector('h1');
    link1.textContent = 'Scopri di più: ';

    closed.removeEventListener("click", HideContent);
    closed.addEventListener("click", ShowContent);
}

//funzione dei preferiti
function onFavJson(json) {
    console.log(json);
    let entries = json.length;

    //se il cliente ha preferiti
    if(entries != 0) {
        const fav_block = document.querySelector("#fav");
        fav_block.classList.remove('hidden');

        const all_products = document.querySelectorAll("div.container");

        for(let product of all_products) {
            let dataset = product.dataset.productId;
            for(var k = 0; k < entries; k++) {
                if (dataset == json[k][k].codice){
                    const fav_block = document.querySelector('#fav_grid');
            
                    const favcontainer = document.createElement('div')
                    fav_block.appendChild(favcontainer);
                    favcontainer.classList.add('fav_container');
                    favcontainer.dataset.productId = json[k][k].codice;
        
                    const favinfopref = document.createElement('div');
                    const favproduct_img = document.createElement('img');
        
                    favcontainer.appendChild(favinfopref);
                    favcontainer.appendChild(favproduct_img);
        
                    favinfopref.classList.add('fav_info_pref');
                    favproduct_img.classList.add('fav_img');
            
                    //fav_info_pref
                    const favinfo = document.createElement('div')
                    const favcheckbox_img = document.createElement('img');
        
                    favinfopref.appendChild(favinfo);
                    favinfopref.appendChild(favcheckbox_img);
        
                    favinfo.classList.add('fav_info');
                    favcheckbox_img.classList.add('fav_checkbox');
            
                    //fav_info all'interno di fav_info_pref
                    const fav_title = document.createElement('h1');
                    const fav_type = document.createElement('p');
            
                    favinfo.appendChild(fav_title);
                    favinfo.appendChild(fav_type);
            
                    fav_title.textContent = json[k][k].titolo;
                    fav_type.textContent = json[k][k].tipo;
                
                    //fav_checkbox all'interno di fav_info_pref
                    favcheckbox_img.src = 'images/full_heart.jpg';
            
                    //favproduct_img
                    favproduct_img.src = json[k][k].foto;
                                
                    const clicked = product.childNodes[0].childNodes[1];
                    clicked.classList.remove('checkbox');
                    favcheckbox_img.addEventListener("click", RemoveFav);
                }
            }
        }
    } else {
        const fav_block = document.querySelector("#fav");
        fav_block.classList.add('hidden');
    }
}

//
function addFav(event) {
    const product = event.currentTarget;
    const id_prod = product.parentNode.parentNode.dataset.productId;
    console.log(id_prod);

    fetch("like_product/" + encodeURIComponent(id_prod)).then(onResponse).then(updateFav);
}

function RemoveFav(event) {    
    const product = event.currentTarget;
    const id_prod = product.parentNode.parentNode.dataset.productId;
    console.log(id_prod);

    fetch("unlike_product/" + encodeURIComponent(id_prod)).then(onResponse).then(updateFav);
}

function updateFav(json) {
    console.log(json);

    if(json.remove) {
        const all_products = document.querySelectorAll("div.container");

        for(let product of all_products){
            if (product.dataset.productId === json.prodotto){
                product.childNodes[0].childNodes[1].classList.add("checkbox");
            }
        }

        const fav_block = document.querySelector("#fav_grid");
        fav_block.innerHTML = '';
        
        fetch("fetch_fav").then(onResponse).then(onFavJson);

    } else if(json.add) {
        const all_products = document.querySelectorAll("div.container");

        for(let product of all_products){
            if (product.dataset.productId === json.prodotto){
                product.childNodes[0].childNodes[1].classList.remove("checkbox");
            }
        }

        const fav_block = document.querySelector("#fav_grid");
        fav_block.innerHTML = '';
        
        fetch("fetch_fav").then(onResponse).then(onFavJson);
    }

}

//barra di ricerca
function FindProduct(event) {
    let searchbar = event.currentTarget;
    let search_input = searchbar.value.toUpperCase();
    let search_products = document.querySelectorAll('.container');

    for(i = 0; i < search_products.length; i++) {
        if(search_products[i].textContent.toUpperCase().indexOf(search_input) > -1) {
            search_products[i].style.display = "";
        } else {
            search_products[i].style.display = "none";
        }
    }
}

const input = document.querySelector('#search');
input.addEventListener('keyup', FindProduct);

fetch("fetch_products").then(onResponse).then(onProductJson);
fetch("fetch_comments").then(onResponse).then(onCommentsJson);
