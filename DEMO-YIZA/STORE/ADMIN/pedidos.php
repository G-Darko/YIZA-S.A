<?php 
	require('require/conexion.php');
	require 'require/session_start.php';
	
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedidos | YIZA</title>
<?php require('require/nav_admin.php') ?>
				
				<div class="caja">
					<div class="container">
						<div class="header">
							<h2>
								<ion-icon name="list-outline"></ion-icon>	
								Pedidos 
							</h2>
						</div>
						<table>
							<thead>
								<tr>
									<td>Imagen</td>
									<td>Nombre del Producto</td>
									<td>Pago</td>
									<td>Cantidad</td>
									<td>Status</td>
									<td>Opciones</td>
								</tr>
							</thead>
							<tbody>
								<?php 

								$sqlT = mysqli_query($conexion, "SELECT COUNT(*) as total FROM pedidos");
								$resT = mysqli_fetch_assoc($sqlT);
								$total = $resT['total'];

								$xPage = $iAdmin;
								if (empty($_GET['page'])) {
									$page = 1;
								}else{
									$page = $_GET['page'];
								}

								$desde = ($page-1) * $xPage;
								$tPags = ceil($total / $xPage);

								if ($page <= 0 || $_GET['page'] <= 0 || ($page > $tPags && $page != 1) || ($_GET['page'] > $tPags && $_GET['page'] != 1) ) {
								 	header("Location: pedidos.php?page=1");
								}
								if ($total == 0) {
									echo "
									<tr>
										<td colspan='6'>
											No hay pedidos
										</td>
									</tr>
									";
								}


									$sql= "SELECT * from pedidos limit $desde, $xPage";
									$res=mysqli_query($conexion,$sql);
									while ($row=mysqli_fetch_assoc($res)){
										$id_prod = $row['id_prod'];

										$sqlP = "SELECT * FROM productos WHERE id_prod = $id_prod";

										$resultado = $conexion->query($sqlP);
										$rowP = $resultado->fetch_assoc();
								?>
								<tr>
									<td>
										<img src="<?php echo $rowP['img'];?>" width="100px" alt="">
									</td>
									<td title="<?php echo $rowP['nombre'];?>"><?php 
											echo $rowP['nombre'];
										?>
									</td>
									<td><?php 
											echo $row['pago'];
										?>
									</td>
									<td><?php 
											echo $row['cantidad'];
										?>
									</td>
									<td>
					   				<?php 
					   					if ($row['id_statusPed'] == 1) {
					   				?>
					   					<span class="status delivered">Entregado</span>
					   				<?php  
					   					}elseif ($row['id_statusPed'] == 2){
					   				?>		
					   					<span class="status pending">Pendiente</span>
					   				<?php
					   					}elseif ($row['id_statusPed'] == 3){
					   				?>		
					   					<span class="status inProgress">En Progreso</span>
					   				<?php
					   					}elseif ($row['id_statusPed'] == 4){
					   				?>		
					   					<span class="status return">Cancelado</span>
					   				<?php
					   					}
					   				?>
					   					
					   					
					   				</td>
									<td>
										<div class="btns2">
		<?php 
			if ($row['id_statusPed'] != 1){
				if ($row['id_statusPed'] != 4){
		?>
		<?php 
				if ($row['id_statusPed'] != 3){
		?>
											<button class="edit" title="En proceso" onclick="proceso(<?php echo $row['id_ped'];?>)">
										 		<ion-icon name="refresh-outline"></ion-icon>
										 	</button>
										  <?php		
						   					}
						   				?>
		
										 	<button class="edit entregado" title="En proceso" onclick="entregar(<?php echo $row['id_ped'];?>)">
										 		<ion-icon name="bag-check-outline"></ion-icon>
										 	</button>

										<?php 
						   					if ($row['id_statusPed'] == 2){
						   				?>
						   					<button title="Cancelar" class="delete" onclick="cancelar(<?php echo $row['id_ped'];?>)">
						   						<ion-icon name="close-outline"></ion-icon>
						   					</button>
						   				<?php		
						   					}
						   				?>
										
						   				<?php
						   						}		
						   					}
						   				?>
										</div>
									</td>
								</tr>
								<?php 
									} 
								?>
							</tbody>
						</table>
					</div>

					<div class="paginador">
						<ul>
					<?php 
						if ($page != 1) {
					?>
							<li><a href="?page=1">|<</a></li>
							<li><a href="?page=<?php echo $page-1;?>"><<</a></li>
					<?php 
						}
							if ($tPags <= 5) {
								for ($i=1; $i <= $tPags; $i++) { 
									if ($i == $page) {
										echo '<li class="pageSelect">'.$i.'</li>';
									}else{
										echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
									}
								}
							}else{
								for ($i = max(1, min($page, $tPags - 5)); $i < max(6, min($page + 6, $tPags + 1)); $i++ ) { 
									if ($i == $page) {
										echo '<li class="pageSelect">'.$i.'</li>';
									}else{
										echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
									}
								}
							}
						if ($page != $tPags && $tPags > 0) {
					?>
							<li><a href="?page=<?php echo $page+1;?>">>></a></li>
							<li><a href="?page=<?php echo $tPags;?>">>|</a></li>
					<?php 
						}
					?>
						</ul>
					</div>
				</div>

			<?php 
				require 'require/footer.php'; 
			?>
			</div>
		</div>
	</div>
	<?php require('require/scriptsJS.php') ?>}
	<script>

		function cancelar(id_ped){
			Swal.fire({
			  title: '??Seguro de cancelar?',
			  text: "Esto no se podra revertir, adem??s eliminara las dependencias",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, cancelar',
			  cancelButtonText: 'Cancelar',
			  background: mainC,
			  color: negro1
			}).then((result) => {
			  	if (result.isConfirmed) {
				    let fd = new FormData();
					fd.append('id_ped', id_ped);
					let request = new XMLHttpRequest();
					request.open('POST', 'api/Pedidos/cancelar.php', true);
					request.onload=function(){
						if (request.readyState==4 && request.status==200) {
							let response=JSON.parse(request.responseText);
							//console.log(request);
							if (response.state) {
								(async () =>{
									await Swal.fire({
									  icon: 'success',
									  title: 'Cancelado',
									  text: 'El producto se ha cancelado comunicate con el usuario',
									  background: mainC,
									  color: negro1,
									});
									window.location.reload();
								})();

							}else{
								Swal.fire({
									  icon: 'error',
									  title: 'Error',
									  text: (response.detail),
									  background: mainC,
									  color: negro1
									});
							}
						}
					}
					request.send(fd);			  
			   	}
			})	
		}

		function proceso(id_ped){
			Swal.fire({
			  title: '??Cambiar estado a En progreso?',
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, Cambiar',
			  cancelButtonText: 'Cancelar',
			  background: mainC,
			  color: negro1
			}).then((result) => {
			  	if (result.isConfirmed) {
				    let fd = new FormData();
					fd.append('id_ped', id_ped);
					let request = new XMLHttpRequest();
					request.open('POST', 'api/Pedidos/progreso.php', true);
					request.onload=function(){
						if (request.readyState==4 && request.status==200) {
							let response=JSON.parse(request.responseText);
							//console.log(request);
							if (response.state) {
								(async () =>{
									await Swal.fire({
									  icon: 'success',
									  title: 'En progreso',
									  text: 'El producto se ha procesado',
									  background: mainC,
									  color: negro1,
									});
									window.location.reload();
								})();

							}else{
								Swal.fire({
									  icon: 'error',
									  title: 'Error',
									  text: (response.detail),
									  background: mainC,
									  color: negro1
									});
							}
						}
					}
					request.send(fd);			  
			   	}
			})	
		}

		function entregar(id_ped){
			Swal.fire({
			  title: '??Producto entregado?',
			  text: "El producto ya llgo al cliente",
			  icon: 'info',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, ha sido entregado',
			  cancelButtonText: 'Cancelar',
			  background: mainC,
			  color: negro1
			}).then((result) => {
			  	if (result.isConfirmed) {
				    let fd = new FormData();
					fd.append('id_ped', id_ped);
					let request = new XMLHttpRequest();
					request.open('POST', 'api/Pedidos/entregado.php', true);
					request.onload=function(){
						if (request.readyState==4 && request.status==200) {
							let response=JSON.parse(request.responseText);
							//console.log(request);
							if (response.state) {
								(async () =>{
									await Swal.fire({
									  icon: 'success',
									  title: 'Entregado',
									  text: 'El producto se ha entregado',
									  background: mainC,
									  color: negro1,
									});
									window.location.reload();
								})();

							}else{
								Swal.fire({
									  icon: 'error',
									  title: 'Error',
									  text: (response.detail),
									  background: mainC,
									  color: negro1
									});
							}
						}
					}
					request.send(fd);			  
			   	}
			})	
		}



		function agregarProd(){
			let fd = new FormData();
			fd.append('nombre', document.getElementById('nombre').value);
			fd.append('des', document.getElementById('des').value);
			fd.append('tMeta', document.getElementById('tMeta').value);
			fd.append('desMeta', document.getElementById('desMeta').value);
			fd.append('clave', document.getElementById('clave').value);
			fd.append('modelo', document.getElementById('modelo').value);
			fd.append('sku', document.getElementById('sku').value);
			fd.append('precio', document.getElementById('precio').value);
			fd.append('stock', document.getElementById('stock').value);
			fd.append('status', document.getElementById('status').value);
			fd.append('id_mar', document.getElementById('id_mar').value);
			fd.append('id_cat', document.getElementById('id_cat').value);
			fd.append('img', document.getElementById('img').files[0]);
			let request = new XMLHttpRequest();
			request.open('POST', 'api/Productos/agregarProd.php', true);
			request.onload=function(){
				if (request.readyState==4 && request.status==200) {
					let response=JSON.parse(request.responseText);
					//console.log(request);
					if (response.state) {
						(async () =>{
							await Swal.fire({
							  icon: 'success',
							  title: 'Agregado',
							  text: 'Producto agregado correctamente',
							  background: mainC,
							  color: negro1
							});
							window.location.reload();
						})();

					}else{
						Swal.fire({
							  icon: 'error',
							  title: 'Error',
							  text: (response.detail),
							  background: mainC,
							  color: negro1
							});
					}
				}
			}
			request.send(fd);
		}
		function editProd(id_prod){
			let fd = new FormData();
			fd.append('id_prod', id_prod);
			let request = new XMLHttpRequest();
			request.open('POST', 'api/Productos/get_Prod.php', true);
			request.onload = function(){
				if (request.readyState==4 && request.status==200) {
					let response=JSON.parse(request.responseText);
					//console.log(request);
					document.getElementById("id_prod").value=id_prod;
					document.getElementById('nombre-e').value=response.prod.nombre;
					document.getElementById('des-e').value=response.prod.des;
					document.getElementById('tMeta-e').value=response.prod.tMeta;
					document.getElementById('desMeta-e').value=response.prod.desMeta;
					document.getElementById('clave-e').value=response.prod.clave;
					document.getElementById('modelo-e').value=response.prod.modelo;
					document.getElementById('sku-e').value=response.prod.sku;
					document.getElementById('precio-e').value=response.prod.precio;
					document.getElementById('stock-e').value=response.prod.stock;
					document.getElementById('status-e').value=response.prod.status;
					document.getElementById('id_mar-e').value=response.prod.id_mar;
					document.getElementById('id_cat-e').value=response.prod.id_cat;
					document.getElementById('img-e').src=response.prod.img;
					showModal('modal-Edit');
				}
			}
			request.send(fd);			
		}
		function delateProd(id_prod){
			Swal.fire({
			  title: '??Seguro de eliminar?',
			  text: "Esto no se podra revertir, adem??s eliminara las dependencias",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, eliminar',
			  cancelButtonText: 'Cancelar',
			  background: mainC,
			  color: negro1
			}).then((result) => {
			  	if (result.isConfirmed) {
				    let fd = new FormData();
					fd.append('id_prod',id_prod);
					let request = new XMLHttpRequest();
					request.open('POST', 'api/Productos/delateProd.php', true);
					request.onload=function(){
						if (request.readyState==4 && request.status==200) {
							let response=JSON.parse(request.responseText);
							//console.log(request);
							if (response.state) {
								(async () =>{
									await Swal.fire({
									  icon: 'success',
									  title: 'Eliminado',
									  text: 'El producto se ha eliminado',
									  background: mainC,
									  color: negro1
									});
									window.location.reload();
								})();

							}else{
								Swal.fire({
									  icon: 'error',
									  title: 'Error',
									  text: (response.detail),
									  background: mainC,
									  color: negro1
									});
							}
						}
					}
					request.send(fd);			  
			   	}
			})	
		}
		function updateProd(){
			Swal.fire({
			  title: 'Confirmar',
			  text: "Se van a actualizar los datos",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Actualizar',
			  cancelButtonText: 'Cancelar',
			  background: mainC,
			  color: negro1
			}).then((result) => {
			  	if (result.isConfirmed) {
					let fd = new FormData();
  					fd.append('id_prod',document.getElementById('id_prod').value);
					fd.append('nombre-e', document.getElementById('nombre-e').value);
					fd.append('des-e', document.getElementById('des-e').value);
					fd.append('tMeta-e', document.getElementById('tMeta-e').value);
					fd.append('desMeta-e', document.getElementById('desMeta-e').value);
					fd.append('clave-e', document.getElementById('clave-e').value);
					fd.append('modelo-e', document.getElementById('modelo-e').value);
					fd.append('sku-e', document.getElementById('sku-e').value);
					fd.append('precio-e', document.getElementById('precio-e').value);
					fd.append('stock-e', document.getElementById('stock-e').value);
					fd.append('status-e', document.getElementById('status-e').value);
					fd.append('id_mar-e', document.getElementById('id_mar-e').value);
					fd.append('id_cat-e', document.getElementById('id_cat-e').value);
					fd.append('inputImg', document.getElementById('inputImg').files[0]);
					let request = new XMLHttpRequest();
					request.open('POST', 'api/Productos/editProd.php', true);
					request.onload=function(){
						if (request.readyState==4 && request.status==200) {
							let response=JSON.parse(request.responseText);
							//console.log(request);
							if (response.state) {
								(async () =>{
									await Swal.fire({
									  icon: 'success',
									  title: 'Actualizo',
									  text: 'Lo datos se actualizaron correctamente',
									  background: mainC,
									  color: negro1
									});
									window.location.reload();

								})();
							}else{
								Swal.fire({
									  icon: 'error',
									  title: 'Error',
									  text: (response.detail),
									  background: mainC,
									  color: negro1
									});
							}
						}
					}
					request.send(fd);
				}
			})
		}
	</script>
</body>
</html>

<!-- <?php
	date_default_timezone_set ('America/Mexico_City');
	echo strftime(date('Y')."-".date('m')."-".date('d')) ;
?> -->