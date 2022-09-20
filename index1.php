<?php

  session_start();

  require 'fx/conexion.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id'); // Prepare -> lo unico que hace es una consulta
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC); // hasta aqui obtengo todos los datos del usuario de la bd

    $user = null; // Para almacenarlo (a el if de abajo) inicializo $user en nulo xq no tiene datos

    if (count($results) > 0) { // Compruebo que los datos que estoy tratando de obtener existen (que no este vacio)
      $user = $results; // Acá lo lleno con los resultados obtenidos
    }
  }

  include 'fx/validar-tiempo.php';
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Página Usuarios</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="iconos/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/cienx.css" rel="stylesheet" />
        
    </head>

    <body>

       <!-- Responsive navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Betoart</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#!">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="perfiles.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Quienes somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="fx/logout.php"> <!-- para que pueda salir de la página-->
        Salir
      </a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <main>
        <div id="container">

        <center>
          
          <br>
        <?php require 'partials/header.php' ?>

        

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['email']; /* "bienvenido, y el nombre del usuario*/?>
      <br>Te logueaste de manera satisfactoria
      <br>
      <br>
       
    <?php else:  /*con esto, hago que lo muestre si no estoy logueado. En caso de estar logueado, que muestre datos del usuario*/?>
      <h1>Por favor, inicia sesión o registrate</h1>

      <a href="loginU-soloFormulario.php">Login</a> or
      <a href="registro-usuarios.php">SignUp</a>
    <?php endif; ?>

    


    </center>

        </div>
        </main>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
            <div class="container px-4 px-lg-5"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>