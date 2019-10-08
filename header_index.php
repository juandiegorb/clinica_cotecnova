<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cl&iacute;nica Cotecnova</title>
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
    <?php 
    session_start();
    if(isset($_SESSION['tipousuario'])){
        if($_SESSION['tipousuario'] == 1){
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
                            <!--<li class=""><a href="servicios.html">Servicios</a></li>
                            <li class=""><a href="about.html">Acerca de nosotros</a></li>-->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cita</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_cita.php">Crear cita</a>
                                  <a class="dropdown-item btn" href="ver_cita.php">Ver citas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Medico</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_medicos.php">Crear medico</a>
                                  <a class="dropdown-item btn" href="ver_medico.php">Ver medicos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuario</a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="crear_usuario.php">Crear usuario</a>
                                  <a class="dropdown-item btn" href="ver_usuario.php">Ver usuarios</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']?></a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="Controlador\cerrar_sesion.php">Cerrar sesion</a>
                                </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </nav>
                </div>
              </section>
              <!--/ banner-->
            <?php
        }else if($_SESSION['tipousuario'] == 2){
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
                            <li class=""><a href="ver_citaU.php">Citas</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']?></a>
                                <div class="dropdown-menu " aria-labelledby="dropdown1">
                                  <a class="dropdown-item btn" href="Controlador\cerrar_sesion.php">Cerrar sesion</a>
                                </div>
                            </li>
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
  

  <!-- Llamado de los respectivos scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>