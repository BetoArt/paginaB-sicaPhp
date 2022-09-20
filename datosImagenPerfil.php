<?php
/*
// Curso PHP MySql. Subir imágenes al servidor. Vídeo 83 -> https://www.youtube.com/watch?v=X1gto0cBu0s

// Recibimos los datos de la imagen:
// (Para imagenes -> variable -array- superglobal $_FILES -> almacenamos: name, type, size, tmp_name -directorio temporal-, o error

$nombre_imagen = $_FILES ['imagen'] ['name'];
$tipo_imagen = $_FILES ['imagen'] ['type'];
$tamagno_imagen = $_FILES ['imagen'] ['size'];


// Ruta de la carpeta de destino en el servidor:

$carpeta_destino = $_SERVER ['DOCUMENT_ROOT'] . '/plantilla-perfil/uploads/';


// Movemos la imagen de la carpeta temporal al directorio escogido:

move_uploaded_file($_FILES ['imagen'] ['tmp_name'], $carpeta_destino.$nombre_imagen);


// Fin del video 83
************************************************************************************************************************* */

// Curso PHP MySql. Subir imágenes al servidor. Vídeo 84 -> https://www.youtube.com/watch?v=YAUGebI4-0U&t=1110s


// Recibimos los datos de la imagen:
// (Para imagenes -> variable -array- superglobal $_FILES -> almacenamos: name, type, size, tmp_name -directorio temporal-, o error

$nombre_imagen = $_FILES ['imagen'] ['name'];
$tipo_imagen = $_FILES ['imagen'] ['type'];
$tamagno_imagen = $_FILES ['imagen'] ['size'];

// echo $_FILES ['imagen'] ['size'];


        //el tamaño de la img (+- 1 mega)
if($tamagno_imagen <= 1000000){

    if($tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/png'|| $tipo_imagen == 'image/gif'){

// Ruta de la carpeta de destino en el servidor:

$carpeta_destino = $_SERVER ['DOCUMENT_ROOT'] . '/(0)Pagina/uploads/';


// Movemos la imagen de la carpeta temporal al directorio escogido:

move_uploaded_file($_FILES ['imagen'] ['tmp_name'], $carpeta_destino.$nombre_imagen);

    } else{
        echo "Solo se pueden subir imágenes jpeg, jpg, png ó gif";
    }

}else{
    echo "el tamaño es demasiado grande (el tamaño máximo es de 1 mega)";
}


// En la BD se almacena la ruta deesas imagenes 

// Él usa BD "pruebas" -> tabla "productos"
// Yo -> "bd-imgperfil" -> "usuarios"

// El usa el archivo datos_de_conexion.php que solo tiene -> host-usuario - clave y bd (no tiene -> $conexion = mysqli_connect) que yo tengo 
//en conexion . Yo solo debo agregar la consulta


require ("fx/conexion-foto.php");
include ("fx/validar.php");

//$sql = "INSERT INTO usuarios (foto) VALUES ('$nombre_imagen')"; // Aca inserto una imagen a la tabla
/******************************************************************************************************************************* */
$id = $_SESSION['user_id'];

/**************************************************************************************************************************** */

$sql = "UPDATE users SET foto = '$nombre_imagen' WHERE id = '$id'"; // Acá agrego una foto a un dato existente en la BD
//$_SESSION['user_id']
$resultado = mysqli_query($conexion, $sql);
echo "<br>";

//******************************************************************************************************


//**************************************************************************************** 

header("Location: /(0)pagina/perfiles.php");
//var_dump($resultado);

// Curso PHP MySql. Subir imágenes al servidor II. Vídeo 85 -> Leer la img -> https://www.youtube.com/watch?v=kaT8ADJB88k


?>