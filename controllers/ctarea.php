<?php 
namespace Controllers;
use config\Data;
use PDOException;
use Models\Tarea;
use Models\Personal;

class Ctarea extends OpController{

	function __construct(){
		parent::__construct();
		
	}

	public function verTareas(){
		$tareasData = new tarea($this->db);
		$listaT = $tareasData->getTareas();
		$proyecTar = $tareasData->countTareasPro();
		if(is_string($listaT)){
			$viewBag = array('error'=>$listaT);
			$this->loadview("panelIni.php",$viewBag);
		}elseif(is_string($proyecTar)){
			$viewBag = array('error'=>$listaT);
			$this->loadview("panelIni.php",$viewBag);
		}else{
			$viewBag = array('listaT'=>$listaT,
        	              	 'proyecTar' =>$proyecTar);
			$this->loadview("verTareas.php",$viewBag);
		}		
	}

	public function realizarTarea(){
		if (isset($_POST['k_tarea']) && isset($_POST['k_personal'])){
			$tareasData = new tarea($this->db);
			$exito = $tareasData->actualizarTarea($_POST['k_tarea'],$_POST['k_personal']);
			if(is_string($exito)){
				$viewBag = array('error'=>$exito);
				$this->loadview("panelIni.php",$viewBag);
			}
			else{
				if ($exito == true){
					$viewBag = array('mensaje'=>"Se modifico con exito el estado de la tarea, ya se da por terminada");
					$this->loadview("panelIni.php",$viewBag);
				}else{
					$viewBag = array('mensaje'=>"Hubo in inconveniente y tarea no se pudo realizar, intentelo nuevamente");
					$this->loadview("panelIni.php",$viewBag);
				}
			}
		}
	}

	public function cargarVistaNuevaT(){

		$tareasData = new tarea($this->db);
		$listaA = $tareasData->getProYAreas();
		$listaPro = $tareasData->countTareasPro();

		$personalData = new personal($this->db);
		$listaPer = $personalData->getListPersonal();


		if(is_string($listaA)){
			$viewBag = array('error'=>$listaA);
			$this->loadview("panelIni.php",$viewBag);
<<<<<<< HEAD
		}elseif(is_string($listaPer)){
			$viewBag = array('error'=>$listaPer);
			$this->loadview("panelIni.php",$viewBag);
		}elseif(is_string($listaPro)){
			$viewBag = array('error'=>$listaPro);
			$this->loadview("panelIni.php",$viewBag);
		}else{
			$viewBag = array('listaA'=>$listaA,
						 'listaPer'=>$listaPer,
						 'listaPro'=>$listaPro,);
=======
		}elseif(is_string($listaPro)){
			$viewBag = array('error'=>$listaPro);
			$this->loadview("panelIni.php",$viewBag);
		}elseif(is_string($listaPer)){
			$viewBag = array('error'=>$listaPer);
			$this->loadview("panelIni.php",$viewBag);
		}else{
			$viewBag = array('listaA'=>$listaA,
							 'listaPer'=>$listaPer,
							 'listaPro'=>$listaPro,);
>>>>>>> origin/Carlos
			$this->loadview("nuevaTarea.php",$viewBag);			
		}
	}

	public function crearNuevaT(){
		if (isset($_POST['k_area']) && isset($_POST['k_proyecto']) && isset($_POST['prioridad']) && isset($_POST['responsable']) && isset($_POST['descripcion'])){
			$tareasData = new tarea($this->db);
			$exito = $tareasData->nuevaTarea($_POST['k_area'],$_POST['k_proyecto'],$_POST['responsable'],$_POST['descripcion'],$_POST['prioridad']);
			if(is_string($exito)){
				$viewBag = array('error'=>$exito);
				$this->loadview("panelIni.php",$viewBag);
			}
			else{
				if ($exito == true){
					$viewBag = array('mensaje'=>"Se creo la tarea de forma exitosa");
					$this->loadview("panelIni.php",$viewBag);
				}else{
					$viewBag = array('mensaje'=>"Hubo in inconveniente y la nueva tarea no pudo ser creada, intentelo nuevamente");
					$this->loadview("panelIni.php",$viewBag);
				}				
			}			
		}
	}

	public function eliminarT($tareak){

		$tareasData = new tarea($this->db);
		$exito = $tareasData->eliminarTarea($tareak);
		if(is_string($exito)){
				$viewBag = array('error'=>$exito);
				$this->loadview("panelIni.php",$viewBag);
		}else{
			if ($exito == true){
				$viewBag = array('mensaje'=>"Se elimino la tarea de forma exitosa");
				$this->loadview("panelIni.php",$viewBag);
			}else{
				$viewBag = array('mensaje'=>"Hubo in inconveniente y la tarea no pudo ser eliminada, intentelo nuevamente");
				$this->loadview("panelIni.php",$viewBag);
			}				
		}

	}

}



