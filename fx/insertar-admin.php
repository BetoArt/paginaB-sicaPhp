<?php
include 'conexion-admin.php';
//include 'header.html';
//echo "jugando con otros archivos";


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$foto =$_POST['foto'];
//$password =$_POST['password'];
$password = password_hash($_POST['password'] , PASSWORD_BCRYPT);
$sqlinsert = "INSERT INTO users (id, nombre, apellido, email, foto, password) VALUES (NULL,'$nombre','$apellido','$email','$foto', '$password')";

$insert = mysqli_query($conexion,$sqlinsert);


if($insert){
    echo "Se agregó correctamente el usuario";
}else{
    echo "Error inesperado. Vuelva a ingresar los datos";  
}

header('refresh: 3; url = ../altas-bajas-modif.php');  


//include 'main.php';
//include 'footer.html';

// require 'footer.html';

// require 'main.php';

//ABM
//Registro: altas 70%
//Eliminar: 70%
//Editar: 70%
//Consultas: ok 70%

?>