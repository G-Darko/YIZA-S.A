<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventario</title>
  <link rel="stylesheet" href="estilo.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="estilogrl.css">
	 <style>
      table, td {
        border:1px solid black;
      }
      table {
        width:50%;
      }
      td {
        padding:5px;
      }
    </style>
</head>

<body>
  <nav class="sidebar close">
      <header>
          <div class="image-text">
              <span class="image">
                  <img src="imagenes/cecytem.png">
              </span>

              <div class="text logo-text">
                  <span class="name">Biblioteca</span>
                  <span class="profession">Para CECyTEM</span>
              </div>
          </div>

          <i class='bx bx-chevron-right toggle'></i>
      </header>

      <div class="menu-bar">
          <div class="menu">
              <ul class="menu-links">
                  <li class="nav-link">
                      <a href="index.html">
                          <i class='bx bx-home-alt icon' ></i>
                          <span class="text nav-text">Inicio</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="inventario.php">
                          <i class='bx bx-library icon'></i>
                          <span class="text nav-text">Inventario</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="agregar.html">
                        <i class='bx bxs-book-add icon'></i>
                          <span class="text nav-text">Añadir libros</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="prestamo.php">
                        <i class='bx bxs-cart-add icon' ></i>
                          <span class="text nav-text">Prestar libros</span>
                      </a>
                  </li>

                  <li class="nav-link">
                      <a href="borrados.php">
                        <i class='bx bxs-folder-minus icon'></i>
                          <span class="text nav-text">Libros borrados</span>
                      </a>
                  </li>

                  <li class="nav-link">
                        <a href="acercade.html">
                          <i class='bx bx-question-mark icon'></i>
                            <span class="text nav-text">Acerca de</span>
                        </a>
                    </li>

              </ul>
          </div>

          <div class="bottom-content">               
          </div>
      </div>

  </nav>

  <div class="home">
      <div class="text">Inventario</div>
      <div class="formulario">
      <div class="contenidoformulario2">
          <div class="TABLA">          
              <h1>LIBROS</h1>
              <br><br>
              <form method="post">
                <center>
              <h2>Buscar el titulo del libro</h2>
              </center>
              <input type="text" name="busqueda" class="inputtext" placeholder="Ingresa el titulo del libro">
              <input type="submit" name="buscar" class="botonagregar">
              <input type="submit" name="borrar" value="Eliminar" class="botonagregar">
          <table border="5">
            <center>
            <tr class="trcabeza">
              <th>Clave</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Estand</th><th>Sinopsis</th><th>Seleccionar</th>
            </tr>
           

        <?php
         //BUSQUEDA EN LA TABLA
         require('bibliotecaCON.php');

            $link = $conexion;
            
          if(isset($_POST['buscar']))
          {
           $busqueda=$_POST['busqueda'];
           $resultado2=mysqli_query($link2,"select * from libros where titulo='$busqueda'");
           $NUMERO2=mysqli_num_rows($resultado2);
            if($NUMERO2>=1)
            {
             while($mostrar2= mysqli_fetch_array($resultado2))
             {
              echo "<tr><td>".$mostrar2['clave']; 
              echo "</td><td>".$mostrar2['titulo']."</td>";
              echo "<td>".$mostrar2['autor']."</td>";
              echo "<td>".$mostrar2['editorial']."</td>";
              echo "<td>".$mostrar2['estand']."</td>";
              echo "<td>".$mostrar2['sinopsis']."</td>";
              echo "<td><input type='checkbox' name='eliminar[]' value='".$mostrar2['clave']."'></td></tr>";

             }

            }
            else{
              echo"<h3>no se ha encontrado el libro verifica que el titulo sea correcto</h3>";
            }
          }
         
        ?>



            <?php
            //VER LA TABLA COMPLETA     
            $link=mysqli_connect("localhost","root","","biblioteca");
           
            $resultado=mysqli_query($link,"select * from libros");
        
            while($mostrar=mysqli_fetch_array ($resultado))
            {
                echo "<tr><td>".$mostrar['clave']; 
                echo "</td><td>".$mostrar['titulo']."</td>";
                echo "<td>".$mostrar['autor']."</td>";
                echo "<td>".$mostrar['editorial']."</td>";
                echo "<td>".$mostrar['estand']."</td>";
                echo "<td>".$mostrar['sinopsis']."</td>";
                echo "<td><input type='checkbox' name='eliminar[]' value='".$mostrar['clave']."'></td></tr>";

            }
           
            ?>
          </table>
          <?php
          //PASAR DATOS DE UNA TABLA A OTRA Y ELIMINAR LOS DATOS DE LA TABLA PRINCIPAL
          if(isset($_POST['borrar']))
          {

            if(empty($_POST['eliminar']))
            {
              echo"NO SE HAN SELECCIONADO REGISTROS";
            }
            else
            {

              foreach($_POST['eliminar'] as $clave_borrar)
              {
               
                $resultado1=mysqli_query($link,"INSERT INTO cahce (clave,titulo,autor,editorial,estand,sinopsis)SELECT clave,titulo,autor,editorial,estand,sinopsis FROM libros where clave=$clave_borrar");
                
                  if($resultado1==true){  
                    mysqli_query($link,"DELETE FROM libros where clave=$clave_borrar");
                    echo"<script>
        
        window.location.href='http://localhost/dashboard/Biblioteca2.5/inventario.php';
        </script>
        ";
        exit();
                   
                  }

              }

            }
       
          }          
          ?>

          </center>
          </form>
        </div>
      </div>
      </div>
  </section>

 
  <script>
  const body = document.querySelector('body'),
  sidebar = body.querySelector('nav'),
  toggle = body.querySelector(".toggle"),
  searchBtn = body.querySelector(".search-box"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
sidebar.classList.remove("close");
})

</script>

</body>
</html>