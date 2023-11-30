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

    <form action="login" method="POST">

        <h1 class="login">LOGIN</h1>

        <?php
            // Verifica se há uma mensagem de erro definida
            if (isset($Error)) {
                echo '<p style="color: red;">' . $Error . '</p>';
            }
        ?>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" autofocus required>
        </div>

        <div>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required>
        </div>

        <input type="submit">

        <a href="/register">Ainda não tenho uma conta</a>

    </form>

</body>

</html>