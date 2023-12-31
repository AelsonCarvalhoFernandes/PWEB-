<!DOCTYPE html>
<html lang="pt-br">
<body>

<header>
        <div class="logo">
            <a class="centralize" href="/">
                <img class="img-logo" src="../../Static/img/Logo_Nozama.svg" alt="Nozama Games">
            </a>
        </div>
        
        <div class="search">
            <!--input type="search" name="" id="">
            <span class="material-symbols-outlined">
                search
            </span-->
        </div>
        <div class="profile">
        
            <div class="nameAndIcon">
                <a class="material-symbols-outlined button" href="/library">inventory_2</a>
                <label class="labelIcon" for="iconLibrary">INVENTÁRIO</label>
            </div>

            <?php if ($_SESSION['user']['type'] == 'seller'): ?>
                <div class="nameAndIcon">
                    <a href="/product/create" id="iconPublication" class="material-symbols-outlined button">add_box</a>
                    <label class="labelIcon" for="iconPublication">PUBLICAÇÃO</label>
                </div>

                <div class="nameAndIcon">
                    <a href="/dataSale" id="iconDataSale" class="material-symbols-outlined button">bar_chart</a>
                    <label class="labelIcon" for="iconDataSale">VENDAS</label>
                </div>

                <a class="material-symbols-outlined money button">
                    <img class="iconMoney" src="../../Static/img/zonama_money.svg" alt="Zonama Money">
                    <?php
                        $money = $_SESSION['user']['money'];
                        $formattedMoney = number_format((float)$money, 2, ',', '.');
                        
                        echo '<label class="btnMoney">'.$formattedMoney .'</label>';
                    ?>
                </a>
            <?php endif; ?>


            <div class="dropdown">
                <button class="dropbtn material-symbols-outlined">account_circle</button>
                <div class="dropdown-content">
                    <a href="/profile">Perfil</a>
                    <a href="/logout">Sair</a>
                </div>
            </div>

    </header>
    <div class="GradientBarrAnimation shadowBarrBotton"></div>
</body>
</html>