<?php
error_reporting(0);
   session_start();
        $loguin=$_SESSION ["loguin"]; // tengo que poner el includo arriba de los html en archivo "inicio.php" *
        if ($loguin!="ok" || $_SESSION ["user_id"]) {           // * viene de archivo loguin1.php de "header("location:inicio.php");"
            header("location:index1.php");
        }
        
?>
