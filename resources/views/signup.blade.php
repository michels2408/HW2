<html>
    <head>
        <title>Quiet Wave - Centro Benessere</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{ url("css/signup1.css") }}' />
        <script src='{{ url("js/signup.js") }}' defer></script>
    </head>
    <body>
        <div id="head"></div>

        <div id="central_block">
            <h1>Benvenuto!</h1>
            <p>Unisciti alla nostra community, inserisci le tue credenziali.</p>

            <form name='signup' method='post'>
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
                <div class="branch">
                    <div><label for='branch'>Filiale:</label></div>
                    <input type='radio' name='branch' value='Roma'>Roma
                    <input type='radio' name='branch' value='Milano'>Milano
                    <input type='radio' name='branch' value='bologna'>Bologna
                </div>
                <div class="name">
                    <div><label for='name'>Nome:</label></div>
                    <div><input type='text' name='name' id='name'></div>
                </div>
                <div class="surname">
                    <div><label for='surname'>Cognome:</label></div>
                    <div><input type='text' name='surname' id='surname'></div>
                </div>
                <div class="dob">
                    <div><label for='dob'>Data di nascita:</label></div>
                    <div><input type='date' name='dob' id='dob' value='2003-01-01' min='1921-01-01' max= '2003-01-01'></div>
                </div>
                <div class="cf">
                    <span class="hidden">Errore, formato codice fiscale non supportato!</span>
                    <div><label for='cf'>Codice fiscale:</label></div>
                    <div><input type='text' name='cf' id='cf'></div>
                </div>
                <div class="city">
                    <div><label for='city'>Città di residenza:</label></div>
                    <div><input type='text' name='city' id='city'></div>
                </div>
                <div class="username">
                    <span class="hidden">Errore, username già in uso!</span>
                    <div><label for='username'>Username:</label></div>
                    <div><input type='text' name='username' id='username'></div>
                </div>
                <div class="password">
                    <span class="hidden">Errore, la password deve avere tra gli 8 e i 15 caratteri!</span>
                    <div><label for='password'>Password (compresa tra 8 e 15 caratteri):</label></div>
                    <div><input type='password' name='password' id='password'></div>
                </div>
                <div class="confirm_password">
                    <span class="hidden">Errore, la password non coincide!</span>
                    <div><label for='confirm_password'>Conferma password:</label></div>
                    <div><input type='password' name='confirm_password' id='confirm_password'></div>
                </div>
                <div>
                    <input class="submit" type='submit' value="Registrati">
                </div>
                <div class="signup">Sei già registrato? <a href='{{ url("login") }}'>Accedi</a></div>
            </form>
        </div>

        <div id="foot"></div>
    </body>
</html>