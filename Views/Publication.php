<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Static/css/global.css">
    <link rel="stylesheet" href="../Static/css/header.css">
    <link rel="stylesheet" href="../Static/css/publication.css">
    <script src="../Static/js/Product.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100,0,200" />
    <title>NZ - Publicação</title>
</head>
<body>

    <?php include_once "Fragments/Header.php"; ?>
    
    <form class="formProduct maxWidth" action="create" method="post" enctype="multipart/form-data">

        <div class="alignHorizontal">
            <div class="containerLeft">
                <input type="text" name="title" id="title" placeholder="Título" required autofocus>

                <div class="containerFile">
                    <label for="file" class="material-symbols-outlined">upload_file</label>
                    <input id="file" name="file" type="file" accept="image/*" class="fileInput" required>
                </div>
                
                <input type="text" name="category" id="category" placeholder="Tag" required>
                    
            </div>
                
            <div class="containerRight">
                <div class="group-space_beetween align-horizontal">
                    <label for="price">N$: <input type="text" name="price" id="price" oninput="formatarPreco(this)" value="0,00" required></label>
                    <input type="text" onkeypress="allowNumbersOnly(event)" name="quantity" id="quantity" placeholder="Quantidade" required>
                </div>
                <textArea name="description" placeholder="Descrição..." required></textArea>
            </div>
        </div>
        <input type="button" onclick="validateFormFile()" value="Publicar" class="publication" name="publication" id="publication">
    </form>
</body>
</html>