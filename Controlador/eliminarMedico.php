<?php
//condicion para comprobar si los campos están declarados anteriormente y si no estan vacíos
if(isset($_GET['id']) && !empty($_GET['id'])){
    
    //lamado al archivo MySQL
    require_once '../Modelo/MySQL.php';
    
    //declaracion de variables con sus respectivas asignaciones
    $idMedico = $_GET['id'];    
    //nueva "archivo" MySQL
    $mysql = new MySQL;
    //llamado a funcion conectar
    $mysql->conectar();
    
    //variable que ejecutara la funcion consulta, pero en este caso, sera un eliminar usuario actualizando su estado 1. Activo 2.Inactivo
    $ActualizarEstado = $mysql->efectuarConsulta("update medicos set estado = 0 where id_medico =".$idMedicoo.""); 
    
        //decision para comprobar si se ejecuto, se redirige al index principal
        if($ActualizarEstado){
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