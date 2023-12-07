<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <script src="../Static/js/Profile.js"></script>
    <title>NZ - Perfil</title>
</head>
<body>
     <?php include_once "Fragments/header.php"; ?>

    <form class="maxWidth containerProfileData" id="profileData" action="updateProfile" method="post">

        <?php 
            $row = mysqli_fetch_assoc($data);
            $rowAddress = mysqli_fetch_assoc($dataAddress);

            if ($rowAddress == null) {
                $rowAddress = [
                    'cep' => '',
                    'street' => '',
                    'number' => '',
                    'neighborhood' => '',
                    'city' => '',
                    'state' => '',
                    'country' => '',
                ];
            }
        ?>

        <br>
        <br>
        <p>{ Dados da Conta }</p>
        
        <br>
        <br>
        <div class="align-horizontal">

            
            <?php
                echo '<h4>Tipo de Conta: </h4>';
                if ($row['type'] == 'seller') {
                    echo '<input type="text" name="type" class="type-user" id="typeAccountSeller" value="Vendedor" required disabled>';
                    
                    echo '<p>Saldo:</p>';
                    echo '<p class="moneyColor"> N$: '. $row['money'] .'</p>';

                } else {
                    echo '<input type="text" name="type" class="type-user" id="typeAccountClient" value="Cliente" required disabled>';
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
            <?php echo '<input type="text" name="rg" class="rg" value="' . $row['rg'] .'" required disabled>';?>
        
            <h3>CPF: </h3>
            <?php echo '<input type="text" name="cpf" class="cpf" value="'. $row['cpf'] .'" required disabled>';?>
        </div>
        
        <br>
        <br>
        <p>{ Outras Informações }</p>

        <br>
        <br>
        <div class="align-horizontal">
            <h3>CEP: </h3>
            <?php echo '<input type="text" name="cep" class="cep" value="'. $rowAddress['cep'] .'" required disabled>';?>
        
            <h3>Logradouro: </h3>
            <?php echo '<input type="text" name="street" class="street" value="'. $rowAddress['street'] .'" required disabled>';?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>Número: </h3>
            <?php echo '<input type="text" name="number" class="number" value="'. $rowAddress['number'] .'" required disabled>';?>

            <h3>Bairro: </h3>
            <?php echo '<input type="text" name="neighborhood" class="neighborhood" value="'. $rowAddress['neighborhood'] .'" required disabled>';?>
        </div>

        <br>
        <div class="align-horizontal">
        <h3>Cidade: </h3>
            <?php echo '<input type="text" name="city" class="city" value="'. $rowAddress['city'] .'" required disabled>';?>

            <h3>Estado: </h3>
            <?php echo '<input type="text" name="state" class="state" value="'. $rowAddress['state'] .'" required disabled>';?>

            <h3>País: </h3>
            <?php echo '<input type="text" name="country" class="country" value="'. $rowAddress['country'] .'" required disabled>';?>
        </div>

        <br>
        <div class="align-horizontal">
            <h3>Telefone: </h3>
            <?php echo '<input type="text" name="cellphone" class="telefone" value="'. $row['cellphone'] .'" required disabled>';?>
        </div>
        
        <div class="containerButtons">        
            <button type="button" class="material-symbols-outlined btn btnEdit" id="button-openEdit" onclick="editProfile()">edit_square</button>
            <button type="button" class="material-symbols-outlined btn btnSave" id="button-saveEdit" onclick="saveEditProfile()">save</button>  
        </div>

    </form>
</body>
</html>