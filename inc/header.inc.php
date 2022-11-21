<header>
<?php
if (isset($_SESSION['registro']) && $_SESSION['registro']=='correcto'){
    ?>
    <a href="revel.php">REVELS</a>
    <?php
} else {
    ?>
    <a href="login.php">LOGIN</a> <a href="registro.php">REGISTRO</a>    
<?php
} 
?>
</header>