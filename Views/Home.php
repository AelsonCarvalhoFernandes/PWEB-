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
        <input type="hidden" name="idCardProduct" id="idElement">

        <?php 
            if (!empty($data['products'])) {
                $count = 0;

                echo '<div class="group-card">';
                foreach ($data['products'] as $product) {
                    echo '<button class="card" onclick="openDescriptionProduct(' . $product["id"] . ')">';
                    echo '<img src="' . $product['url_image'] . '" alt="Imagem do Produto" class="item">';
                    echo '<div class="infoCard">';
                    echo '<h2>' . $product['name'] . '</h2>';
                    echo '<h3> TAG: ' . $product['category'] . '</h3>';
                    echo '<span>R$ ' . $product['price'] . '</span>';
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
                echo '<br> <br> <br>';
                echo "Nenhum produto disponível no momento.";
            }
        ?>
    </form>

</body>
</html>