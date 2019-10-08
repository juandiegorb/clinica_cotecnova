<?php
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_POST['enviar']) && !empty($_POST['tipoDocumento']) && !empty($_POST['numeroDocumento']) && 
        !empty($_POST['nombreCompleto']) &&!empty($_POST['apellidos']) && !empty($_POST['estadoCivil']) && !empty($_POST['contrasena'])
        && !empty($_POST['tipoUsuario']) && !empty($_POST['tipoMedico'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $tipoUsuario= $_POST['tipoUsuario'];
    $tipoDocumento= $_POST['tipoDocumento'];
    $numeroDocumento = $_POST['numeroDocumento'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estadoCivil'];
    $contrasena = md5($_POST['contrasena']);
    $tipoMedico = $_POST['tipoMedico'];
    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
    $insertarMedicoi= $mysql->efectuarConsulta("insert into clinica_cotecnova.medicos(tipo_Usuario_id, numero_documento, nombre_completo, apellidos, contrasena, tipo_documento_id, estado_civil_id, tipos_medicos_id) VALUES(".$tipoUsuario.",'".$numeroDocumento."','".$nombreCompleto."','".$apellidos."','".$contrasena."',".$tipoDocumento.",".$estadoCivil.",".$tipoMedico.")"); 
    
    //Desconecto la conexion de la bD
    $mysql->desconectar(); 
    
    //decision para comprobar si se ejecuto, se redirige al index principal
    if($insertarMedicoi){
       header("Location: ../index.php");
    } else {
        //mensaje de error
        echo "Error";
    }
}else{
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
    header("Location: ../crear_medicos.php");
}
