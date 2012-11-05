<?php
// bootstrap.php archivo requerido para hacer imports, instanciar el agente de persistencia y el entity manager
//se importan todas las entidades del mdoelo de dominio y la clase de persistencia
//se importan todos los controladores
// require_once('controllers/controller.php');
// require_once('controllers/defecto.php');

  //require_once('config/data.php');



 function cargaControladores($clase){

 	$parts = explode('\\', $clase);
 	
  	$directory = $parts[0];
  	$class = $parts[1];
 	require strtolower($directory).'/'.$class.'.php';
 }

spl_autoload_register('cargaControladores');
/*use Doctrine\Common\ClassLoader;
require 'Doctrine/Common/ClassLoader.php';

$classLoader = new ClassLoader('entities', '');
$classLoader->register();*/





