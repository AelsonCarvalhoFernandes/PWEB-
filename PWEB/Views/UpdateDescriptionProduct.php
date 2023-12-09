<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/updateDescription.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <script src="../Static/js/Product.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>NZ - Descrição</title>
</head>
<body>

    <?php include './Views/Fragments/header.php';?>

    <form class='maxWidth' id="fromDescriptionProduct" action="/product/edit" method="post">

        <?php
            $user = $_SESSION['user'];
            echo '<input type="hidden" name="idElementProduct" id="idElementProduct" value="'. $data['id'] .'">';

            if (!empty($data)) {
                
                echo '<div class="containerProduct">';
                echo '<div class="img">';
                echo '<img src="../' . $data['url_image'] . '" alt="Model Image">';
                echo '</div>';
                
                echo '<div class="description">';
                $inputName = '<input required name="name" class="titleProduct" value="'. $data['name'] .'"';
                if ($user['type']=='client') {
                    $inputName .= ' disabled="disabled"';
                }
                $inputName .= '>';
                echo $inputName;

                if ($user['type'] == 'seller') echo '<label>N$: <input required name="price" class="price" value="' . $data['price'] . '"></label>';

                if (isset($user)) {
                    
                    echo '<br>';

                    if ($dataSale != null && $user['type'] == "client"){
                        echo '<button id="btnEditPublication" class="disabled" disabled>';
                        echo '<i class="material-symbols-outlined">check_circle</i>Produto Adquirido';
                        echo '</button>';

                    } else {
                        echo '<button class="editPublication" onclick="editPublication()">';
                        echo '<i class="material-symbols-outlined">edit_note</i>Salvar Alteração';
                        echo '</button>';
                    }
                } else {
                    echo '<button class="acquire" onclick="alert(\'Você precisa estar logado para adquirir um produto.\')" disabled>';
                    echo '<i class="material-symbols-outlined">shopping_bag</i>Faça Login para Adquirir';
                    echo '</button>';
            }  
                echo '<br>';
                echo '<div class="group-space_beetween">';

                $inputCategory = '<label>Categoria: <input required name="category" class="category" value="' . $data['category'] . '"';
                if ($user['type']=='client') {
                    $inputCategory .= ' disabled="disabled"';
                }
                $inputCategory .= '></label>';
                echo $inputCategory;

                if ($user['type']=='seller') echo '<label>Quantidade: <input name="quantity" class="quantity" value="' . $data['quantity'] . '"></label>';
                echo '</div>';


                $inputQuantity = '<textArea required name="description" class="textDescription"';
                if ($user['type']=='client') {
                    $inputQuantity .= ' disabled="disabled"';
                }
                $inputQuantity .= '>' . $data['description'] . '</textArea>';
                echo $inputQuantity;

                echo '</div>';
                echo '</div>';

            } else {
                echo "<h2>Esse produto não está mais disponível.</h2>";
            }
            

        ?>
        
    </form>
</body>
</html>