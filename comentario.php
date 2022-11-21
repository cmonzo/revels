<?php
session_start();
require_once('base datos/conexion.php');
if ($_SESSION['usuario']['revel'][$_GET['revelid']] != $_GET['revelid']){
    header('Location:revel.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('inc/header.inc.php');
    ?>

    <main><div class="coments">
        <?php
        if ($_SESSION['usuario']['registro'] == 'correcto'){
            $conectar = conectarBBDD();
            if ($conectar == null){
                echo '<p> No se ha podido conectar a la base de datos</p>';
            } else {
                
                try{
                    $resultado =$conectar->prepare('SELECT id,texto,fecha from comments where revelid=? and userid=?;');
                    $resultado->bindParam(1,$_GET['revelid']);
                    $resultado->bindParam(2,$_SESSION['usuario']['id']);
                    $resultado->execute();
                    echo '<p class="respuesta">' . $_SESSION['usuario']['comentario'] . '<br>';
                    foreach ($resultado->fetchAll() as $producto){
                         echo $producto["texto"] . '<br>' . $producto["fecha"] . '<br><a href="comentario.php?accion=borrar&id=' . $producto["id"] . '">Eliminar comentario</a>';
                        
                    }
                echo '</p>';
                }catch (PDOException $e) {
                    echo '<p>Error al comprobar </p>';
                }
                unset($resultado);
                unset($conectar);
            }
        }
        ?>

    </div></main>
    
</body>
</html>