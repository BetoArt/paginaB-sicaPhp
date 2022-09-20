<?php

include 'conexion-admin.php';

$id = $_GET ['id']; 
//var_dump($_GET);

echo "<br>";


$nombre = $_GET['nombre'];

$apellido = $_GET['apellido'];

$email = $_GET['email'];

$foto = $_GET['foto'];






$queryUpdate = "UPDATE users SET nombre='$nombre', apellido='$apellido', email='$email', foto='$foto' WHERE id ='$id'";


$resultadoUpdate = mysqli_query($conexion,$queryUpdate);
echo "<br>";


echo "<br>";

if($resultadoUpdate){
    echo "Se Actualizo de forma correcta";
}else{
    echo "NO SE Actualizo de forma correcta....!!!!";
}

header('refresh: 3; url = ../altas-bajas-modif.php');  

?>