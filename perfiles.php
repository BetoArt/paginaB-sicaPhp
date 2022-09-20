<?php
include ("fx/conexion-foto.php");
include ("fx/validar.php");
include 'fx/validar-tiempo.php';

// *********************** Visualiza foto: *************************************

$id = $_SESSION['user_id'];

$consulta = "SELECT foto FROM users WHERE id ='$id'";

$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_array($resultado)){
    // Variable para reutilizar la foto
    $ruta_img = $fila ['foto'];   

} 

//--------------------------------------------DATOS IMG AVATAR----------------------------------------------------------

/*
 Agregue una columna extra con el nombre "AVATAR" y le asigne una imagen (que va a se la que aparece por defecto)a un usuario cualquiera
y tomo su id.. Debe haber 1 millón de mejores maneras :)... Si no cargan una img y la ejecutan les va a tirar:
Warning: Trying to access array offset on value of type null in xxxx \perfiles.php on line 34 (*).
La foto deben guardarla en la carpeta "uploads" (o en la carpeta que usen para tal fin)
*/

$consulta2 = "SELECT avatar FROM users WHERE id ='109'";

$resultado2 = mysqli_query($conexion, $consulta2);

$fila2 = mysqli_fetch_array($resultado2);
    // Variable para reutilizar la foto
    $ruta_img2 = $fila2 ['avatar'];  // (*)

/************************************************************************************************************ */

// Datos Visibles: (Nombre, Apellido, email)

$dato = mysqli_query( $conexion, "select * from users where id = '$id'");

$listado2022 = mysqli_fetch_array($dato);

/********************************************************************************************************** */
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
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Betoart</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="perfiles.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link" href="index1.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contacto</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Quienes somos</a></li>
                        <li class="nav-item"><a class="nav-link" href="fx/logout.php"> <!-- para que pueda salir de la página-->
        Salir
      </a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <form action="datosImagenPerfil.php" method="POST" enctype="multipart/form-data">
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">
                <div class="col-lg-7"><img style="width: 300px;" class="img-fluid rounded mb-4 mb-lg-0" src="/(0)Pagina/uploads/<?php
                if ($ruta_img != NULL){
                    echo $ruta_img; }else{ echo $fila2 ['avatar'];
                }
               ?>" /></div>

                <div class="col-lg-5">
                    <h1 class="font-weight-light"><?php echo $listado2022['nombre']; ?></h1>
                    <h1 class="font-weight-light"><?php echo $listado2022['apellido']; ?></h1>
                    <!--<a class="btn btn-primary" href="#!">Call to Action!</a>-->
                </div>
            </div>
            
            <!-- Call to Action-->
            <div class="card text-white bg-secondary  my-5 py-1 text-center">
                <div class="card-body "><p class="text-white m-0">

                    <center>
                        
                    <p><b>Cambiar imagen</b></p>

                        <table>
                        <tr>
                        <td> 
                            <label for="imagen"></label>
                        </td>
                        <td>
                            <input type="file" name="imagen" size="20">
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:center"><input type="submit" value="Subir imagen">
                        </td>
                        </tr>
                        </table>
                        
                        </form>
                    </center>

                </p></div>
            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Email</h2>
                            <h4 class="card-text"><?php echo $listado2022['email']; ?></h4>
                            </div>


                            <!------------------------------------- Eliminar Usuario ------------------------------->

                            <?php
      //include 'fx/conexion-foto.php'; -> No es necesario, ya que lo llamo al inicio del archivo

      // ELIMINAR

      $consultas1 = mysqli_query( $conexion, "select * from users where id = '$id'"); //EL $id LO TRAIGO DE LA LINEA 17
      ?>

<?php 
$eliminar = mysqli_fetch_array($consultas1);

?>
                       
<div class="card-footer"><a class="btn btn-danger btn-sm" href="fx/eliminar.php?id= <?php  echo $eliminar['id'];
 ?>">Eliminar usuario</a></div>


                            <!-------------------------------------------------------------------->
       
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body bg-info">
                            <center>
                            <p class="card-text ">Mantené tus datos actualizados</p>
                        </center>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Password</h2>
                            <p class="card-text">Actualizá tu clave</p>


          <!--------------------------Actualizar el Password ----- php ---------------------------------------------> 
          
          <form action="perfiles.php" method="post">

          <?php
   
  // Incluir archivo de configuración
  require_once "fx/conexion-foto.php";
   
  // Definir variables e inicializar con valores vacíos
  $new_password = $confirm_password = "";
  $new_password_err = $confirm_password_err = "";
   
  //Procesamiento de datos del formulario cuando se envía el formulario
  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      // Validar nueva contraseña
      if(empty(trim($_POST["new_password"]))){
          $new_password_err = "Por favor ingrese el nuevo password.";     
      } elseif(strlen(trim($_POST["new_password"])) < 6){
          $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
      } else{
          $new_password = trim($_POST["new_password"]);
      }
      
      // Validar confirm password
      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = "Por favor confirme la contraseña.";
      } else{
          $confirm_password = trim($_POST["confirm_password"]);
          if(empty($new_password_err) && ($new_password != $confirm_password)){
              $confirm_password_err = "Las contraseñas no coinciden.";
          }
      }
          
      // Verifique los errores de entrada antes de actualizar la base de datos
      if(empty($new_password_err) && empty($confirm_password_err)){
          // Preparar una declaración de actualización
          $sql = "UPDATE users SET password = ? WHERE id = ?";
          
          if($stmt = mysqli_prepare($conexion, $sql)){
              //Vincular variables a la declaración preparada como parámetros
              mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
              
              // Establecer parámetros
              $param_password = password_hash($new_password, PASSWORD_BCRYPT); //PASSWORD_DEFAULT
              $param_id = $_SESSION["user_id"];
              
              // Intento de ejecutar la declaración preparada
              if(mysqli_stmt_execute($stmt)){
                  echo "<b>Se modificó exitosamente su clave</b>";
              } else{
                  echo "<b>Algo salió mal, por favor vuelva a intentarlo</b>.";
              }
          }
          
          // Cerrar declaración
          mysqli_stmt_close($stmt);
      }
      
      // Cerrar conexion
      mysqli_close($conexion);
  }
  ?>


          <!------------------------------------ Fin Actualizar el Password ----- php -------------------------------------------------->
        

<div class="row g-3 align-items-center">
  <div class="col-auto ">
    <label for="inputPassword6" class="col-form-label">(1)</label>
  </div>
  <div class="col-auto <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
    <input type="password" name="new_password" id="inputPassword1" class="form-control" value="<?php echo $new_password; ?>" placeholder="Ingresá la nueva clave" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-mb-2">
  <span class="help-block"><?php echo $new_password_err; ?></span>
  </div>
</div>

<div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">(2)</label>
  </div>
  <div class="col-auto <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
    <input type="password" name="confirm_password" id="inputPassword2" class="form-control" placeholder="Confirmar clave" aria-describedby="passwordHelpInline">
  </div>
  <div class="colcol-mb-2">
  <span class="help-block"><?php echo $confirm_password_err; ?></span>
  </div>
</div>

        <!------------------------------------------------------------------------------------------->


                        </div>
                        <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <a class="btn btn-link" href="index1.php">Cancelar</a>
            </div>
                    </div>
                </div>
            </div>
        </div>
</form>
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