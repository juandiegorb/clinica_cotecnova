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
        if($tipousuario == 1){
            //Consulto si existe un usuario con ese estado
            $ConsultarEstado = $mysql->efectuarConsulta("select clinica_cotecnova.medicos.estado from medicos where  numero_documento = ".$usuario." and contrasena = '".$contra."'");
            if(!empty($ConsultarEstado)){
                if(mysqli_num_rows($ConsultarEstado) > 0){
                    while ($resultado = mysqli_fetch_assoc($ConsultarEstado)){
                    //almaceno los resultados en variables
                        $estado = $resultado["estado"];
                    }
                    //si estado es = 1 el usuario esta activo
                    if($estado = 1){
                        //realizo la consulta para ver si existe un usuario en la bd
                        $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.medicos.id_medico, clinica_cotecnova.medicos.nombre_completo, clinica_cotecnova.medicos.tipo_Usuario_id  from medicos where  numero_documento = ".$usuario." and contrasena = '".$contra."' and estado = 1"); 
                        //Cuento si existen filas en la consulta
                        if (!empty($usuarios)){ 
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_medico = $resultado["id_medico"];
                                    $nombre = $resultado["nombre_completo"];
                                    $tipo_usuario = $resultado['tipo_Usuario_id'];
                                }
                                // alamceno las variables en sesiones
                                $_SESSION['idMedico'] = $id_medico;
                                $_SESSION['nombre'] = $nombre;
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                 //redirecciono al index
                                header("Location: ../index.php");
                            }else{
                                echo "Usuario o contraña incorrecta o esta inactivo";
                            }                                    
                        }else{
                            echo "Usuario o contraseña incorrecta o esta inactivo";
                        } 
                    }else{
                        echo "El usuario esta inactivo";
                    }      
                }else{
                    echo "Usuario o contraseña incorrecta";
                }                    
            }else{
                echo "No existe el usuario";
            }            
           //pregunto si el tipo usuario es 2 = paciente 
        }else if($tipousuario == 2){
            //Consulto si existe un usuario con ese estado
            $ConsultarEstado = $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.estado from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."'"); 
            if(!empty($ConsultarEstado)){
                if(mysqli_num_rows($ConsultarEstado) > 0){
                    while ($resultado = mysqli_fetch_assoc($ConsultarEstado)){
                    //almaceno los resultados en variables
                        $estado = $resultado["estado"];
                    }
                    //si estado es = 1 el usuario esta activo
                    if($estado = 1){
                        //realizo la consulta para ver si existe un usuario en la bd
                        $usuarios= $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.id_usuario, clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.tipo_Usuario_id from usuarios where  numero_documento = ".$usuario." and contrasena = '".$contra."' and estado = 1 "); 
                        //Cuento si existen filas en la consulta
                        if (!empty($usuarios)){ 
                            if(mysqli_num_rows($usuarios) > 0){
                                //inicio la session
                                session_start();
                                //recorro el resultado de la consulta y la almaceno en una variable
                                while ($resultado= mysqli_fetch_assoc($usuarios)){
                                    //almaceno los resultados en variables
                                    $id_usuario = $resultado["id_usuario"];
                                    $nombre = $resultado["nombre_completo"];
                                    $tipo_usuario = $resultado['tipo_Usuario_id'];
                                }
                                // alamceno las variables en sesiones
                                $_SESSION['idUsuario'] = $id_usuario;
                                $_SESSION['nombre'] = $nombre;
                                $_SESSION['tipousuario'] = $tipo_usuario;
                                 //redirecciono al index
                                header("Location: ../index.php");
                            }else{
                                echo "Usuario o contraña incorrecta o esta inactivo";
                            }                                    
                        }else{
                            echo "Usuario o contraseña incorrecta o esta inactivo";
                        } 
                    }else{
                        echo "El usuario esta inactivo";
                    }      
                }else{
                    echo "Usuario o contraseña incorrecta";
                }                    
            }else{
                echo "No existe el usuario";
            }
        }else{
            echo "Este tipo de usuario no existe";  
        }
        //Desconecto la conexion de la bD
        $mysql->desconectar();          
        //header("Location: ../index_iniciado.php");
    }else{
        echo "No se enviaron los datos";
    }   
?>
    
    

