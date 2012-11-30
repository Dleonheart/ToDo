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
			$stm = $this->dataContext->query('SELECT AREA.N_NOMBRE as nombre, AREA.K_AREA as codigo , 
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

	public function nueva($datosArea = null){
		if (isset($datosArea) && is_array($datosArea)){
			# code...
			$stm = $this->dataContext->prepare('INSERT INTO ADMINTODO.AREA VALUES(
												:idProyecto,
												(SELECT max(k_area)+1 FROM ADMINTODO.AREA),
												:codigoEnc,
												:nombre)');
			$stm->execute($datosArea);
		}
	}

	public function eliminar($id){

			$stm = $this->dataContext->prepare('DELETE FROM ADMINTODO.AREA WHERE K_AREA = :karea');
			$stm->execute(array(':karea'=>$id));

	}
}