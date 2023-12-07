<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/library.css">
    <link rel="stylesheet" href="../Static/css/home.css">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <title>NZ - Biblioteca</title>
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
        <input type="hidden" name="idElementProd" id="idElement">

        <div class="titleInventory">
            <span class="material-symbols-outlined">
                inventory_2
            </span>
            <h1>
                Inventário
            </h1>
        </div>

        <br>
        <br>
            
        <?php 
            if (isset($dataProducts) && count($dataProducts) > 0) {
                
                $count = 0;

                echo '<div class="group-card">';
                foreach ($dataProducts as $product) {
                    echo '<button class="card">';
                    echo '<img src="' . $product['url_image'] .'" alt="Model Image" class="item ">';
                    echo '<div class="infoCard">';
                    echo '<h2>' . $product['name'] .'</h2>';
                    //echo '<div class="tag">';
                    echo '<h3>' . $product['category'] .'</h3>';

                    if ($_SESSION['user']['type'] == 'seller') {
                        echo '<span class="statusPosted">Publicado</span>';
                    } else {
                        echo '<span class="statusBuy">Adquirido</span>';
                    }
                   // echo '</div>';
                    echo '</div>';
                    echo '</button>';
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

</body>

</html>