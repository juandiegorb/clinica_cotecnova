<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova - Modificar medicos</title>
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
          <p>Bienvenid@ al formulario de actualizar, por favor rellenar los siguientes campos con informaci&oacute;n valida y real.</p>
          <p>Todos los datos pedidos ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
              <form class="form-horizontal form-material">
                <div class="form-group">
                  <label class="col-sm-12">Seleccione el tipo de documento</label>
                  <div class="col-sm-12">
                    <select disabled class="form-control form-control-line">
                      <option disabled selected="true">Seleccione una opcion</option>
                      <option>C&eacute;dula</option>
                      <option>Pasaporte</option>
                      <option>Tarjeta de identidad</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Numero</label>            
                  <div class="col-md-12">
                    <input type="text" disabled="" placeholder="Ingrese el numero del documento" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Nombre Completo</label>
                  <div class="col-md-12">
                    <input type="text" placeholder="Ingrese sus nombres" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">                  
                  <label class="col-md-12">Apellidos</label>
                  <div class="col-md-12">
                    <input type="text" placeholder="Ingrese sus apellidos" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Estado civil</label>     
                  <div class="col-sm-12">
                    <input type="radio" name="a">Solter@
                    <input type="radio" name="a">Casad@
                    <input type="radio" name="a">Viud@ 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Tipo de medico</label>
                  <div class="col-sm-12">
                    <select class="form-control form-control-line">
                      <option disabled selected="true">Seleccione una opcion</option>
                      <option>Medico general</option>
                      <option>Psicologia</option>
                      <option>Cirujia</option>
                    </select>
                  </div>
                </div>               
                <div class="form-group">
                  <label class="col-md-12">Contraseña</label>
                  <div class="col-md-12">
                    <input type="password" placeholder="Ingrese una clave" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 col-md-2">
                    <button class="btn btn-success">Modificar</button>
                  </div>
                  <div class="col-sm-9 col-md-4">
                    <a href="index.html" class="btn btn-danger">Cancelar</a>
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
