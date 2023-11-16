<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/publication.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <title>NZ - Publicação</title>
</head>
<body>
    <?php include_once "Fragments/Header.php"; ?>
    
    <form class="maxWidth" action="" method="post">
        <div class="alignHorizontal">
            <div class="containerLeft">
                <input  type="text" placeholder="Título" autofocus>

                <div class="containerFile">
                    <label for="file" class="material-symbols-outlined">upload_file</label>
                    <input id="file" type="file" class="fileInput">
                </div>
            </div>
                
            <div class="containerRight">
                <input type="text" placeholder="R$: 0,00">
                <textArea placeholder="Descrição..."></textArea>
            </div>
        </div>
        <input type="submit" value="Publicar" class="publication" name="publication" id="publication">
    </form>
</body>
</html>