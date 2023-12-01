<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/perfil.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <script src="../Static/js/Perfil.js"></script>
    <title>NZ - Perfil</title>
</head>
<body>
     <?php include_once "Fragments/header.php"; ?>

    <form class="maxWidth containerProfileData" action="updateProfile" method="post">

        <?php 
            $row = mysqli_fetch_assoc($data);
        ?>

        <div class="align-horizontal">
            <h4>Tipo de Conta: </h4>
            <?php
                if ($row['type'] == 'vendedor') {
                    echo '<input type="text" name="type" class="type-user" id="typeAccountSeller" value="' . $row['type'] . '" required disabled>';
                } else {
                    echo '<input type="text" name="type" class="type-user" id="typeAccountClient" value="' . $row['type'] . '" required disabled>';
                }
             ?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>Username: </h3>
            <?php echo '<input type="text" name="username" class="username" value="' . $row['username'] .'" required disabled>';?>
        </div>
        
        <br>
        <div class="align-horizontal">
            <h3>Email: </h3>
            <?php echo '<input type="email" name="email" class="email" value="' . $row['email'] .'" required disabled>';?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>RG: </h3>

            <?php

                if ($row['type'] == 'vendedor') {
                    echo '<input type="text" name="cnpj_rg" class="rg" value="' . $row['cnpj_rg'] .'" required disabled>';
                } else {
                    echo '<input type="text" class="rg" value="' . $row['rg'] .'" required disabled>';
                } 
            ?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>CPF: </h3>

            <?php

                if ($row['type'] == 'vendedor') {
                    echo '<input type="text" name="cnpj_cpf" class="cpf" value="'. $row['cnpj_cpf'] .'" required disabled>';
                } else {
                    echo '<input type="text" class="cpf" value="'. $row['cpf'] .'" required disabled';
                } 
            ?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>Telefone: </h3>
            <?php echo '<input type="text" name="telefone" class="telefone" value="'. $row['telefone'] .'" required disabled>';?>
        </div>
        
        <div class="containerButtons">        
            <button type="button" class="material-symbols-outlined btn btnEdit" id="button-openEdit" onclick="editProfile()">edit_square</button>
            <button type="button" class="material-symbols-outlined btn btnSave" id="button-saveEdit" onclick="saveEditProfile()">save</button>  
        </div>

    </form>
</body>
</html>