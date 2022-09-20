<?php

include 'conexion-admin.php';

echo "<br>";

$id = $_GET ['id']; 
$querydelete = "DELETE FROM users WHERE id=$id"; 

$resultadoDelete = mysqli_query($conexion,$querydelete);  



 if($resultadoDelete){
    echo "Se eliminó de forma correcta";
}else{
    echo "por un problema X no se elimino";  
}

header('refresh: 3; url = ../altas-bajas-modif.php');  

// REDIRECCIONAR SIN ESPERA:

//header('location: https:// betoart.com.ar');





?>