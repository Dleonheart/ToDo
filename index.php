<?php 
namespace ToDo;
use \Controllers;	
//cualquier require aqui
	require 'config/config.php';
	require 'bootstrap.php';
/*Inicio del enrutamiento*/


if (isset($_GET['url'])) {//comprueba si hay un controlador pasado a la variable url
	$query = explode('/',$_GET['url']);
	$file='controllers/'.$query[0].'.php';
	if(file_exists($file)){//comprueba que el archivo al que estamos accediendo existe	
		
		$clase = 'Controllers' . '\\' . ucfirst($query[0]);
	
		$controlador = new $clase(); 
		if(isset($query[1])&&(method_exists($controlador, $query[1]))) {
			(isset($query[2])) ? $controlador->$query[1]($query[2]) : $controlador->$query[1]();
		}else{

			$controlador->index();
		}
	}else{
		
		$controlador = new Error();
	}
}else{	//si no hay controlador, se llama al controlador base y se carga la página home
	
	$controlador = new Controllers\Controller();
	$controlador->loadView('home.php');

}


