<?php
session_start();
require_once('/revels/base datos/conexion.php');
if (isset($_POST['usuario'])){
    $conectar = conectarBBDD();
        if ($conectar == null){
            echo '<p> No se ha podido conectar a la base de datos</p>';
        } else {
            try{
            $resultado =$conectar->prepare('SELECT contrasenya from users where usuario=? or email=?;');
            $resultado->bindParam(1,$_POST['usuario']);
            $resultado->bindParam(2,$_POST['usuario']);
            $resultado->execute();
            
            foreach ($resultado->fetchAll() as $producto){
               /*$passEncriptada = password_hash($_POST['pass'],PASSWORD_DEFAULT);*/
               if (password_verify($_POST['pass'],$producto[0])){
                    $_SESSION['usuario']['registro'] = 'correcto';
                    $_SESSION['usuario']['nombre'] = $_POST['usuario'];
                    $_SESSION['usuario']['contrasenya'] = $producto['contrasenya'];
               }

            }
            
            }catch (PDOException $e) {
                echo '<p>Error al comprobar </p>';
            }
            unset($resultado);
            unset($conectar);
        } 
           
}

?>
<?php
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
    include_once('header.inc.php');
    ?>
    <main>
    <div class= "form">
            <p>LOGIN</p>
          <form action="#" method="post" enctype="multipart/form-data">
            
            usuario: <input type="text" name="usuario" id="usuario"><br>
            contraseña: <input type="password" name="pass" id="pass"><br>
            <input type="submit" value="log in" style="border: 3px solid black">
          </form>
        </div>

    </main>
    <footer></footer>
</body>
</html>