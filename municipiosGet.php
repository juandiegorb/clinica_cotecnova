<?php
    require_once 'Modelo/MySQL.php';
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    $id_departamento =$_REQUEST['id_departamento'];
    $municipios = $mysql->efectuarConsulta("SELECT * FROM ciudades WHERE departamento_id = '.$id_departamento.'");
    echo '<option value = "">Selecciona una ciudad</option>';
    while ($resultado= mysqli_fetch_assoc($municipios)){
    //Se traen los datos y se imprimen en las opciones del select -->
        echo '<option value = "'.$resultado['id_ciudad'].'">'.$resultado['nombre'].'</option>'; 
    }                       
?>