<?php
    session_start();
    require_once('base datos/conexion.php');
    if (!isset($_SESSION['usuario'])){
        header('Location:index.php');
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

    <main></main>
    <div class="revels">
        <?php
        if ($_SESSION['usuario']['registro'] == 'correcto'){
            $conectar = conectarBBDD();
            if ($conectar == null){
                echo '<p> No se ha podido conectar a la base de datos</p>';
            } else {
                
                try{
                    $resultado =$conectar->prepare('SELECT id,texto,fecha from revels where userid=?;');
                    $resultado->bindParam(1,$_SESSION['usuario']['id']);
                    $resultado->execute();
                    
                    foreach ($resultado->fetchAll() as $producto){
                        $_SESSION['usuario']['revel'][$producto['id']] = $producto['id'];
                        $_SESSION['usuario']['comentario'] = $producto['texto'];
                        echo '<p> <a href="comentario.php?revelid=' .$producto["id"]  . '">' . $producto["texto"] . ' ' . $producto["fecha"] . '</a></p>';
                        
                    }
                
                }catch (PDOException $e) {
                    echo '<p>Error al comprobar </p>';
                }
                unset($resultado);
                unset($conectar);
            }
        }
        ?>

    </div>
</body>
</html>