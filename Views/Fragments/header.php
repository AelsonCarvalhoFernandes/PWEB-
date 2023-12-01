<!DOCTYPE html>
<html lang="pt-br">
<body>

<header>
        <div class="logo">
        <a href="/" class="material-symbols-outlined button">
            home
        </a>
        </div>
        <div class="search">
            <input type="search" name="" id="">
            <span class="material-symbols-outlined">
                search
            </span>
        </div>
        <div class="profile">
        
            <a class="material-symbols-outlined button" href="/library">inventory_2</a>

            <?php if ($_SESSION['user']['type'] == 'vendedor'): ?>
                <a href="product/create" class="material-symbols-outlined button">add_box</a>

                <a class="material-symbols-outlined money button">payments</a>
            <?php endif; ?>


            <div class="dropdown">
                <button class="dropbtn material-symbols-outlined">account_circle</button>
                <div class="dropdown-content">
                    <a href="/perfil">Perfil</a>
                    <a href="/logout">Sair</a>
                </div>
            </div>

    </header>
    <div class="GradientBarrAnimation shadowBarrBotton"></div>
</body>
</html>