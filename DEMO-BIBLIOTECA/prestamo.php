<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestar libros</title>
    <link rel="stylesheet" href="estilo.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="estilogrl.css">
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
                            <i class='bx bx-home-alt icon'></i>
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

    <section class="home">
    <div class="text">Prestamo</div>
        <div class="formulario">
        
            <div class="contenidoformulario">
            <div class="izquierda">
              <h2>Registrar datos</h2>
            <form  name="f" action="prestar.php" method="post">
            
            <input type="text" name="claves" id="" class="inputtext" placeholder="Clave del libro">
            <br>
            
            <input type="text" name="libros" id="" class="inputtext" placeholder="Nombre del libro">
            <br>
            
            <input type="text" name="alumno" id="" class="inputtext" placeholder="Alumno a prestar">
            <br>
            <input type="text" name="matricula" id="" class="inputtext" placeholder="Matricula de alumno (solo digitos)">
            <br>
            
            <input type="text" name="grupo" id="" class="inputtext" placeholder="Grupo">
            <br>
            
            <select name="turno" id="" class="inputtext" placeholder="Turno" value="Turno">
            <option>Turno</option>  
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
            </select>
            <br>
            Fecha de prestamo
            <input type="date" name="prestamo" id="" class="inputtext" value="Fecha de prestamo">
            <br>
            Fecha de devolucion
            <input type="date" name="devolucion" id="" class="inputtext" placeholder="Fecha de devolucion">
            <br>
            <button type="submit"  name="prestar"  value="Prestar" class="botonagregar">Prestar</button>
            </form>
            </div>

            
            <div class="derecha">
              <br><br>
              <form method="post">
              <h2>Busqueda de prestamos</h2>
              
              <input type="text" name="busqueda" class="inputtext" placeholder="Ingrese la matricula del alumno">
              <input type="submit" name="buscar" class="botonagregar">
              <input type="submit" name="devolucion1" value="Devolver" class="botonagregar">
              
      <table border="5">
            <tr class="trcabeza">
              <th>Clave</th><th>Libro</th><th>Nombre</th><th>Matricula</th><th>Grupo</th><th>Turno</th><th>Prestamo</th><th>Devolucion</th><th>Seleccionar</th>
            </tr>
            
            <?php
            //BUSQUEDA EN LA TABLA
            require('bibliotecaCON.php');

            $link2 = $conexion;
            
            if(isset($_POST['buscar']))
            {
              $busqueda=$_POST['busqueda'];
              $resultado2=mysqli_query($link2,"select * from prestamo where matricula='$busqueda'");
              $NUMERO2=mysqli_num_rows($resultado2);
              if($NUMERO2>=1)
              {
                while($mostrar2 = mysqli_fetch_array($resultado2))
                {
                   echo "<tr><td>".$mostrar2['clave']; 
                   echo "</td><td>".$mostrar2['libro']."</td>";
                   echo "<td>".$mostrar2['nombre']."</td>";
                   echo "<td>".$mostrar2['matricula']."</td>";
                   echo "<td>".$mostrar2['grupo']."</td>";
                   echo "<td>".$mostrar2['turno']."</td>";
                   echo "<td>".$mostrar2['prestamo']."</td>";
                   echo "<td>".$mostrar2['devolucion']."</td>";
                   echo "<td><input type='checkbox' name='devolver[]' value='".$mostrar2['matricula']."'></td></tr>";

                }

              }
              else{
                echo"<h3>no se ha encontrado el pestamo verifica que la matricula del alumno sea correcta</h3>";
              }
            }
          
        ?>


        <?php
            //VER LA TABLA COMPLETA    
              $link=mysqli_connect("localhost","root","","biblioteca");
              $resultado=mysqli_query($link,"select * from prestamo");

                while($mostrar=mysqli_fetch_array ($resultado))
                {
                  echo "<tr><td>".$mostrar['clave']; 
                  echo "</td><td>".$mostrar['libro']."</td>";
                  echo "<td>".$mostrar['nombre']."</td>";
                  echo "<td>".$mostrar['matricula']."</td>";
                  echo "<td>".$mostrar['grupo']."</td>";
                  echo "<td>".$mostrar['turno']."</td>";
                  echo "<td>".$mostrar['prestamo']."</td>";
                  echo "<td>".$mostrar['devolucion']."</td>";
                  echo "<td><input type='checkbox' name='devolver[]' value='".$mostrar['matricula']."'></td></tr>";

                }

        ?>  
      </table>
      <?php
            //PASAR DATOS DE UNA TABLA A OTRA Y ELIMINAR LOS DATOS DE LA TABLA PRINCIPAL
          if(isset($_POST['devolucion1']))
          {

            if(empty($_POST['devolver']))
            {
              echo"NO SE HAN SELECCIONADO REGISTROS";
            }
            else
            {

              foreach($_POST['devolver'] as $clave_matricula)
              {
               
                $resultado1=mysqli_query($link,"INSERT INTO devolucion (clave,libro,nombre,matricula,grupo,turno,prestamo,devolucion)SELECT clave,libro,nombre,matricula,grupo,turno,prestamo,devolucion FROM prestamo where matricula=$clave_matricula");
                
                  if($resultado1==true){  
                    mysqli_query($link,"DELETE FROM prestamo where matricula=$clave_matricula");
                   
                    
                    echo"el libro fue devuelto favor de verificar que sea el libro que presto";
                    echo"<script>
        
        window.location.href='http://localhost/dashboard/Biblioteca2.5/prestamo.php';
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
