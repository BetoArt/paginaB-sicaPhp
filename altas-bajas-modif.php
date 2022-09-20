<?php
include ("fx/validarAdmin.php");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Principal ADMINISTRADOR</title>
  
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
                 <li class="nav-item"><a class="nav-link active" href="altas-bajas-modif.php">Inicio</a></li>
                 <li class="nav-item"><a class="nav-link" href="#!">Contacto</a></li>
                 <li class="nav-item"><a class="nav-link" href="fx/logout.php"> <!-- para que pueda salir de la página-->
 Salir
</a></li>
             </ul>
         </div>
     </div>
 </nav>
      <!--Fin botones nav-->
      


      <!--INICIO MAIN-->

      <?php
      include 'fx/conexion-admin.php';

      //Consultas.. basicas
      $consultas = mysqli_query( $conexion, "select * from users");

      ?>

   <main>
    <div id="main" class="card card-body border-0 ">


         <div class="mt-5"></div>

      <div class="conoce-oradores">
       <center>
        <h2>ADMINISTRADOR</h2>
       </center>
      </div>
      <div class="mt-5"></div>


      <!-- FORMULARIO-->

      <h1>Usuarios Registrados</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Mail</th>
      <th scope="col">Foto</th>
      <th scope="col">Password</th>
      <th scope="col">Editar</th>
      <th scope="col">Borrar</th> 
    
    </tr>
  </thead>

  <tbody>

    <?php while( $listado2022 = mysqli_fetch_array($consultas)) { ?> 
    <tr>
      <th scope="row"> <?php echo $listado2022['id']; ?> </th>   
      <th scope="row"> <?php echo $listado2022['nombre']; ?> </th> 
      <th scope="row"> <?php echo $listado2022['apellido']; ?> </th> 
      <th scope="row"> <?php echo $listado2022['email']; ?> </th>
      <th scope="row"> <?php echo $listado2022['foto']; ?> </th>
      <th scope="row"> <?php echo $listado2022['password']; ?> </th> 
      <th scope="row"> <a href="admin-act.php?id= <?php echo $listado2022['id']; ?>"><img src= "Imagenes/editar.png" title= "editar" /></th>
      <th scope="row"> <a href="fx/eliminarAdmin.php?id= <?php echo $listado2022['id']; ?>" onclick="return ConfirmDelete()"><img src= "Imagenes/eliminar.png" title= "eliminar" /></th>
       
      
    </tr>
   <?php } ?>

  </tbody>
</table>

             <!-- FIN FORMULARIO 1-->
      
               
    </div>

    <div class="container">
      <center>
            <!-- CREAR -->
      <h4> Si desea ingresar un nuevo usuario ->  <a href="admin-insert.php" class="btn btn-success" role="button">Crear <img src= "Imagenes/agregar.png" title= "Insertar" /></a></h4>
      </center>
    </div>
 
    </main>

<!-- FIN FORMULARIO Crear-->

<!-- FOOTER - Salir -->

</div>
<footer>
 <div  class="conteiner">
 <div class="row">


 
	

</div>



</div>
<div class="mt-3"></div>
</footer>



      <script src="js/confirmar-eliminar.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>