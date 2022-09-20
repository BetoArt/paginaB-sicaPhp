<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: index1.php');  //Este condicional, lo que dice es que si el usuario ya esta registrado, pedirle que
  }                                             // no me muestre otra vez el login, sino que me desvie otra vez a la pag. ppal (en este caso
  require 'fx/conexion.php';                       // index1.php)

  if (!empty($_POST['email']) && !empty($_POST['password'])) { // Si no esta vacio el mail y la contraseña, vamos a poder hacer la consulta a la BD
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');  //De esta manera obtengo los datos de la bd ("prepare" es para la consulta)
    // Obtengo el parametro y lo vinculo (bindParam)
    $records->bindParam(':email', $_POST['email']);
    // Ejecuto la consulta
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';


    // Si la respuesta es mayor a 0 (no esta vacia) -> verificamos la contraseña --> La que me da el usuario, y la que esta en la BD
    if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id']; // Lo signa en memoria -> almaceno el user_id que viene de $results, y de estos, solo su "id"
      header("Location: /(0)Pagina/index1.php");
    } else {
     
      $message = 'Email o password incorrectos. Volvé a intentarlo';
    }
  }


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
    <link rel="stylesheet" href="css/recuperar.css">

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
              <span class="padding-bottom--15">Iniciar sesión</span>

              <!------------------------------ Formulario ---------------------------------------->

              <form id="stripe-login" action="login-usuarios-ok.php" method="POST">

                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="email">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                    <div class="reset-pass">
                    <div class="checkboxvai"><a onclick="abrirform()">Recuperar contraseña</a></div>
                    </div>
                  </div>
                  <input type="password" name="password">
                </div>

                <div class="field">
                <?php if(!empty($message)): ?>
                  <p><b><?= $message ?></b></p>
                  <?php endif;?>
                </div>

                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Iniciar Sesión">
                </div>
                
              </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>¿No tenés una cuenta? <a href="registro-usuarios.php">Registrate</a></span>
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

  <script>
		
		function abrirform() {
  document.getElementById("formrecuperar").style.display = "block";
  
}

function cancelarform() {
  document.getElementById("formrecuperar").style.display = "none";
}
    </script>

    
<div class="caja_popup" id="formrecuperar">
  <form action="fx/recuperar.php" class="contenedor_popup" method="POST">
        <table>
		<tr><th colspan="2">Recuperar contraseña</th></tr>
            <tr> 
                <td><b>&#128231; Correo</b></td>
                <td><input type="email" name="txtcorreo" required class="cajaentradatexto"></td>
            </tr>
            <tr> 	
               <td colspan="2">
				   <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
				   <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
			</td>
            </tr>
        </table>
    </form>
	</div>


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



