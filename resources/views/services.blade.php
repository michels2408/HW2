<html>
    <head>
        <title>Quiet Wave - Centro Benessere</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/services.css") }}' />
        <script src='{{ url("js/services1.js") }}' defer></script>
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
                <strong>I NOSTRI SERVIZI</strong></br>
                <em>Scegli il relax</em>
            </h1>
        </header>
        
        <section>
            <div id="main">
                <h1>Scegli tra i nostri servizi quello più adatto a te</h1>
                <p>Ti presentiamo la nostra accurata selezione di servizi.</p>
            </div>
        </section>

        <article>
        </article>

        <section id="max_price">
            <h1>Trova i servizi che rientrano nel tuo budget</h1>
            <div id="budget_text">
                <label for='budget'>Budget (00.00):</label>
                <input type="text" name="budget">
                <a id="send_budget">Invia</a>
            </div>
            <div id="list"></div>
        </section>

        <div id="search">
            <h1>Sei indecisa sul tuo nuovo taglio? Consulta la nostra gallery!</h1>
            <form>
                <label><input type="radio" name="type" value="pixie">Pixie cut</label>
                <label><input type="radio" name="type" value="bob">Bob cut</label>
                <label><input type="radio" name="type" value="long">Long cut</label>
                <label><input type="radio" name="type" value="bangs">Frangia</label>
                <input class="submit" type='submit' value="Cerca">
            </form>

            <div id = "gallery">
            </div>

            <div id = "modal" class = "hidden">
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