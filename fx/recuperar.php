<?php

include '../controladores/generaPass.php';
        
try{
	if(isset($_POST['txtcorreo']) && !empty($_POST['txtcorreo'])){
		$pass = generaPassword();
		$claveEncriptada= password_hash($pass, PASSWORD_BCRYPT);
		$mail = $_POST['txtcorreo'];
		
		//Conexion con la base
		$conn = new mysqli("localhost", "root", "", "php_login_database");
		// Chequeo conexión
		if ($conn->connect_error) {
			die("Falló la conexión: " . $conn->connect_error);
		} 
		
		$sql = "Update users Set password='$claveEncriptada' Where email='$mail'";

		if ($conn->query($sql) === TRUE) {
			echo "usuario modificado correctamente ";
		} else {
			echo "Error modificando: " . $conn->error;
		}
		
		$to = $_POST['txtcorreo'];//"a donde...";
		$from = "From: " . "betoloker@gmail.com" ;
		$subject = "Recordar contraseña";
		$message = "El sistema le asigno la siguiente clave " . $pass;

		mail($to, $subject, $message, $from);
		echo 'Correo enviado satisfactoriamente a ' . $_POST['txtcorreo'];
		header( "refresh:4; ../login-usuarios-ok.php");
	}
	else 
		echo 'Ups ... Algo falló';
		header( "refresh:4; ../login-usuarios-ok.php");
}
catch (Exception $e) {
	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>