<?php 
    require_once 'Modelo/MySQL.php';
    $mysql = new MySQL;
    $mysql->conectar();    
    $consulta = $mysql->efectuarConsulta("SELECT clinica_cotecnova.citas.id_cita, clinica_cotecnova.usuarios.nombre_completo as paciente, clinica_cotecnova.medicos.nombre_completo as medico, clinica_cotecnova.citas.motivo_consulta, clinica_cotecnova.citas.fecha_hora from citas join usuarios  on clinica_cotecnova.citas.usuario_id = clinica_cotecnova.usuarios.id_usuario join medicos on clinica_cotecnova.citas.medico_id = clinica_cotecnova.medicos.id_medico");     
    $mysql->desconectar();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - ver cita</title>
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
  <!--banner-->
  <div id="container">
  <?php
  include("header_index.php");
  ?>
  </div>  
  
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">Bienvenido</h2>
          <hr class="botm-line">
          <p>Bienvenid@ a tu modulo de citas</p>
          <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              <form class="form-horizontal form-material">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Id de la cita</th>
                      <th scope="col">Nombre del paciente</th>
                      <th scope="col">Nombre del medico</th>
                      <th scope="col">Motivo de consulta</th>
                      <th scope="col">Fecha y hora de la cita</th>
                    </tr>
                  </thead>
                  <?php 
                    while ($resultado= mysqli_fetch_assoc($consulta)){                         
                  ?> 
                    
                  <tbody>
                    <tr>
                      <th scope="row"><?php echo $resultado['id_cita'] ?></th>
                      <td><?php echo $resultado['paciente'] ?></td>
                      <td><?php echo $resultado['medico'] ?></td>
                      <td><?php echo $resultado['motivo_consulta'] ?></td>
                      <td><?php echo $resultado['fecha_hora'] ?></td>
                    </tr>
                  </tbody>
                  <?php
                    }
                  ?>
                </table>
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
