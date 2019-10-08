<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Crear citas</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <!-- =======================================================
    Theme Name: Medilab
    Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <div id="container">
  <?php
  include("header_index.php");
  ?>
  <?php 
    //llamado al archivo MySQL
    require_once 'Modelo/MySQL.php';
    //nueva "consulta"
    $mysql = new MySQL;
    //funcion conectar
    $mysql->conectar();
    //respectivas variables donde se llama la función consultar, se incluye la respectiva consulta
    $seleccionCedulaP = $mysql->efectuarConsulta("select clinica_cotecnova.usuarios.numero_documento, clinica_cotecnova.usuarios.nombre_completo, clinica_cotecnova.usuarios.apellidos from usuarios");     
    $seleccionCedulaM = $mysql->efectuarConsulta("select clinica_cotecnova.medicos.numero_documento, clinica_cotecnova.medicos.nombre_completo, clinica_cotecnova.medicos.apellidos from medicos");

    //funcion desconectar
    $mysql->desconectar();    
    ?>
  </div>  
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Bienvenido</h2>
          <hr class="botm-line">
          <p>Bienvenid@ al formulario de registro, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              
              <form class="form-horizontal form-material" action="Controlador/insertarCita.php" method="POST">
                
                <div class="form-group">
                  <label class="col-sm-12">Cedula Paciente</label>
                  <div class="col-sm-12">
                      <select class="form-control form-control-line" name="documentoPaciente">
                          <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                          <option value="Ingresar documento">Ingresar documento</option>
                         <?php 
                       while ($resultado = mysqli_fetch_assoc($seleccionCedulaP)){   
                           ?> 
                          <!-- Se traen los datos y se imprimen en las opciones del select -->
                        
                          
                          <option value="<?php echo $resultado['numero_documento']?>"><?php echo $resultado['numero_documento']." - ".$resultado['nombre_completo']." ".$resultado['apellidos'];?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div> 

                <div class="form-group">
                    <label class="col-sm-12">Cedula Medico</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="documentoMedico">
                          <!-- Llamado al ciclo while donde vamos a recorrer un array asociativo con la consulta declarada anteriormente -->
                          <option value="Ingresar documento">Ingresar documento</option>   
                        <?php 
                            while ($resultado = mysqli_fetch_assoc($seleccionCedulaM)){   
                        ?> 
                          <!-- Se traen los datos y se imprimen en las opciones del select -->
                           
                        <option value="<?php echo $resultado['numero_documento']?>"><?php echo $resultado['numero_documento']." - ".$resultado['nombre_completo']." ".$resultado['apellidos'];?></option>  
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-12">Fecha</label>
                  <div class="col-md-4">
                    <input type="date" name="fechaCita" class="form-control form-control-line">
                  </div>
                </div>

                <div class="form-group">                  
                  <label class="col-md-12">Hora</label>
                  <div class="col-md-4">
                    <input type="time" name="horaCita" class="form-control form-control-line">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-12">Motivo de consulta</label>     
                  <div class="col-md-12">
                    <input type="text" name="motivoCita" class="form-control form-control-line">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <button class="btn btn-success" name="enviar">Registrarse</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <a href="index_iniciado_medico" class="btn btn-danger">Cancelar</a>
                  </div>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  <!--footer-->
  <div id="footer">
  <?php
  include("footer.php");
  ?>
  </div>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
