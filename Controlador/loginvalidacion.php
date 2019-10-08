<?php
    // valido si ecisten las variables del login y si estan vacias
    if(isset($_POST['Identificacion']) && isset($_POST['pass']) && isset($_POST['tipousuario']) && 
            !empty($_POST['Identificacion']) && !empty($_POST['pass']) && !empty($_POST['tipousuario']) ){
        //llamo el archivo de conexion de la bd
        require_once '../Modelo/MySQL.php';
        
        //lleno las variables
        $usuario = $_POST['Identificacion'];
        $contra = md5($_POST['pass']);
        $tipousuario = $_POST['tipousuario'];
        //instancio la clase MySQL
        $mysql = new MySQL;
        //llamo la funcion de conectar a la BD
        $mysql->conectar();
        
        //pregunto si el tipo usuario es 1 = Medico
        if($tipousuario == 1 ){
            //realizo la consulta para ver si existe un usuario en la bd
           $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.medicos.nombre_completo, clinica_cotecnova.medicos.tipo_Usuario_id  from medicos where  numero_documento = ".$usuario." and contrasena = '".$contra."'"); 
           //pregunto si el tipo usuario es 2 = paciente 
        }else if($tipousuario == 2 ){
             //realizo la consulta para ver si existe un usuario en la bd
            $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.tipo_Usuario_id from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."'"); 
            echo "select clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.tipo_Usuario_id from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."'";
            
        }
        //Desconecto la conexion de la bD
        $mysql->desconectar(); 
        
        //Cuento si existen filas en la consulta
      if (mysqli_num_rows($usuarios) > 0){     
           //llamo la tabla usuario
        require_once '../Modelo/usuarios.php';
        //conecto a la base de datos
        $mysql->conectar();
        //inicio la session
        session_start();
        //instancio la tabla usuario
        $usuario = new usuarios();
        //recorro el resultado de la consulta y la almaceno en una variable
        while ($resultado= mysqli_fetch_assoc($usuarios)){
            //almaceno los resultados en variables
            $nombre = $resultado["nombre_completo"];
            $tipo_usuario = $resultado['tipo_Usuario_id'];
             //$apellido= $resultado[""];
            //$id=  $resultado[""];

            //$usuario->setNombre_completo($nombre);
             
             //$usuario->setApellidos($apellido);
             //$usuario->setId($id);
        }
        // alamceno las variables en sesiones
        $_SESSION['nombre'] = $nombre;
        $_SESSION['tipousuario'] = $tipo_usuario;
         //redirecciono al index
        header("Location: ../index.php");        
    }
    echo "No existe el usuario o la contraseña";
     //header("Location: ../index_iniciado.php");
    }else{
        echo "Usuario o contraseña incorrecta";
    }   
    
    

