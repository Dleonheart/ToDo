<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Proyecto extends DataInterface{	

	function __construct($db){
		parent::__construct($db);
	}

	public function allProyectos(){
		$proyectos = array();
		try {
			$stm = $this->dataContext->query('SELECT * FROM ADMINTODO.PROYECTO');
			while ($proyecto = $stm->fetchObject()) {
				$proyectos[] = $proyecto;
			}

			return $proyectos;

		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
}