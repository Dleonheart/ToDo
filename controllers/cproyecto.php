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
		if(is_string($proyectos)){ // si se devuelve un string es una excepcion;
			$viewBag['error'] = $proyectos;
			$this->loadView('panelIni.php', $viewBag); 
		}else{
			$viewBag = array('proyectos' => $proyectos);
			$this->loadView('verProyectos.php',$viewBag);
	         }
		
	}

	public function eliminar ($id){
		$proyectosData = new proyecto($this->db);
		try{ //aqui se captura la excepción desde el controlador y no desde el modelo
			$proyectosData->darBaja($id);
			$viewBag = array('mensaje' => "operación exitosa");
			$this->loadView('panelIni.php',$viewBag);
		}catch(PDOException $e){
			$viewBag = array('error' => $e);
			$this->loadView('panelIni.php',$viewBag);
		}
	}
}