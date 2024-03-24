<?php
error_reporting(0);
session_start();
if($_SESSION["usuario"]==""){
	header("Location: ../login");
}
?>
<!doctype html>
<html lang="es">
	
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <title>Alcaldia De Carirubana</title>
	    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon"/>

	    <!-- Fonts and icons -->
	    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	    <script>
	        WebFont.load({
	            google: {"families":["Lato:300,400,700,900"]},
	            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
	            active: function() {
	                sessionStorage.fonts = true;
	            }
	        });
	    </script>

	    <!-- CSS Files -->
	    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="../assets/css/atlantis.min.css">

	    <!-- CSS Just for demo purpose, don't include it in your project -->
	    <link rel="stylesheet" href="../assets/css/demo-min.css">

	    <link rel="stylesheet" href="../assets/css/file-uploaders/dropzone.css">  

	    <link rel="stylesheet" href="../assets-plugin/css/flaticon-min.css">  
	    <link rel="stylesheet" href="../assets-plugin/css/font-awesome-all-min.css"> 
	    <link rel="stylesheet" href="../assets-plugin/css/pickers/flatpickr.css">   
	    <link rel="stylesheet" href="../assets-plugin/css/style-min.css">

	    <style>
			* {
				box-sizing: border-box;
				margin: 0;
				padding: 0;
			}
			html {
				font-size: 16px;
			}
			body {
				font-family: Arial, sans-serif;
			}
			#container {
				display: flex;
				justify-content: center;
				align-items: center;
				position: relative;
				width: 100%;
				height: 100vh;
				padding: 15px;
				background-image: url("../img/background.jpg");
				background-image: linear-gradient(45deg, #ffd800, #ff5520, #750cf2, #0cbcf2);
				overflow: scroll;
			}
			.box {
				display: flex;
				justify-content: center;
				align-items: center;
				position: relative;
				width: 100%;
				max-width: 300px;
				height: auto;
				margin: auto;
			}
			.circle-01 {
				position: absolute;
				top: -45px;
				right: -45px;
				z-index: 1;
				width: 100px;
				height: 100px;
				border-radius: 50%;
				background-image: linear-gradient(45deg, #ffd800, #ff5520);
			}
			.circle-02 {
				position: absolute;
				bottom: -45px;
				left: -45px;
				z-index: 1;
				width: 100px;
				height: 100px;
				border-radius: 50%;
				background-image: linear-gradient(45deg, #0cbcf2, #750cf2);
			}
			.form-box {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				position: relative;
				z-index: 999;
				width: 100%;
				padding: 30px 20px;
				border: solid 1px rgba(255, 255, 255, .5);
				border-radius: 16px;
				box-shadow: 4px 4px 10px rgba(0, 0, 0, .1),
				-4px -4px 10px rgba(0, 0, 0, .1);
				background-color: rgba(255, 255, 255, .1);
				-webkit-backdrop-filter: blur(5px);
				backdrop-filter: blur(5px);
			}
			.ic-account {
				width: 60px;
				height: 60px;
				margin-bottom: 10px;
				border: solid 1px rgba(255, 255, 255, .5);
				border-radius: 50%;
				background-color: rgba(255, 255, 255, .2);
				/*background-image: url(ic_account.svg);*/
				background-position: center;
				background-size: 40px;
				background-repeat: no-repeat;
			}
			.login-form-input {
				width: 100%;
				height: 50px;
				margin: 10px auto;
				padding: 15px 20px;
				border: solid 1px rgba(255, 255, 255, .5);
				border-radius: 25px;
				background-color: rgba(255, 255, 255, .2);
				color: #fff;
				font-size: 1rem;
				outline: none;
			}
			.login-form-input::placeholder {
				color: rgba(255, 255, 255, .8);
			}
			.login-form-btn {
				width: 100%;
				height: 50px;
				margin: 20px auto 10px;
				border: none;
				border-radius: 25px;
				background-color: #fff;
				color: #3d3935;
				font-size: 1.25rem;
				outline: none;
				cursor: pointer;
			}
			.text {
				margin: 0;
				padding: 0;
				color: #fff;
				font-size: 0.875rem;
				text-align: center;
			}
			.text a {
				color: #fff;
			}
			.login-form-btn:hover,
			.text a:hover {
				opacity: .8;
			}

		</style>

</head>  

	<body class="login-bg">

		<div id="container">
			<div class="box">
				<div class="form-box">
					<div class="ic-account">
						<img src="../img/avatar2.svg" alt="">
					</div>
					<h5 class="heading"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"] ?></h5>
					<form name="login-form">

						<input id="pass" type="password" class="login-form-input" autofocus name="Unlock" placeholder="Contraseña" required>

						<button class="login-form-btn" type="button" id="ingresar">Login</button>

						<p class="text"><a href="#" id="salir">Iniciar sesión con una cuenta diferente</a></p>

						<div id="msg" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
			                <i class="icon-warning2"></i>Debe ingresar una contraseña
			            </div>
			            <div id="msg2" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
			                <i class="icon-warning2"></i>Contraseña incorrecta
			            </div>
			            <div id="msg4" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
			                <i class="icon-warning2"></i>Contraseña invalida
			            </div>

						<div id="mensaje"></div>

					</form>
				</div>
				<div class="circle-01"></div>
				<div class="circle-02"></div>
			</div>
		</div>


		<!-- <form>
			<div class="lock-screen">
				<div class="avatar">
					<img src="../img/avatar2.svg" alt="Bluemoon Admin">
					<span class="lock">
						<i class="icon-lock2"></i>
					</span>
				</div>

				<h5 class="heading"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"] ?></h5>
				<div class="lock-screen-input">
					<input id="pass" type="password" class="form-control" autofocus name="Unlock" placeholder="Contraseña">
					<button type="button" class="lock-btn" id="ingresar"><i class="icon-arrow-right2"></i></button>
				</div>
				<div id="msg" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
                    <i class="icon-warning2"></i>Debe ingresar una contraseña
                </div>
                <div id="msg2" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
                    <i class="icon-warning2"></i>Contraseña incorrecta
                </div>
                <div id="msg4" class="alert alert-danger" style="display: none;margin-top: -10px;margin-bottom: 10px;">
                    <i class="icon-warning2"></i>Contraseña invalida
                </div>
				
					<a href="#" id="salir">Iniciar sesión con una cuenta diferente</a>
				<div id="mensaje"></div>
			</div>
		</form> -->



	
	<script src="../js/jquery.js"></script>
	<script src="../js/funciones.js"></script>
	<script type="text/javascript">
		$("#salir").click(function(){
            salir();
        });
        $("#ingresar").click(function(){
        	ingresar();
        });
	</script>

	</body>

<!-- Mirrored from bootstrap.gallery/Bluemoon-v4.0.3/bluemoon-apple/locked-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2019 14:25:18 GMT -->
</html>