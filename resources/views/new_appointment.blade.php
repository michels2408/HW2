<html>
    <head>
        <title>Quiet Wave - Centro Benessere</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/new_appointment1.css") }}' />
        <script src='{{ url("js/new_appointment.js") }}' defer></script>
    </head>  
    <body>
        <div id="head"></div>

        <div id="central_block">
            <h1>Prenota un nuovo appuntamento</h1>
            <p>Riempi il form per prenotare un nuovo appuntamento!</p>

            <form name='new_appointment' method='post'>
                <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="service">
                    <p>Servizio:</p>
                    <select name="service" id="service">
                        <option value="choose">Seleziona un servizio</option>
                        <option value="Maschera">Maschera</option>
                        <option value="Depilazione viso">Depilazione viso</option>
                        <option value="Pulizia viso">Pulizia viso</option>
                        <option value="Massaggio">Massaggio</option>
                        <option value="Depilazione corpo">Depilazione corpo</option>
                        <option value="Laser">Laser</option>
                        <option value="Taglio">Taglio</option>
                        <option value="Colore">Colore</option>
                        <option value="Piega">Piega</option>
                    </select>
                </div>

                <?php
                    if(isset($err)) {
                        echo "<span>Il centro benessere non lavora durante il weekend, scegli un altro giorno!</span>";
                    }
                ?>

                <div id="show"></div>

                <a href='{{ url("home") }}'>Annulla prenotazione</a>
            </form>
        </div>

        <div id="foot"></div>
    </body>
</html>