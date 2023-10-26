<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Nozama - Loja</title>
    <link rel="stylesheet" href="./Static/css/header.css">
    <link rel="stylesheet" href="./Static/css/footer.css">
    <link rel="stylesheet" href="./Static/css/store.css">
    <link rel="stylesheet" href="./Static/css/global.css">
    <script src="js.js"></script>
</head>
<body>
    <?php include('./Views/Components/header.php'); ?>
    
    <div>
        <h1>Login</h1>
        <div>
            <form method="" action="post">
                <div>
                    <label>Login</label>
                    <input type="email" id="email" placeholder="Email:">
                </div>
                <div>
                    <label>Senha</label>
                    <input type="password" id="email" placeholder="Senha:">
                    <a href="">Esqueceu a senha?</a>
                </div>
                <div>
                    <button>Entrar</button>
                    <label>Ou</label>
                    <button>Cadastre-se</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include('./Views/Components/footer.php'); ?>  
    

</body>
</html>