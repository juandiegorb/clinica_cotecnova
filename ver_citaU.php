
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

  <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <div id="container">
  <!--banner-->
  <div id="container">
  <?php
  include("header_index.php");
  ?>
  </div>  
  <?php
    if(isset($_SESSION['tipousuario'])){
    
        
    //Si el usuario es medico
        if($_SESSION['tipousuario'] == 1){
            ?>
               <!--service-->
                <section id="service" class="section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <h2 class="ser-title">Bienvenido</h2>
                        <hr class="botm-line">
                        <p>Bienvenid@ al ver citas</p>
                        <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="card">
                          <!-- Tab panes -->
                          <div class="card-body">
                            <form class="form-horizontal form-material">
                            <table id="dt_cliente" class="display">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre del paciente</th>
                                    <th scope="col">Nombre del medico</th>
                                    <th scope="col">Motivo de consulta</th>
                                    <th scope="col">Fecha y hora de la cita</th>
                                  </tr>
                                </thead>
                                
                              </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!--/ service-->
            <?php
        //Si se inicia sesion como usuario    
        }else if($_SESSION['tipousuario'] == 2){
            ?>
             <!--service-->
                <section id="service" class="section-padding">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">
                        <h2 class="ser-title">Bienvenido</h2>
                        <hr class="botm-line">
                        <p>Bienvenid@ al ver citas</p>
                        <p>Todos los datos mostrados son los suministrados por el medico ser&aacute;n de uso aplicativo, se guardar&aacute; la privacidad del usuario.</p>
                      </div>
                      <div class="col-md-8 col-sm-8">
                        <div class="card">
                          <!-- Tab panes -->
                          <div class="card-body">
                            <form class="form-horizontal form-material" action="listar2.php">
                            <table id="dt_cliente" class="display">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre del paciente</th>
                                    <th scope="col">Nombre del medico</th>
                                    <th scope="col">Motivo de consulta</th>
                                    <th scope="col">Fecha y hora de la cita</th>
                                  </tr>
                                </thead>
                                
                              </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <!--/ service-->
            <?php
        }           
    }else{
        ?>
        <!--banner-->
        <section id="banner2" class="banner">
          <div class="bg-color2">
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="col-md-12">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -16px;"></a>
                  </div>
                  <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li class=""><a href="index.php">Inicio</a></li>
                      <li class=""><a href="servicios.php">Servicios</a></li>
                      <li class=""><a href="about.php">Acerca de nosotros</a></li>
                      <li class=""><a href="login.php">Iniciar sesi&oacute;n</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </section>
        <!--/ banner-->
    <?php
    }
    ?>  
  
   <!--footer-->
  <div id="footer">
  <?php
  include("footer.php");
  ?>
  </div>
  <!--/ footer-->

<script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
        listar();
    } );

    var listar = function(){
      var table = $("#dt_cliente").DataTable({
        "ajax":{
          "method":"POST",
          "url":"listar2.php"
        },
        "columns":[
          {"data":"paciente"},
          {"data":"medico"},
          {"data":"motivo_consulta"},
          {"data":"fecha_hora"}
      
        ]
      });
    }
  </script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
