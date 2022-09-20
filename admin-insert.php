<?php
include ("fx/validarAdmin.php");

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear Registro (Administrador) </title>
    <!-- Favicon-->
   <link rel="icon" type="image/x-icon" href="iconos/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/cienx.css" rel="stylesheet" />

        <style>
          html, body 
{ 
 height: 100%;
 overflow-x: hidden
}
        </style>
        
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

   <main>
    <div id="main" class="card card-body border-0 ">


         <div class="mt-5"></div>

      <div class="conoce-oradores">
       <center>
        <h2>ADMINISTRADOR - Crear</h2>
       </center>
      </div>
      <div class="mt-5"></div>


      <!-- FORMULARIO-->

      <form action="fx/insertar-admin.php" method="POST">
        <div id="fb">

        <div class="row col-8">
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Nombre" id="validationCustom01" required aria-label="Nombre" id="nombre" name="nombre">
          </div>
          <div class="col-6">
            <input type="text" class="form-control" placeholder="Apellido" id="validationCustom01" required aria-label="Apellido" id="apellido" name="apellido">
          </div>
        </div>
      </div>

      <div id="fb">
        <div class="row col-8">
        <div class="col-12">
            <div class="mt-3"></div>
            <input type="email" class="form-control" id="floatingInput" placeholder="Correo" id="validationCustom01" required aria-label="Correo" id="email" name="email">
                </div>
                </div>
              </div>

              <div id="fb">
                <div class="row col-8">
                <div class="col-12">
                    <div class="mt-3"></div>
                    <input type="text" class="form-control" id="floatingInput" placeholder="Foto" id="validationCustom01" required aria-label="foto"  id="foto" name="foto">
                        </div>
                        </div>
                      </div>

                      <div id="fb">
                <div class="row col-8">
                <div class="col-12">
                    <div class="mt-3"></div>
                    <input type="text" class="form-control" id="floatingInput" placeholder="password provisorio (Se recomienda ´123456´)" id="validationCustom01" required aria-label="pass"  id="pass" name="password">
                        </div>
                        </div>
                      </div>

                     


              <div class="mt-3"></div>

              <!--Cantidad - categoria-->

              <div id="fb">
                <div class="row">
                <div class="col-12">
              <div class="mt-4"> </div>
                
              

                <div class="mt-4"></div>
               
              <button type="submit" class=" btn btn-success btn-lg">Enviar</button>
              <button onclick="location.href='altas-bajas-modif.php'" class=" btn btn-success btn-lg">Cancelar</button>
            </div> 
            </div>
            </div>

            
            </form>

             <!-- FIN FORMULARIO-->
               
                </div>
                
                
                <div class="mt-5"></div>
                
    </main>      
    </div>

     <!-- Footer-->

     <footer>
 <div  class="conteiner">
 <div class="row">


 
	
			<div class="col-md-10 col-md-offset-2">
				<div>
					<div class=" d-flex justify-content-between align-items-center">
          &nbsp;
          <a href="altas-bajas-modif.php" class="btn btn-primary" role="button">Volver &nbsp; <img src= "Imagenes/volver.png" title= "Volver" /></a>
            
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>
    



      


      <script src=""></script>

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