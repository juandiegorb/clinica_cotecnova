<?php
   
    //Comprobar que los campos no esten vacios   
    if(isset($_POST['enviar']) && !empty($_POST['documentoPaciente']) &&
        !empty($_POST['documentoMedico']) && !empty($_POST['fechaCita']) &&
        !empty($_POST['horaCita']) && !empty($_POST['motivoCita']))
    {
        //Llamar al archivo MySQL
        require_once '../Modelo/MySQL.php';
            
        //Recuperar datos del formulario (crear_cita.php)    
        $documentoPaciente = $_POST['documentoPaciente'];
        $documentoMedico = $_POST['documentoMedico'];
        $fechaCita = $_POST['fechaCita'];
        $horaCita = $_POST['horaCita'];
        $motivoCita = $_POST['motivoCita'];

        //Concatenar la fecha y la hora (aaaa-mm-dd hh:mm)
        $fechaHora = $fechaCita." ".$horaCita;
        
        //Nuevo archivo MySQL y se llama a la funcion conectar()
        $mysql = new MySQL;
        $mysql->conectar();

        //Consultar id de usuarios y medicos
        $id_medico = $mysql->efectuarConsulta("select id_medico from clinica_cotecnova.medicos where numero_documento = ".$documentoMedico.""); 
        $id_usuario = $mysql->efectuarConsulta("select id_usuario from clinica_cotecnova.usuarios where numero_documento = ".$documentoPaciente."");
        
        //ciclos while que sirven para traer los respectivos id
        while($resultado = mysqli_fetch_assoc($id_medico))
        {
            $idMedico = $resultado['id_medico']; 
        }

        while($resultado = mysqli_fetch_assoc($id_usuario))
        {
            $idUsuario = $resultado['id_usuario']; 
        }
        
        //Variable para efectuar la consulta SQL, en este caso, insertar datos en la tabla citas
        $insertarCitai = $mysql->efectuarConsulta("insert into clinica_cotecnova.citas(fecha_hora, motivo_consulta, usuario_id, medico_id) values('".$fechaHora."','".$motivoCita."',".$idUsuario.",".$idMedico.")"); 
        
         //Desconecto la conexion de la bD
        $mysql->desconectar();
        
        //Si se efectuo correctamente la consulta se redirige al index
        if($insertarCitai){
           header("Location: ../index.php");
        }
        //Sino da mensaje de error 
        else {
            echo "Error"; 
        }
    }
    //Si algun campo está vacio de redirige a la pagina del formulario
    else
    {
        header("Location: ../crear_cita.php");
    }