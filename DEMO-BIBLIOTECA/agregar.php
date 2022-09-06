<?php

require('bibliotecaCON.php');

$link = $conexion;

if(!empty($_POST['clave']) && !empty($_POST['titulo']) && !empty($_POST['autor']) && 
!empty($_POST['editorial']) && !empty ($_POST['estand'])){

    $claves=$_POST['clave'];
    $verificar_clave=mysqli_query($link,"SELECT * FROM libros WHERE clave=$claves");

    if(mysqli_num_rows($verificar_clave)>0){

        echo"<script>
        alert('esta clave ya esta registrada');
        window.location.href='http://localhost/dashboard/Biblioteca2.5/agregar.html';
        </script>
        ";
        exit();
    }
    else{
        mysqli_query($link,"INSERT INTO libros VALUES ('{$_POST['clave']}','{$_POST['titulo']}','{$_POST['autor']}','{$_POST['editorial']}','{$_POST['estand']}','{$_POST['sinopsis']}')");

        echo"datos agregados";
    }
       
    
      

}
else{
    echo "Objeto no agregado"; 
    
}
?>