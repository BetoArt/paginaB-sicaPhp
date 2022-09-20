<?php

//Comprobamos si esta definida la sesión 'tiempo'.
    if(isset($_SESSION['tiempo']) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 360;//6 min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

            //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
            if($vida_session > $inactivo)
            {
                //Removemos sesión.
                session_unset();
                //Destruimos sesión.
                session_destroy();              
                //Redirigimos pagina.
                echo "Tu sesión expiró, volve a loguearte";
                header("refresh:3; url= /(0)pagina/login-usuarios-ok.php");
               // header("Location:  /(0)pagina/login-usuarios-ok.php");

                exit();
            }

    }
    $_SESSION['tiempo'] = time();