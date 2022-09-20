<?php

session_start();
if (empty($_SESSION['user_id'])) {
  // validaremos si dentro de la sesión existe username, si no existe, redireccionaremos al usuario a login-usuarios-ok.php, con una 
  //redirección 301 (Redirección permanente):
    header("Location: /(0)pagina/login-usuarios-ok.php", true, 301);

    // Es importante el die() para detener la ejecución del script si el usuario no está logeado y prevenir error_log
    die();
}
?>


