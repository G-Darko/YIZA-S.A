<?php
    require('bibliotecaCON.php');

$link = $conexion;

if(!empty($_POST['claves']) && !empty($_POST['libros'])&& !empty($_POST['alumno']) && !empty($_POST['matricula']) && !empty($_POST['grupo']) && 
!empty($_POST['turno']) && !empty ($_POST['prestamo'])&& !empty($_POST['devolucion'])){

    $CLAVES=$_POST['claves'];  
    $resultado1=mysqli_query($link,"select clave from libros where clave='$CLAVES'");
    $NUMERO=mysqli_num_rows($resultado1);  

      if($NUMERO>=1){
         
         $res= mysqli_query($link,"select clave from prestamo where clave='$CLAVES'");

         if(mysqli_num_rows($res)==0){

        $clave = $_POST['claves'];
        $libros = $_POST['libros'];
        $alumno = $_POST['alumno'];
        $matricula = $_POST['matricula'];
        $grupo = $_POST['grupo'];
        $turno = $_POST['turno'];
        $prestamo = $_POST['prestamo'];
        $devolucion = $_POST['devolucion'];

       mysqli_query($link,"INSERT INTO prestamo VALUES ('$clave','$libros','$alumno','$matricula','$grupo','$turno','$prestamo','$devolucion')");
       echo"<script>
        
        window.location.href='prestamo.php';
        </script>
        ";
        exit();

         }
         else
         echo "EL LIBRO YA FUE PRESTADO ELIJA OTRO LIBRO CON UNA CLAVE DIFERENTE"; 
      }
    else{

       echo "EL LIBRO NO SE ENCUENTRA EN EL INVENTARIO VERIFICA LA CLAVE DEL LIBRO"; 
        
    }
    
}
else{
     echo "PRESTAMO IMCOMPLETO ES REQUERIBLE LLENAR TODOS LOS CAMPOS DEL FORMULARIO";
}
?>