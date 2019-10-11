<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="col-lg-offset-3 col-lg-6">
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
        echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong> Numero de documento ya existe.</div>";
        header( "refresh:3;url=crear_usuario.php" ); 
    }else{
        //variable que ejecutara la funcion consulta, pero en este caso, no usamos select sino insert para meter los datos a la respectiva table
        $insertarUsuarioi = $mysql->efectuarConsulta("insert into clinica_cotecnova.usuarios(tipo_Usuario_id, numero_documento, nombre_completo, apellidos, contrasena, tipo_documento_id, estado_civil_id, ciudad_id, departamento_id, estado) VALUES(".$tipoUsuario.",'".$numeroDocumento."','".$nombreCompleto."','".$apellidos."','".$contrasena."',".$tipoDocumento.",".$estadoCivil.",".$CiudadNacimiento.",".$departamentoNacimiento.", 1 )"); 
        //decision para comprobar si se ejecuto, se redirige al index principal
        if($insertarUsuarioi){
           echo "<div class=\"alert alert-success alert-dismissible\"><a href=\"../ver_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Felicidades!</strong>El paciente ha sido registrado correctamente.</div>";
           header( "refresh:3;url=ver_usuario.php" );    
        } else {
            //mensaje de error
           echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se ha podido registrar al paciente.</div>";
           header( "refresh:3;url=crear_usuario.php" );          
        }
    }        
    //Desconecto la conexion de la bD
    $mysql->desconectar(); 
    //header("Location: ../index.php");
}else{
    //sino se cumple la primer condicion, se re envia nuevamente al formulario
    echo "<div class=\"alert alert-warning alert-dismissible\"><a href=\"../crear_usuario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Alerta!</strong>No se han enviado todos los datos necesarios.</div>";
    header( "refresh:3;url=crear_usuario.php" );          
}
?>
  </div>
  <!-- Llamado de los respectivos scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
