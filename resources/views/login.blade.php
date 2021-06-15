<html>
    <head>
        <title>Quiet Wave - Centro Benessere</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/login1.css") }}' />
        <script src='{{ url("js/login.js") }}' defer></script>
    </head>
    <body>
        <div id="head"></div>

        <div id="central_block">
            <h1>Bentornato dal Centro Benessere Quiet Wave!</h1>
            <p>Inserisci le tue credenziali e prenota un appuntamento in uno dei nostri centri.</p>

            @if($old_username)
                <div class='error'>Credenziali non valide</div>
            @endif

            <form name='login' method='post'>
                <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="username">
                    <div><label for='username'>Username</label></div>
                    <div><input type='text' name='username' id='username' value='{{ $old_username }}'></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' id='password'></div>
                </div>
                <div>
                    <input class="submit" type='submit' value="Accedi">
                </div>
                <div class="signup">Non hai un account? <a href='{{ url("signup") }}'>Iscriviti</a></div>
            </form>
        </div>

        <div id="foot"></div>
    </body>
</html>