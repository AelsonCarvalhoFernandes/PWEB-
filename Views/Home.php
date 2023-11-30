<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <title>Nozama - Loja</title>
    <link rel="stylesheet" href="./Static/css/header.css">
    <link rel="stylesheet" href="./Static/css/footer.css">
    <link rel="stylesheet" href="./Static/css/global.css">
    <link rel="stylesheet" href="./Static/css/home.css">
</head>
<body>

    <?php 
    if (isset($_SESSION['user'])) {
        include('./Views/Fragments/header.php');
    } else {
        include("./Views/Fragments/headerNotAuthenticad.php");
    }
    ?>
    

    <!--?php
    // Verificar se o usuário está autenticado
    if (isset($_SESSION['user'])) {
        // Acessar informações do usuário
        $userData = $_SESSION['user'];

        // Exibir informações do usuário
        echo "<h2>Perfil do Usuário</h2>";
        echo "<ul>";
        foreach ($userData as $key => $value) {
            echo "<li><strong>$key:</strong> $value</li>";
        }
        echo "</ul>";
    } else {
        // Se o usuário não estiver autenticado, redirecione ou exiba uma mensagem
        //header("Location: login.php");
        //exit();
    }
    ?-->



    <div class="pageStore">
        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>
        </div>

        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>
        </div>

        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>
        </div>

        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div>
                    <h2> Jogo 1</h2>
                    <h3> Ação</h3>
                    <span>R$ 10,99</span>
                </div>
            </div>
        </div>
    </div>

    <?php include('./Views/Fragments/footer.php'); ?>  
</body>
</html>