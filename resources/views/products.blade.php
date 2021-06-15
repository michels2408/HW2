<html>
    <head>
        <title>Quiet Wave - I nostri prodotti</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/products1.css") }}' />
        <script src='{{ url("js/products1.js") }}' defer></script>
    </head>  
    <body>
        <header>
            <div id ="overlay"></div>
            <nav>
                <div id="links">
                    <a href='{{ url("home") }}'>Home</a>
                    <a href='{{ url("about") }}'>About</a>
                    <a href='{{ url("services") }}'>Servizi</a>
                    <a href='{{ url("news") }}'>News</a>
                    <a href='{{ url("contacts") }}'>Contattaci</a>
                    <a id="logout" href='{{ url("logout") }}'>Logout<a>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
            
            <img src="images/resized_logo.jpg" />
            <h1>
                <strong>I NOSTRI PRODOTTI</strong></br>
                <em>Trova quelli adatti a te</em>
            </h1>
        </header>

        <section>
            <div id='text'>
                <h1>I nostri prodotti</h1>
                <p>I nostri prodotti per la cura dei tuoi capelli sono biologici, senza parabeni, senza solfati e cruelty-free!</p>
                <p>Seleziona i tuoi preferiti e vieni a provarli nella nostra filiale di Milano, a breve anche a Roma e Bologna</p>
            </div>
        </section>

        <section id='fav' class='hidden'>
            <h1>Preferiti: </h1>
            <div id='fav_grid'></div>
        </section>

        <h2>Cerca tra i prodotti:</h2>
        <input type ='text' id='search'>

        <article>
        </article>

        <section id='comments'>
        </section>
        
    </body>

    <footer>
        <div id="details">
            <div id="luogo">
                <h1>Trova il salone più vicino a te</h1>
                <p>Roma</p>
                <p>Milano</p>
                <p>Bologna</p>
            </div>

            <div id="ora">
                <h1>Orari di apertura</h1>
                <p>Martedì 08.30-12.30 / 14.30-19.00</p>
                <p>Mercoledì 08.30-12.30 / 14.30-19.00</p>
                <p>Giovedì 08.30-12.30 / 14.30-19.00</p>
                <p>Venerdì 08.30-19.00</p>
                <p>Sabato 08.30-17.30</p>
            </div>

            <div id="covid">
                <h1>Annuncio normative COVID-19</h1>
                <p>Il centro benessere Quiet Wave ci tiene alla salute dei suoi clienti, per cui informiamo la gentile clientela che il centro segue le normative di prevenzione al COVID-19 fornite dallo Stato. Inoltre, saranno forniti mascherina e gel igienizzante all'ingresso a coloro che non ne sono forniti.</p>
            </div>
        </div>
    
        <div id="firma">
            <h1>Michela Lucia Saraceno</h1>
            <p>Matricola: O46002296</p>
        </div>
    </footer>
</html>