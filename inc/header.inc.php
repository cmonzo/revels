<header>
<?php
if (isset($_SESSION['registro']) && $_SESSION['registro']=='correcto'){
    ?>
    <a href="/revels/recursos/revel.php">REVELS</a>
    <?php
} else {
    ?>
    <a href="login.php">LOGIN</a>    
<?php
} 
?>
</header>