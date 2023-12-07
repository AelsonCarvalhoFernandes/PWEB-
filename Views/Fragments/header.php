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
                    <a href="product/create" id="iconPublication" class="material-symbols-outlined button">add_box</a>
                    <label class="labelIcon" for="iconPublication">PUBLICAÇÃO</label>
                </div>

                <a class="material-symbols-outlined money button">payments</a>
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