<?php

	//lamado al archivo MySQL
	require_once '../Modelo/MySQL.php';

	//nueva "archivo" MySQL
	$mysql = new MySQL;
	//llamado a funcion conectar
    $mysql->conectar();

    //consulta que borra todos los datos de la tabla citas cuya fecha sea inferior a el valor que retorne la funcion NOW()
    //Funcion NOW() devuelve la fecha y hora actuales 
    //DATE_FORMAT se utiliza para que la funcion retorne en formato aaaa-mm-dd hh:mm:ss 
    $borrarCita = $mysql->efectuarConsulta("DELETE FROM clinica_cotecnova.citas WHERE fecha_hora < DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%S')");

    //redireccion
    header("Location: ../ver_cita.php");

    //se desconecta de la base de datos
    $mysql->desconectar();}
    ?>