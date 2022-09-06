<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros Borrados</title>
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
    <div class="text">Libros borrados</div>
    <div class="formulario">

      <div class="contenidoformulario">
        <div class="izquierda">
           <form method="post">    
    <table border="5">
            <h2>Tabla de libros eliminados</h2> 
             <input type="submit" name="borrar" value="Eliminar caché" class="botonagregar">
            <tr class="trcabeza">
              <th>Clave</th><th>Titulo</th><th>Autor</th><th>Editorial</th><th>Estand</th><th>Sinopsis</th><th>Seleccionar</th>
            </tr>

            <?php
            //VER LA TABLA COMPLETA     
            require('bibliotecaCON.php');

            $link = $conexion;
           
            $resultado=mysqli_query($link,"select * from cahce");
        
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
               
                
                    mysqli_query($link,"DELETE FROM cahce where clave=$clave_borrar");
                   
                    echo"<script>
        
                    window.location.href='http://localhost/dashboard/Biblioteca2.5/borrados.php';
                    </script>
                    ";
              }

            }
                
          ?>
          </form>
          </div>


    <div class="derecha">
      <form method="post">
      <table border="5">
      <h2>Tabla de devoluciones</h2>
      <input type="submit" name="devolucion1" value="Eliminar devoluciones" class="botonagregar">
            <tr class="trcabeza">
              <th>Clave</th><th>Libro</th><th>Nombre</th><th>Matricula</th><th>Grupo</th><th>Turno</th><th>Prestamo</th><th>Devolucion</th><th>Seleccionar</th>
            </tr>

            <?php
            //VER LA TABLA COMPLETA    
              $link=mysqli_connect("localhost","root","","biblioteca");
              $resultado=mysqli_query($link,"select * from devolucion");

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
               
                
                    mysqli_query($link,"DELETE FROM devolucion where matricula=$clave_matricula");
                   
                    echo"<script>
        
                    window.location.href='http://localhost/dashboard/Biblioteca2.5/borrados.php';
                    </script>
                    ";
                    exit();
                   
                   
                  }

              }

            }
       
                   
        ?>
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