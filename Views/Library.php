<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/library.css">
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

        <?php 

            if (!empty($dataProducts)) {
                
                $count = 0;

                echo '<div class="group-card">';
                foreach ($dataProducts as $product) {
                    echo '<button class="card">';
                    echo '<img src="' . $product['url_image'] .'" alt="Model Image" class="item ">';
                    echo '<div class="productDescription">';
                    echo '<h2>' . $product['nome'] .'</h2>';
                    echo '<div class="tag">';
                    echo '<h3>' . $product['categoria'] .'</h3>';
                    echo '<span>Adquirido</span>';
                    echo '</div>';
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







    
    <!--main class="maxWidth group-horizontal">

        <div class="titleInventory">
            <span class="material-symbols-outlined">
                inventory_2
            </span>
            <h1>
                Inventário
            </h1>
        </div>
        
        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="group-card">
            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2>Calado, Monstro</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2> As Aventuras de Poliana: O retorno de Hasgart</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>

            <div class="card">
                <img src="https://source.unsplash.com/random/250x250/?model" alt="Model Image" class="item ">
                <div class="productDescription">
                    <h2>Memes do Dia</h2>
                    <div class="tag">
                        <h3> Ação</h3>
                        <span>Adquirido</span>
                    </div>
                </div>
            </div>
        </div>

    </main-->



</body>

</html>