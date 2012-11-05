<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Area extends DataInterface {	

	function __construct($db){
		parent::__construct($db);
	}

	public function allAreas(){
		$areas = array();
		try {
			$stm = $this->dataContext->query('SELECT AREA.N_NOMBRE as nombre, 
													 EMPLEADO.N_NOMBRES as encargado,
													 PROYECTO.N_NOMBRE as proyecto FROM ADMINTODO.AREA, ADMINTODO.PROYECTO, ADMINTODO.EMPLEADO
													 WHERE PROYECTO.K_PROYECTO = AREA.K_PROYECTO AND 
													 	   AREA.K_EMPLEADO = EMPLEADO.K_EMPLEADO');
			while ($area = $stm->fetchObject()) {
				$areas[] = $area;
			}

			return $areas;

		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}