<?php
session_start();
require_once('base datos/conexion.php');
if  (isset($_POST['usuario'])){
    $conectar = conectarBBDD();
    $encriptado = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        if ($conectar == null){
            echo '<p> No se ha podido conectar a la base de datos</p>';
        } else {
           try {
            $consulta =$conectar->prepare('INSERT INTO users (usuario,contrasenya,email) VALUES (?,?,?);');
            $consulta->bindParam(1, $_POST['usuario']);
            $consulta->bindParam(2, $encriptado);
            $consulta->bindParam(3, $_POST['email']);
                        
            $consulta->execute();
            unset($conectar);
            unset($consulta);
        } catch (PDOException $e) {
            echo '<p>Error al insertar usuario</p>';
        }
            }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    include_once('inc/header.inc.php');
    ?>
    <main>
    <div class= "form">
            <p>REGISTRO</p>
          <form action="#" method="post" enctype="multipart/form-data">
            
            usuario: <input type="text" name="usuario" id="usuario"><br>
            email: <input type="text" name="email" id="email"><br>
            contraseña: <input type="password" name="pass" id="pass"><br>
            
            
            
            <input type="submit" value="log in" style="border: 3px solid black">
          </form>
        </div>
    </main>
    <footer></footer>
</body>
</html>