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
    <script src="./Static/js/Home.js"></script>
</head>
<body>

    <?php 
    if (isset($_SESSION['user'])) {
        include('./Views/Fragments/header.php');
    } else {
        include("./Views/Fragments/headerNotAuthenticad.php");
    }
    ?>


    <form class="maxWidth" id="productForm" action="/product" method="get">
        <input type="hidden" name="idElement" id="idElement">

        <?php 
            if (!empty($data['products'])) {
                $count = 0;

                echo '<div class="group-card">';
                foreach ($data['products'] as $product) {
                    echo '<button class="card" onclick="openDescriptionProduct(' . $product["id"] . ')">';
                    echo '<img src="' . $product['url_image'] . '" alt="Imagem do Produto" class="item">';
                    echo '<div>';
                    echo '<h2>' . $product['nome'] . '</h2>';
                    echo '<h3> TAG: ' . $product['categoria'] . '</h3>';
                    echo '<span>R$ ' . $product['preco'] . '</span>';
                    echo '</div>';
                    echo '</button>';
                    echo '<br>';
                    $count++;

                    if ($count % 3 == 0) {
                        echo '</div>';
                        echo '<div class="group-card">';
                    }
                }
                echo '</div>';
                
            } else {
                echo "Nenhum produto disponível.";
            }
        ?>
    </form>












    <!--form class="maxWidth" id="productForm" action="/product" method="post"></form>
        <input type="hidden" name="idElement" id="idElement">
        
        <?php /*
            if (!empty($data['products'])) {
                $count = 0;

                echo '<div class="group-card">';
                foreach ($data['products'] as $product) {
                    echo '<button class="card" onclick="openDescriptionProduct(' . $product["id"] . ')">';
                    echo '<img src="' . $product['url_image'] . '" alt="Imagem do Produto" class="item">';
                    echo '<div>';
                    echo '<h2>' . $product['nome'] . '</h2>';
                    echo '<h3> TAG: ' . $product['categoria'] . '</h3>';
                    echo '<span>R$ ' . $product['preco'] . '</span>';
                    echo '</div>';
                    echo '</button>';
                    echo '<br>';
                    $count++;

                    if ($count%3==0) {
                        echo '</div>';
                        echo '<div class="group-card">';
                    }
                }
                echo '</div>';
                
            } else {
                echo "Nenhum produto disponível.";
            }
        */?>
    </form-->




        




    <!--?php
        if (!empty($data['products'])) {

            foreach ($data['products'] as $product) {
                echo '<button class="card onclick="openDescriptionProduct('.$product["id"].')">';
                    echo '<img src="'. $product['url_image'] . '" alt="Model Image" class="item ">';
                    echo '<div>';
                        echo '<h2>' . $product['nome'] . '</h2>';
                        echo '<h3> TAG: ' . $product['categoria'] . '</h3>';
                        echo '<span>R$ '. $product['preco'] . '</span>';
                    echo '</div>';
                echo '</button>';
                echo '<br>';
            }

        } else {
            echo "Nenhum produto disponível.";
        }
    ?-->


    <!--div class="pageStore">
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
    </div-->

</body>
</html>