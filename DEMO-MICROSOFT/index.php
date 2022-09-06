<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Css/styleIndex.css">
	<?php

		include("baseDatos/registrar.php");

	?>
	<title>BIENVENIDO</title>
</head>
<body>

	<div class="form">
			<div class="button">
				<div id="elegir"></div>
				<button type="boton" class="el-btn" onclick="login()" >Iniciar Sesion</button>
				<button type="boton" class="el-btn" onclick="registrar()">Registrar</button>
			</div>
			<div class="logo">
				<img src="imagenes/logo.png">
			</div>

			<form id="login" method="POST" action="baseDatos/loguear.php" class="resp">
				<input type="text" name="usuario" class="cjas" placeholder="Nombre de Usuario" >
				<input type="password" name="clave" class="cjas" placeholder="Contraseña" >
				<br><br>
				<button type="submit" name="inicio" class="ev-btn">Acceder</button>
			</form>




			<form id="registrar" method="POST" class="resp">
				<input type="text" name="usuario2" class="cjas" placeholder="Tu Nombre de Usuario" >
<!-- 				<input type="email" name="correo" class="cjas" placeholder="Correo"> -->
				<input type="password" name="clave2" class="cjas" placeholder="Tu Contraseña" >
				<br><br>
				<button type="submit" name="inicio1" class="ev-btn">Registrar</button>
				
			</form>

		</div>

		<script type="text/javascript">


			let a = document.getElementById("login");
			let b = document.getElementById("registrar");
			let c = document.getElementById("elegir");

			function login(){
				a.style.left = "50px";
				b.style.left = "450px";
				c.style.left = "0px";
			}

			function registrar(){
				a.style.left = "-400px";
				b.style.left = "50px";
				c.style.left = "120px";
			}
		</script>
		
</body>
</html>