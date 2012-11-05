<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Personal extends DataInterface{

	function __construct($db){
		parent::__construct($db);
	}

	public function getListPersonal(){
		$listaPersonal = array();
		try{
			$stm = $this->dataContext->query('SELECT * FROM ADMINTODO.EMPLEADO ORDER BY EMPLEADO.CARGO');
			while($persona = $stm->fetchObject()){
				$listaPersonal[] = $persona;
			}
			return $listaPersonal;
		}
		catch(PDOEXception $e){
			return $e->getMessage();
		}
	}

	public function contarPersonal(){
		$cantidadP = array();
		try{
			$stm = $this->dataContext->query('SELECT EMPLEADO.CARGO as cargo, COUNT(EMPLEADO.CARGO) as numero 
												FROM ADMINTODO.EMPLEADO GROUP BY EMPLEADO.CARGO ORDER BY EMPLEADO.CARGO');
			while($cantidad = $stm->fetchObject()){
				$cantidadP[] = $cantidad;
			}
			return $cantidadP;
		}
		catch(PDOEXception $e){
			return $e->getMessage();
		}
	}

}