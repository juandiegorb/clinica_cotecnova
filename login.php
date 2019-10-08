<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/style2.css">
<!--===============================================================================================-->
</head>
<body>	
    <?php 
    require_once 'Modelo/MySQL.php';
    $mysql = new MySQL;
    $mysql->conectar();    
    $seleccionUsuario = $mysql->efectuarConsulta("select clinica_cotecnova.tipo_usuario.id_tipo_usuario, clinica_cotecnova.tipo_usuario.nombre from tipo_usuario");     
    $mysql->desconectar();    
    ?>
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('img/bg-banner.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                            <form class="login100-form validate-form" action="Controlador/loginvalidacion.php" method="post">
					<span class="login100-form-title p-b-59">
						Login
					</span>					
					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Identificacion</span>
                                                <input class="input100" type="text" name="Identificacion" placeholder="Identificacion..." required="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
					</div>
                                         <div class="wrap-input100 validate-input" >                                            
                                             <select class="form-control " name="tipousuario" required>                                                
                                                <?php 
                                                    while ($resultado= mysqli_fetch_assoc($seleccionUsuario)){                         
                                                ?> 
                                                <option value="<?php echo $resultado['id_tipo_usuario']?>"><?php echo $resultado['nombre']?></option>                                                
                                                <?php }?>
                                            </select>
                                             
                                        </div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" >Ingresar</button>
						</div>
					</div>
					<div class="container-login100-form-btn" style="padding-top: 10px;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href="index.php" class="login100-form-btn">Cancelar</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>