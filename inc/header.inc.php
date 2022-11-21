<header>
<?php
if (!isset($_SESSION['conectado']) && $_SESSION['conectado']!='correcto'){
    ?>
    <a href="login.php">LOGIN</a>    
<?php
} else {
    ?>
    <a href="/revels/recursos/revel.php">REVELS</a>
<?php
} 
?>
</header>