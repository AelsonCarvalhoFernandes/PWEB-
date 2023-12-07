<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../Static/css/global.css">

    <link rel="stylesheet" href="../Static/css/register.css">
    <script src="../Static/js/Register.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NZ - Cadastro</title>
</head>

<body>

    <div class="centralize">
        <a href="/">
            <img class="img-logo" src="../../Static/img/Logo_Nozama_Dark.svg" alt="Nozama Games">
        </a>
    </div>

    <form class="formRegister maxWidth" action="register" method="post">

        <input type="hidden" name="money" id="money" value="0.00">

        <p class="error-message"></p>

        <h1>CADASTRO | Cliente</h1>
        <br>

        <input type="hidden" name="type" id="type" value="client">

        <label for="username" id="labelUsername">Username</label>
        <input name="username" type="text" id="username" autofocus required>
        <br>

        <label for="email">Email</label>
        <input name="email" type="email" id="email" required>
        <?php
            if (isset($Error)) {
                echo '<p style="color: red;">' . $Error . '</p>';
            }   
        ?>
        <br>

        <!-- Senha e Confirmar Senha -->
        <div class="containerLabels">
            <label for="password">Senha</label>
            <label for="password">Confirme a Senha</label>
        </div>

        <div class="containerPassword">
            <input name="password" id="password" type="password" required>
            <input name="confirm_password" id="confirm_password" type="password">
        </div>
        <p class="error-message" id="errorMessage"></p>

        <br>
        <div class="containerLabels">
            <label id="labelRg" for="rg">RG</label>
            <label id="labelCpf" for="cpf">CPF</label>
        </div>

        <div class="containeIdentity">
            <input name="rg" id="rg" type="text" oninput="formatRG()" onkeydown="clearField(event, this)"
                onkeypress="allowNumbersOnly(event)" minlength="13" maxlength="13" required>

            <input name="cpf" id="cpf" type="text" oninput="formatCPF()" onkeydown="clearField(event, this)"
                onkeypress="allowNumbersOnly(event)" minlength="14" maxlength=" 14" required>
        </div>

        <br>
        <label for="cellphone">Telefone</label>
        <input name="cellphone" id="cellphone" type="text" onkeypress="allowNumbersOnly(event)" maxlength="15" required>

        <br>
        <div class="checkUserVendedor">
            <input type="checkbox" id="checkVendedor" class="checkVendedor" value="vendedor"
                onchange="verifyCheckbox()">
            <label for="checkVendedor" class="labelVendedor">Criar conta como Vendedor</label>
        </div>

        <br>
        <button id="btnSubmit" name="btnSubmit" type="button" onclick="validationForm()">Salvar</button>
        
        <a href="/login">Já tenho uma conta</a>
    </form>
</body>

</html>