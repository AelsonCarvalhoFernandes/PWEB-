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
                    <label>Usename</label>
                    <input type="text" id="username" placeholder="Usename">
                    <label>Last Name</label>
                    <input type="text" id="last_name" placeholder="Last Name">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" id="email" placeholder="email:">
                    <label>telefone</label>
                    <input type="number" id="telefone" placeholder="telefone:">
                </div>

                <div>
                    <label>Logrdouro</label>
                    <input type="text" id="Logrdouro" placeholder="Logrdouro">
                    <label>Uf</label>
                    <input type="text" id="Uf" placeholder="Uf">
                </div>

                <div>
                    <label>Usename</label>
                    <input type="email" id="username" placeholder="Usename">
                </div>

                <div>
                    <label>Cidade</label>
                    <input type="text" id="Cidade" placeholder="Cidade">
                </div>

                <div>
                    <label>País</label>
                    <input type="text" id="pais" placeholder="País">
                    <label>Num Residencia</label>
                    <input type="number" id="num" placeholder="Num Residencia<">
                </div>

                <div>
                    <label>Senha</label>
                    <input type="password" id="senha" placeholder="Senha">
                </div>
                <div>
                    <label>Confirmar Senha</label>
                    <input type="password" id="confirmar" placeholder="Confirmar Senha">
                </div>
                <select name="opcoes">
                    <option value="opcao">Escolha</option>
                    <option value="vendedor">Vendedor</option>
                    <option value="cliente">Cliente</option>
                </select>
               
                <div>
                    <button>Cadastrar</button>
                    <label>Ou</label>
                
                </div>
            </form>
        </div>
    </div>
    
    <?php include('./Views/Components/footer.php'); ?>  
    

</body>
</html>