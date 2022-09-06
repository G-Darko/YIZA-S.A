<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>YIZA S.A</title>
	<link rel="icon" href="img/logo-YIZA.png">
</head>
<body>
	<?php require 'require/topbar.php'; ?>
			<div>
							

		   	<div class="productos">
		   		
			   		<div class="content">
			   			<a href="YIZA.php">
				   			<!-- <h1 title="#">$	<span></span></h1> -->

				   			<h3 title="Ventas On-Line">Ventas On-Line</h3>
				   			<img src="img/store.png" alt="YIZA STORE">

			   			</a>
			   		</div>

			   		<div class="content">
			   			<a href="biblioteca.php">
				   			<!-- <h1 title="#">$	<span></span></h1> -->

				   			<h3 title="Administración de Biblioteca">Administración de Biblioteca</h3>
				   			<img src="img/biblioteca.png" alt="Biblioteca CECyTEM">

			   			</a>
			   		</div>

			   		 <div class="content" onclick="

							Swal.fire({
							  icon: 'info',
							  title: 'Proximamente',
							  text: 'La demo y la descripción de este servicio no se encuentra disponible',
							  background: '#232323',
							  color: '#fff'
							})
			   		 " style="cursor: pointer;">
			   			<!-- <a href="#"> -->

				   			<h3 title="Sitio WEB para CECyTEM">Sitio WEB para CECyTEM</h3>
				   			<img src="img/proximamente.png" alt="WEB CECyTEM">

			   			<!-- </a> -->
			   		</div>

			   		<div class="content">
			   			<a href="microsoft.php">

				   			<h3 title="Curso Microsoft">Curso Microsoft</h3>
				   			<img src="img/microsoft.png" alt="Curso Microsoft">

			   			</a>
			   		</div> 

		   	</div>

		   </div><!-- p() -->


		</div>
	</div>
   	<?php 
   		require 'require/footer.php';
   		require 'require/JS.php';
   	?>
</body>
</html>