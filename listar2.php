
  <?php

    
        //Llamar al archivo MuSQL
        require_once 'Modelo/MySQL.php';
        
        //Nuevo archivo MySql
        $mysql = new MySQL;
        //Conectar a la base de datos
        $mysql->conectar();
        session_start();
        //Si la sesión es como medico
        if(isset($_SESSION['idMedico'])){
            $idMedico = $_SESSION['idMedico'];
            //Muestra las citas asignadas a ese medico 
            $citasMedico = $mysql->efectuarConsulta("SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) as diferencia_dias, clinica_cotecnova.usuarios.nombre_completo as paciente, clinica_cotecnova.medicos.nombre_completo as medico, clinica_cotecnova.citas.motivo_consulta, clinica_cotecnova.citas.fecha_hora from citas join usuarios  on clinica_cotecnova.citas.usuario_id = clinica_cotecnova.usuarios.id_usuario join medicos on clinica_cotecnova.citas.medico_id = clinica_cotecnova.medicos.id_medico where clinica_cotecnova.citas.medico_id = ".$idMedico." and clinica_cotecnova.citas.fecha_hora > DATE_FORMAT(NOW(),'%Y-%m-%d')");

            if(!$citasMedico){
                die("error");
              }else{
                while ($data = mysqli_fetch_assoc($citasMedico)) {
                  $arreglo["data"][]= $data;
                }
                echo json_encode($arreglo);
              }
              mysqli_free_result($citasMedico);
              $mysql->desconectar();

        
        }
        //Si la sesión es como medico
        else if(isset($_SESSION['idUsuario'])){
            $idUsuario = $_SESSION['idUsuario'];
            //Muestra las citas asignadas a ese usuario 
            $citasUsuario = $mysql->efectuarConsulta("SELECT DATEDIFF(clinica_cotecnova.citas.fecha_hora, DATE_FORMAT(NOW(),'%Y-%m-%d')) as diferencia_dias, clinica_cotecnova.usuarios.nombre_completo as paciente, clinica_cotecnova.medicos.nombre_completo as medico, clinica_cotecnova.citas.motivo_consulta, clinica_cotecnova.citas.fecha_hora from citas join usuarios  on clinica_cotecnova.citas.usuario_id = clinica_cotecnova.usuarios.id_usuario join medicos on clinica_cotecnova.citas.medico_id = clinica_cotecnova.medicos.id_medico where clinica_cotecnova.citas.usuario_id = ".$idUsuario." and clinica_cotecnova.citas.fecha_hora > DATE_FORMAT(NOW(),'%Y-%m-%d')");   

            if(!$citasUsuario){
              die("error");
            }else{
              while ($data = mysqli_fetch_assoc($citasUsuario)) {
                $arreglo["data"][]= $data;
              }
              echo json_encode($arreglo);
            }
            mysqli_free_result($citasUsuario);
            $mysql->desconectar();
        }
  
    
  ?>  
  
