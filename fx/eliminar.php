<?php


include 'conexion-foto.php';
include 'validar.php';

echo "<br>";

$id = $_GET['id']; 
$querydelete = "DELETE FROM users WHERE id ='$id'"; 

$resultadoDelete = mysqli_query($conexion,$querydelete);  



 if($resultadoDelete){
    echo "El usuario se eliminó de manera correcta";
    header('refresh: 3; logout.php');  
    
}else{
    echo "Por un error inesperado, no se eliminó. Contáctese con soporte";
    header('refresh: 4; url = ../perfiles.php');  
}









?>