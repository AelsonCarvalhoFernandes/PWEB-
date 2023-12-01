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
            if (!empty($data)) {
                
                echo '<div class="containerProduct">';
                echo '<div class="img">';
                echo '<img src="../' . $data['url_image'] . '" alt="Model Image">';
                echo '</div>';

                echo '<div class="description">';
                echo '<h1 class="titleProduct">';
                echo $data['nome'];
                echo '</h1>';
                echo '<h2> Preço: R$: ' . $data['preco'] . '</h2>';

                if (isset($_SESSION['user'])) {

                    if (isset($dataVenda['id_produto']) && $dataVenda['id_produto'] == $data['id'] && $dataVenda['id_cliente'] == $_SESSION['user']['id']) {
                        echo '<button class="acquire" disabled>';
                        echo '<i class="material-symbols-outlined">shopping_bag</i>Você já possui esse produto';
                        echo '</button>';

                    } else {
                        echo '<button class="acquire" onclick="confirmBuy()">';
                        echo '<i class="material-symbols-outlined">shopping_bag</i>Adquirir';
                        echo '</button>';
                    }
                    
                } else {
                    echo '<button class="acquire" onclick="alert(\'Você precisa estar logado para adquirir um produto.\')" disabled>';
                    echo '<i class="material-symbols-outlined">shopping_bag</i>Faça Login para Adquirir';
                    echo '</button>';
                }
                
                
                echo '<p class="textDescription">' . $data['descricao'] . '</p>';
                echo '</div>';
                echo '</div>';

            } else {
                echo "<h2>Nenhum produto disponível.</h2>";
            }
            

        ?>
        
    </form>
</body>
</html>