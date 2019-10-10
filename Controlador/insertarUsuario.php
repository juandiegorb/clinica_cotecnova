<?php
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_POST['enviar']) && !empty($_POST['tipoDocumento']) && !empty($_POST['numeroDocumento']) && 
        !empty($_POST['nombreCompleto']) &&!empty($_POST['apellidos']) && !empty($_POST['estadoCivil']) && !empty($_POST['departamentoNacimiento']) 
        && !empty($_POST['ciudadNacimiento']) && !empty($_POST['contrasena'])&& !empty($_POST['tipoUsuario'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    //declaracion de variables con sus respectivas asignaciones
    $tipoUsuario= $_POST['tipoUsuario'];
    $tipoDocumento= $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estadoCivil'];
    $departamentoNacimiento = $_POST['departamentoNacimiento'];
    $CiudadNacimiento = $_POST['ciudadNacimiento'];
    $contrasena = md5($_POST['contrasena']);
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    $repetido = $mysql->efectuarConsulta("select numero_documento from clinica_cotecnova.usuarios where numero_documento = ".$numeroDocumento.""); 
    
    if(mysqli_num_rows($repetido) > 0){
        echo "<script type=\text/javascript\">alert('Se ha registrado el paciente'); window.location='../crear_usuario.php';</script>";
    }else{
        //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
        $insertarUsuarioi = $mysql->efectuarConsulta("insert into clinica_cotecnova.usuarios(tipo_Usuario_id, numero_documento, nombre_completo, apellidos, contrasena, tipo_documento_id, estado_civil_id, ciudad_id, departamento_id, estado) VALUES(".$tipoUsuario.",'".$numeroDocumento."','".$nombreCompleto."','".$apellidos."','".$contrasena."',".$tipoDocumento.",".$estadoCivil.",".$CiudadNacimiento.",".$departamentoNacimiento.", 1 )"); 
        //decision para comprobar si se ejecuto, se redirige al index principal
        if($insertarUsuarioi){
           echo "<script type=\text/javascript\">alert('Se ha registrado el paciente'); window.location='../ver_usuario.php';</script>";
        } else {
            //mensaje de error
           echo "<script type=\text/javascript\">alert('Error en el registro del usuario'); window.location='../ver_usuario.php';</script>";
        }
        
    }        
    //Desconecto la conexion de la bD
    $mysql->desconectar(); 
    //header("Location: ../index.php");
    
}else{
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
    echo "<script type=\text/javascript\">alert('No se han enviado todos los datos'); window.location='../crear_usuario.php';</script>";
}
