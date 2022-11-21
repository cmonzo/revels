<?php
  function conectarBBDD(){
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        return new PDO('mysql:host=localhost;dbname=revels','revel','lever',$opciones );
    } catch (PDOException $e) {
        return null;
    }
    
  }
?>