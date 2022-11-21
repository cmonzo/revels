<?php
session_start();
if (isset($_SESSION['usuario']['registro']) && $_SESSION['usuario']['registro'] == 'correcto'){
    header('Location:revel.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVELS</title>
</head>
<body>
<?php
    include_once('inc/header.inc.php');
    ?>
</body>
</html>