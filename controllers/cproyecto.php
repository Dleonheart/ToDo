<?php 
namespace Controllers;
use config\Data;
use PDOException;
use Models\Proyecto;
use Models\area;

class Cproyecto extends OpController{
	private $proyectosData;
	function __construct(){
		parent::__construct();
		$this->proyectosData = new proyecto($this->db);
		
	}

	public function verProyectos(){
		
		//$proyectosData = new proyecto($this->db);
		$proyectos = $this->proyectosData->allProyectos();
		if(is_string($proyectos)){ // si se devuelve un string es una excepcion;
			$viewBag['error'] = $proyectos;
			$this->loadView('panelIni.php', $viewBag); 
		}else{
			$viewBag = array('proyectos' => $proyectos);
			$this->loadView('verProyectos.php',$viewBag);
	         }
		
	}

	public function eliminar ($id){
		//$proyectosData = new proyecto($this->db);
		try{ //aqui se captura la excepción desde el controlador y no desde el modelo
			$this->proyectosData->darBaja($id);
			$viewBag = array('mensaje' => "operación exitosa");
			$this->loadView('panelIni.php',$viewBag);
		}catch(PDOException $e){
			$viewBag = array('error' => $e);
			$this->loadView('panelIni.php',$viewBag);
		}
	}

	public function nuevo (){
		$area = new Area($this->db);
		$fechaEx = explode('-', $_POST['fechaLimite']);
		$nuevaFecha = $fechaEx[1].'/'.$fechaEx[2].'/'.$fechaEx[0];
		$nuevoP = array(':codigo' => $_POST['codEncargado'],
						':nombre' => $_POST['nombre'],
						':fecha'  => $nuevaFecha);

		try {
			$this->proyectosData->crearNuevoProyecto($nuevoP,$area);
			$viewBag = array('mensaje' => "operación exitosa");
			$this->loadView('panelIni.php',$viewBag);

		} catch (PDOException $e) {
			//$viewBag = array('error' => $nuevoP[':fecha']);
				$viewBag = array('error' =>$e->getMessage());
				$this->loadView('panelIni.php',$viewBag);
		}
		


	}
}