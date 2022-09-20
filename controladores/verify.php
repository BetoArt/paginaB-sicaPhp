<?php

echo "ESCRIBO EL PASSWORD A ENCRIPTAR:";
echo "<br>";
echo "24681012";
echo "<br>";
  
echo password_hash("24681012", PASSWORD_BCRYPT) . " -> RESULTADO PASWORD ENCRIPTADO!";// coloco el pass a encriptar


echo "<br><br>";


/***************************************************************************************************** */

echo " CONTROL:";
echo "<br><br>";


 $hash = '$2y$10$zd6UL/ixi5JmPJEatVgGVePpC0FQxAr0eHgdbBIe6aV2UYxpnf8Ha'; // Coloco el hash que me mustra por pantalla del password_hash de màs arriba

 if (password_verify('24681012', $hash)) {  // Colocar el password a controlar ''

 echo 'La contraseña es válida!'; // Resultado de la comparación
 } else {
  echo 'La contraseña no es válida.';
 }

 /* De si todo va bien, pongo la contraseña encriptada (la más larga) del administrador de manera manual en la BD */
  ?>