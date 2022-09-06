<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administración de Biblioteca | YIZA S.A</title>
	<link rel="icon" href="img/logo-YIZA.png">
</head>
<body>
	<?php require 'require/topbar.php'; ?>
			<div>
					

		   	<div class="fondo">
					<div class="contentProd">
						<div class="img">
							
							<div class="container-slider">
							   	<div class="slider" id="slider" style="width: 400%;">
							   		
							   		<div class="slider__section">
							   			<img src="img/biblioteca.png" alt="" class="slider__img">
							   		</div>

							   		<div class="slider__section">
							   			<img src="img/inventario.png" alt="" class="slider__img">
							   		</div>

							   		<div class="slider__section">
							   			<img src="img/libros.png" alt="" class="slider__img">
							   		</div>

							   		<div class="slider__section">
							   			<img src="img/borrados.png" alt="" class="slider__img">
							   		</div>

							   	</div>
							   	<div class="slider_btn slider_btn--right" id="btn-right">
							   		<!-- &#62; -->
							   	</div>
							   	<div class="slider_btn slider_btn--left" id="btn-left">
							   		<!-- &#60; -->
							   	</div>
						   	</div>

						</div>
						<div class="aside">
							<h2 title="Administración de Biblioteca">Administración de Biblioteca</h2>
							<h4>Descripción</h4>
							<h5>Programa de Administración para Biblioteca, en este se pueden agregar y eliminar libros, los libros que se agreguen se pueden ver en el inventario y se pueden prestar.</h5>
							<a class="demo" target="_blank" href="DEMO-BIBLIOTECA/">Probar DEMO</a>
						</div>
					</div>
				</div>

		   </div><!-- p() -->


		</div>
	</div>
   	<?php 
   		require 'require/footer.php';
   		require 'require/JS.php';
   	?>
   	<script src="require/slider.js"></script>
</body>
</html>