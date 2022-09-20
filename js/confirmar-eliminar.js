function ConfirmDelete(){

    var respuesta = confirm("Estas seguro que deseas eliminar el usuario?");

    if (respuesta == true) {
        return true;
	} else {
	   return false;
	}
}