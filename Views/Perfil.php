<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NZ - Perfil</title>
</head>
<body>
    <?php 
        $row = mysqli_fetch_assoc($data);
        echo '<p>' . $row['username'] . '</p>';
        echo '<p>' . $row['email'] . '</p>';
    ?>
</body>
</html>