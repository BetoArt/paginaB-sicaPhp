<?php
  require 'fx/conexion.php';
// No mostrar los errores de PHP
error_reporting(0);

$correo = $_POST ['email'];

  $message = ''; // Dejo la variable vacia. Se va a completar según la condición que se cumpla

  if(!empty($_POST['password']) && !empty($_POST['confirm_password'] && $_POST['password'] != $_POST['confirm_password'] )){
    
    $message = 'Lo sentimos, hubo un problema al crear su cuenta';

  
  }else{ 

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'] )) { 
   

    $conteo = mysqli_num_rows(mysqli_query(mysqli_connect($server,$username, $password, $database), "SELECT * FROM users WHERE email ='$correo'"));
//var_dump($conteo);
if($conteo === 1) {

$message = 'El mail ya esta registrado. Vuelva a intentarlo o <a href="login-usuarios-ok.php">Inicia Sesión</a>';

} elseif(strlen(trim($_POST["password"])) < 6){
  $message = "La contraseña debe tener al menos 6 caracteres.";

}else{
  
    $sql = "INSERT INTO users (nombre, apellido, email, password) VALUES (:nombre, :apellido, :email, :password)"; 
    

    $stmt = $conn->prepare($sql); // El metodo "prepare" lo que hace es realizar la consulta de $sql 
  
    //Vinculo el mail y es password ingresado mediante "bindParam" (vincular parametros)
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);

    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'] , PASSWORD_BCRYPT); // Encripto la clave
    $stmt->bindParam(':password', $password); //Traigo es password cifrado en $password


    /* $sentencia->execute() ---> Ejecuta una consulta que ha sido previamente preparada usando la función mysqli_prepare(). 
    Cuando se ejecutó cualquier marcador de parámetro que existe, será automáticamente reemplazado con los datos apropiados.*/
   
    if ($stmt->execute()) {
     
      
      $message = 'Usuario creado exitosamente'. ' <a href="login-usuarios-ok.php">Inicia Sesión</a>'; // viene de arriba el mensaje vacio ($message)
    } else {
      $message = 'Lo sentimos, hubo un problema al crear su cuenta';
    }}  }}
    
  //************************************************************************************************************************************ */
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

    <title>Página usuarios</title>
    <link rel="stylesheet" href="css/estilo1.css">

  </head>
  <body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="# rel="dofollow">Betoart</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Registrate</span>

              <!-- Formulario (envio a loguear-registro.php)-->

              <form id="stripe-login" action="registro-usuarios.php" method="POST">

                <div class="field padding-bottom--24">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre">
                </div>
                <div class="field padding-bottom--24">
                  <label for="apellido">Apellido</label>
                  <input type="text" name="apellido">
                </div>
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password">
                </div>
                <!-- Repeti el pass-->

                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Confirmá el Password</label>
                  </div>
                  <input type="password" name="confirm_password">
                </div>

                <div class="field">
                <?php if(!empty($message)): ?>
                  <p><b><?= $message ?></b></p>
                  <?php endif; ?>
                </div>
                

                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Registrate">
                </div>
                
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>¿Ya tenés una cuenta? <a href="login-usuarios-ok.php">Inicia Sesión</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">© Betoart</a></span>
              <span><a href="#">Contacto</a></span>
              <span><a href="#">Terminos y condiciones</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
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