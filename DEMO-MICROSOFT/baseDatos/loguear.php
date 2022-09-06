<?php 

require 'conexion.php';
session_start();

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];


$q = "SELECT COUNT(*) as contar from inicios where usuario = '$usuario' and clave = '$clave' ";

$consulta = mysqli_query($conexion, $q);
$array = mysqli_fetch_array($consulta);

if ($array['contar']>0) {
	$_SESSION['username'] = $usuario;
	header("location: ../menu.php");
}else{
	?>

	<body style="
	background-image: url(https://media.istockphoto.com/vectors/triangles-abstract-background-fiery-orange-vector-id695646470?k=20&m=695646470&s=170667a&w=0&h=omKaipRB_1pbUAC4zcz5tJbQsuv1IvB2_KcGfzcplPE=);
	background-repeat: no-repeat;
    background-size: 100%;
	 ">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script type="text/javascript">

		Swal.fire({
  			icon: 'error',
  			title: 'Error en el inicio de sesión...',
 			text: 'Usuario o Contraseña incorrectos!',
 
		}).then((result) => {
                  if (result.isConfirmed) {
                     window.location.href = '../index.php';
                 }

                })

	</script>
	</body>

	<?php


}


?>
