<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/descriptionProduct.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <script src="../Static/js/Product.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>NZ - Descrição</title>
</head>
<body>

    <?php 
        if (isset($_SESSION['user'])) {
            include './Views/Fragments/header.php';
        } else {
            include './Views/Fragments/headerNotAuthenticad.php';
        }
    ?>

    <form class='maxWidth' id="fromDescriptionProduct" action="product" method="post">

        <?php
            echo '<input type="hidden" name="idElementProduct" id="idElementProduct" value="'. $data['id'] .'">';
            echo '<input type="hidden" name="inputQuant" id="inputQuantValue" value="' . $data['quantity'] . '">';
            echo '<input type="text" name="inputMoney" id="inputMoney" value="' . $data['price'] . '">';

            if (!empty($data)) {
                
                echo '<div class="containerProduct">';
                echo '<div class="img">';
                echo '<img src="../' . $data['url_image'] . '" alt="Model Image">';
                echo '</div>';

                echo '<div class="description">';
                echo '<h1 class="titleProduct">';
                echo $data['name'];
                echo '</h1>';
                echo '<h3> PREÇO: N$: ' . $data['price'] . '</h3>';

                if (isset($_SESSION['user'])) {
                    
                    echo '<br>';

                    if (($dataSale != null &&
                        $_SESSION['user']['type'] == "client") && 
                        $dataSale['id_product'] == $data['id'] && 
                        $dataSale['id_client'] == $dataClient['id']) {

                        echo '<button class="disabled" disabled>';
                        echo '<i class="material-symbols-outlined">shopping_bag</i>Você já possui esse produto';
                        echo '</button>';

                    } else {

                        if ($data['quantity'] > 0 && $_SESSION['user']['type'] == "client") {
                            echo '<button class="acquire" onclick="confirmBuy()">';
                            echo '<i class="material-symbols-outlined">shopping_bag</i>Adquirir';
                            echo '</button>';

                        } else if ($data['quantity'] < 1) {
                            echo '<button class="disabled" disabled>';
                            echo '<i class="material-symbols-outlined">shopping_bag</i>Produto Indisponível';
                            echo '</button>';

                        } else if ($_SESSION['user']['type'] == "seller") {
                                echo '<button class="disabled" disabled>';
                                echo '<i class="material-symbols-outlined">shopping_bag</i>Você não pode adquirir um produto sendo vendedor';
                                echo '</button>';
                            }
                        }
                    } else {
                        echo '<button class="acquire" onclick="alert(\'Você precisa estar logado para adquirir um produto.\')" disabled>';
                        echo '<i class="material-symbols-outlined">shopping_bag</i>Faça Login para Adquirir';
                        echo '</button>';
                }
                
                echo '<br>';
                echo '<div class="group-space_beetween">';
                echo '<p>CATEGORIA: ' . $data['category'] . '</p>';
                echo '<p>QUANTIDADE: ' . $data['quantity'] . '</p>';
                echo '</div>';

                echo '<p class="textDescription">' . $data['description'] . '</p>';
                echo '</div>';
                echo '</div>';

            } else {
                echo "<h2>Esse produto não está mais disponível.</h2>";
            }
            

        ?>
        
    </form>
</body>
</html>