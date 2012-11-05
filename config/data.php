<?php 
namespace Config;
use PDO;
class Data extends PDO {

	private $dsn = 'oci:$dbname=//localhost:8080/ADMINTODO;charset=UTF8';

	 function __construct($usuario, $contrasena){

		parent::__construct($this->dsn, $usuario, $contrasena, array(PDO::ATTR_PERSISTENT => true));
		
		$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	}
}