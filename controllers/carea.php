<?php 
namespace Controllers;
use config\Data;
use PDOException;
use Models\Area;

class Carea extends OpController{

	function __construct(){
		parent::__construct();
		$this->areasData = new area($this->db);
		
	}

	public function verAreas(){
		
		
		$areas = $this->areasData->allareas();
		if(is_string($areas)){
			$viewBag['error'] = $areas;
			$this->loadView('panelIni.php', $viewBag); 
		}else{
			$viewBag = array('areas' => $areas);
			$this->loadView('verAreas.php',$viewBag);
	         }
	}

	public function eliminar($id){
		//$proyectosData = new proyecto($this->db);
		try{ //aqui se captura la excepción desde el controlador y no desde el modelo
			$this->areasData->eliminar($id);
			$viewBag = array('mensaje' => "operación exitosa");
			$this->loadView('panelIni.php',$viewBag);
		}catch(PDOException $e){
			$viewBag = array('error' => $e);
			$this->loadView('panelIni.php',$viewBag);
		}
	}

	public function nueva (){
		
	
		$nuevaArea = array(':idProyecto' => $_POST['codigo'],
						':codigoEnc' => $_POST['codEncargado'],
						':nombre'  => $_POST['nombreArea']);

		try {
			$this->areasData->nueva($nuevaArea);
			$viewBag = array('mensaje' => "operación exitosa");
			$this->loadView('panelIni.php',$viewBag);

		} catch (PDOException $e) {
			//$viewBag = array('error' => $nuevoP[':fecha']);
				$viewBag = array('error' =>$e->getMessage());
				$this->loadView('panelIni.php',$viewBag);
		}
		


	}
}