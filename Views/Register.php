<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NZ - Cadastro</title>
</head>
<body>

    <form class="maxWidth" action="register" method="post">

        <h1>CADASTRO</h1>
        <br>

        <label for="username">Username</label>
        <input name="username" type="text" autofocus>
        <br>

        <label for="email">Email</label>
        <input name="email" type="email" name="" id="">
        <br>

        <!-- Senha e Confirmar Senha -->
        <div class="containerPassword">
            <label for="password">Senha</label>
            <input name="password" type="password">

            <label for="password">Confirme a Senha</label>
            <input name="confirm_password" type="password">
        </div>

        <br>
        <div class="containeIdentity">
            <label for="rg">RG</label>
            <input name="rg" type="text">
            <br>
            <label for="cpf">CPF</label>
            <input name="cpf" type="text">
        </div>

        <br>
        <label for="telefone">Telefone</label>
        <input name="telefone" type="text">

        <br>
        <input type="submit" value="CADASTRAR">
    </form>
</body>
</html>