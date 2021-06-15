<html>
    <head>
        <title>Quiet Wave - Centro Benessere</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/news1.css") }}' />
        <script src='{{ url("js/news1.js") }}' defer></script>
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
                <strong>NEWS</strong></br>
                <em>Scopri le ultime novità</em>
            </h1>
        </header>
        
        <section>
            <div id="main">
                <h1>Tieniti aggiornato con la nostra sezione notizie</h1>
                <p>Scopri con noi le ultime notizie nel mondo del benessere.</p>
            </div>
        </section>

        <div id="search">
            <form>
                <label><input type="radio" name="type" value="hair_removal">Depilazione</label>
                <label><input type="radio" name="type" value="face_mask">Maschere viso</label>
                <label><input type="radio" name="type" value="face_cleaning">Pulizia del viso</label>
                <input class="submit" type='submit' value="Cerca">
            </form>

            <div id = "board">
            </div>
        </div>
            
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
    </body>
</html>