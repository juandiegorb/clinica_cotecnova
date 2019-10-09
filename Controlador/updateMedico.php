<?php
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_POST['enviar']) && !empty($_GET['id']) && !empty($_POST['nombreCompleto'])
        &&!empty($_POST['apellidos']) && !empty($_POST['estadoCivil']) && !empty($_POST['tipoMedico'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $idMedico = $_GET['id'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $apellidos = $_POST['apellidos'];
    $estadoCivil = $_POST['estadoCivil'];
    $tipoMedico = $_POST['tipoMedico'];
    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
    $actualizar = $mysql->efectuarConsulta("Update clinica_cotecnova.medicos set nombre_completo = '".$nombreCompleto."', apellidos = '".$apellidos."', estado_civil_id = ".$estadoCivil.", tipos_medicos_id = '".$tipoMedico."' where id_medico =".$idMedico.""); 
    
        //decision para comprobar si se ejecuto, se redirige al index principal
        if($actualizar){
           header("Location: ../ver_medico.php");
        } else {
            //mensaje de error
            echo "Error";
        }
    //Desconecto la conexion de la bD
    $mysql->desconectar(); 
    //header("Location: ../index.php");
    
}else{
    header("Location: ../index.php");
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
}