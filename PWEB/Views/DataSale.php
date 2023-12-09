<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <link rel="stylesheet" href="./Static/css/header.css">
    <link rel="stylesheet" href="./Static/css/global.css">
    <link rel="stylesheet" href="./Static/css/table.css">
    <script src="./Static/js/Home.js"></script>

    <title>Nozama - Vendas</title>
</head>
<body>

    <?php 
    if (isset($_SESSION['user'])) {
        include('./Views/Fragments/header.php');
    } else {
        include("./Views/Fragments/headerNotAuthenticad.php");
    }
    ?>

    <form class="maxWidth" action="">

        <table>
            <caption>SEUS PRODUTOS VENDIDOS</caption>
            <thead>
                <tr>
                    <th>ID Produto</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade Disponível</th>
                    <th>Quantidade Vendida</th>
                    <th>Preço Total Produto Vendido</th>
                </tr>
            </thead>
            <tbody> 
            
                <?php 
                $totalPriceSum = 0;
                if ($dataSale != null) {
                    
                    foreach($dataSale as $sale) {
                    echo '<tr>';
                        echo '<td>'.$sale['id_product'].'</td>';
                        echo '<td>' . $sale['name'] . '</td>';
                        echo '<td>'. $sale['quantity'] .'</td>';
                        echo '<td>'. $sale['total_product'] .'</td>';

                        $money = $sale['total_price'];
                        $formattedMoney = number_format((float)$money, 2, ',', '.');

                        echo '<td class="align-right">'. $formattedMoney .'</td>';

                        $totalPriceSum += $money;

                    echo '</tr>';
                    }

                    echo '<tr>';
                    echo '<td class="same-th-Static align-right" colspan="4"><strong>TOTAL</strong></td>';
                    echo '<td class="same-th-Static align-right"><strong>'.number_format($totalPriceSum, 2, ',', '.').'</strong></td>';
                    echo '</tr>';
                } else {
                    echo '<tr>';
                    echo '<td class="same-th-Static align-center" colspan="5">Nenhum produto vendido</td>';
                    echo '</tr>';
                }
                ?> 
            </tbody>
        </table>

    </form>


    

</body>
</html>