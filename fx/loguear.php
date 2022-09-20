<?php
session_start();  //Comienzo con la sesion
include 'conexion-admin.php';


$usuario = $_POST['email'];
$clave = $_POST['password'];

//           count -> para contar cuantas filas existen y que coincidan con la busqueda que vamos a hacer // "usuarios" = tabla
$q = "SELECT COUNT(*) as contar from administrador where email = '$usuario' and password = '$clave'";

// Creamos la var $consulta:

$consulta = mysqli_query($conexion, $q);

//Guardo todos los datos que trae en un array:
$array = mysqli_fetch_array($consulta);


    if($array['contar']==1) {
        header ("location:../admin-error.php");
        
    } else {
   /* echo "DATOS INCORRECTOS";*/
   session_start();
        $_SESSION ["loguin"]="ok";
        header("location: ../altas-bajas-modif.php");
}
