<?php

function generaPassword(){  
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $longitudCadena=strlen($cadena);    
    $pass = "";
    $longitudPass=6;    
    for($i=1 ; $i<=$longitudPass ; $i++){
        $pos=rand(0,$longitudCadena-1);     
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}

?>