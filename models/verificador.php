<?php 
namespace Models;
use config\Data;


class verificador {

	public static function verificar($usuario, $pass){
					
		$data = new Data($usuario, $pass);

	}

	public static function cerrarSesion(){
		unset($_SESSION['nombre']);
		unset($_SESSION['pass']);
		session_destroy();
	}
}