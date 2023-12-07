<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/login.css">
    <title>NZ - Login</title>
</head>

<body class="maxWidth">

    <form action="forgotPassword" method="POST">

        <h1 class="login">Esqueci a Senha</h1>

        <?php
            if (isset($Error)) {
                echo '<p style="color: red;">' . $Error . '</p>';
            }
        ?>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autofocus required>
        </div>

        <div>
            <label for="password">Senha Atual</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password">Nova Senha</label>
            <input type="password" name="newPassword" id="newPassword" required>
        </div>

        <div>
            <label for="password">Confirmar Nova Senha</label>
            <input type="password" name="confirmNewPassword" id="confirmNewPassword" required>
        </div>
        
        <br>
        <input type="submit">

        <br>
        <label class="centralize" for="">__________________________________________</label>

        <a href="/login">Retornar</a>
    </form>

</body>

</html>