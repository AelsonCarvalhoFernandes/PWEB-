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

        <div class="centralize">
            <a href="/">
                <img class="img-logo" src="../../Static/img/Logo_Nozama_Dark.svg" alt="Nozama Games">
            </a>
        </div>

        <h1 class="login">LOGIN</h1>

        <?php
            if (isset($Error)) {
                echo '<p style="color: red;">' . $Error . '</p>';
            }

            if (isset($Sucess)) {
                echo '<p style="color: cyan;">' . $Success . '</p>';
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

        <input type="submit" value="Acessar">

        <br>
        <label class="centralize" for="">_____________________ OU _____________________</label>

        <a href="/forgotPassword">Esqueci a Senha</a>
    </form>

    <div class="body centralize maxWidth">
        <a href="/register">Não tem uma conta? Cadastre-se</a>
    </div>

</body>

</html>