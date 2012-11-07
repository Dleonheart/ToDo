<?php
namespace Controllers;
use config\Data;
use PDOException;
use Models\Personal;

class Cpersonal extends OpController{

	function __construct(){
		parent::__construct();
		
	}

	public function verPersonal(){
			
		$personalData = new personal($this->db);
		$personalLista = $personalData->getListPersonal();
		$numeroP = $personalData->contarPersonal();

		if(is_string($personalLista)){
			$viewBag = array('error'=>$personalLista);
			$this->loadview("panelIni.php",$viewBag);
		}elseif(is_string($numeroP)){
			$viewBag = array('error'=>$numeroP);
			$this->loadview("panelIni.php",$viewBag);
		}else{
			$viewBag = array('listaP'=>$personalLista,
                         'cantidadP' =>$numeroP);
			$this->loadview('verPersonal.php',$viewBag);			
		}		
	}

	public function crearNuevoP(){
		if (isset($_POST['nombresE'])&&isset($_POST['apellidosE'])&&isset($_POST['tipoDocE'])&&isset($_POST['numDocE'])&&isset($_POST['cargoE'])) {
			$personalData = new personal($this->db);
			$exito = $personalData->crearPersonal($_POST['nombresE'],$_POST['apellidosE'],$_POST['tipoDocE'],$_POST['numDocE'],$_POST['cargoE']);
			if(is_string($exito)){
				$viewBag = array('error'=>$exito);
				$this->loadview("panelIni.php",$viewBag);
			}
			else{
				if ($exito == true){
					$viewBag = array('mensaje'=>"El nuevo empleado fue creado satisfactoriamente");
					$this->loadview("panelIni.php",$viewBag);
				}else{
					$viewBag = array('mensaje'=>"Hubo in inconveniente y no se pudo crear el empleado, intentelo nuevamente");
					$this->loadview("panelIni.php",$viewBag);
				}
			}
		}		
	}

	public function eliminarP($kempleado){
		$personalData = new personal($this->db);
		$exito = $personalData->eliminarPersonal($kempleado);
		if(is_string($exito)){
			$viewBag = array('error'=>$exito);
			$this->loadview("panelIni.php",$viewBag);
		}
		else{
			if ($exito == true){
				$viewBag = array('mensaje'=>"El empleado fue despedido");
				$this->loadview("panelIni.php",$viewBag);
			}else{
				$viewBag = array('mensaje'=>"El empleado no puede ser despedido en estos momentos por sus responsabilidad, 
						o usted no tiene autoridad por el cargo");
				$this->loadview("panelIni.php",$viewBag);
			}
		}

	}
}