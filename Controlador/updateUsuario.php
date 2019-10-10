<?php
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_POST['enviar']) && !empty($_GET['id']) && !empty($_POST['nombreCompleto'])
        &&!empty($_POST['apellidos']) && !empty($_POST['estadoCivil']) && 
        !empty($_POST['departamentoNacimiento']) && !empty($_POST['ciudadNacimiento'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $idUsuario = $_GET['id'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estadoCivil'];
    $departamentoNacimiento = $_POST['departamentoNacimiento'];
    $CiudadNacimiento = $_POST['ciudadNacimiento'];
    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
    $actualizar = $mysql->efectuarConsulta("Update clinica_cotecnova.usuarios set nombre_completo = '".$nombreCompleto."', apellidos = '".$apellidos."', estado_civil_id = ".$estadoCivil.", departamento_id = ".$departamentoNacimiento.", ciudad_id = ".$CiudadNacimiento." where id_usuario =".$idUsuario.""); 
    
        //decision para comprobar si se ejecuto, se redirige al index principal
        if($actualizar){
           echo "<script type=\text/javascript\">alert('El documento se ha actualizado correctamente'); window.location='../ver_usuario.php';</script>";
        } else {
            //mensaje de error
            echo "<script type=\text/javascript\">alert('No se ha actualizado el documento'); window.location='../ver_usuario.php';</script>";
        }
    //Desconecto la conexion de la bD
    $mysql->desconectar(); 
    //header("Location: ../index.php");
    
}else{
    echo "<script typpe=\text/javascript\">alert('No se han enviado todos los datos para editar'); window.location='../ver_usuario.php';</script>";
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
}