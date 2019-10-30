<?php
  //include our function
  require_once '../Modelo/MySQL.php';
  //Nuevo archivo MySql
  $mysql = new MySQL;
  //Conectar a la base de datos
  $mysql->crearBackup();
?>