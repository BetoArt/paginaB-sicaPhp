<?php
  session_start();

  session_unset(); // Con esta la termino

  session_destroy(); // Aqui la destruyo

  header('Location: /(0)Pagina/login-usuarios-ok.php');  // Redirecciono
?>
