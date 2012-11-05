<?php 
namespace Controllers;
use config\Data;
use PDOException;
use Models\Proyecto;

class Cproyecto extends OpController{

	function __construct(){
		parent::__construct();
		
	}

	public function verProyectos(){
		
		$proyectosData = new proyecto($this->db);
		$proyectos = $proyectosData->allProyectos();
		$viewBag = array('proyectos' => $proyectos);
		$this->loadView('verProyectos.php',$viewBag);
	}
}