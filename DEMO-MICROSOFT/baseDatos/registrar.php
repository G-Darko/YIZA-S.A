<?php 
include("conexion.php");

if(isset($_POST['inicio1'])) {
	if(strlen($_POST['usuario2']) >= 1 && strlen($_POST['clave2']) >= 1){
		$usu = trim($_POST['usuario2']);
		$contra = trim($_POST['clave2']);

		$consulta2 = "INSERT INTO inicios VALUES (null,'$usu','$contra')";
		$res = mysqli_query($conexion, $consulta2);

		if ($res) {
			?>
			<body>
				<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				<script type="text/javascript">
					Swal.fire({
  						icon: 'success',
  						title: 'Usuario y Contraseña guardado',
  						showConfirmButton: false,
  						timer: 1500
					})
				</script>		
			</body>
			<?php
		}else{
			?>
			<body>
				<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				<script type="text/javascript">
					Swal.fire({
  						icon: 'error',
  						title: 'Hubo un fallo en el registro',
  						showConfirmButton: false,
  						timer: 1500
					})
				</script>		
			</body>
			<?php
		}
	} else{
		?>
			<body>
				<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				<script type="text/javascript">
					Swal.fire({
  						icon: 'error',
  						title: 'No se registro ningun dato',
  						showConfirmButton: false,
  						timer: 1500
					})
				</script>		
			</body>
			<?php
	}
}

?>