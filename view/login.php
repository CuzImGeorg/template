<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <form action="index.php" method="post" name="login">
            <fieldset style="width: 100px;">
            <legend>Login:</legend>

            <p>
                <label for="nick">NickName:*</label> <br>
                <input type="text" size="30" name="nick" id="nick" maxlength="50" required/> <br>

                <label for="nachname">Password:*</label> <br>
                <input type="password" size="30" name="password" id="password" maxlength="50" required/> <br>

            </p>
            </fieldset>
            <br>
            <br>
            <button type="reset">Zurücksetzen</button>
            <button type="submit">Senden</button>
        </form>

        <button style="margin-top: 10px; "><a href="index.php?aktion=reg" style="color: #8b8686">Registriren</a></button>
    </body>

</html>