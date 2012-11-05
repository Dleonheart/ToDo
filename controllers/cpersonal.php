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
		$viewBag = array('listaP'=>$personalLista,
                         'cantidadP' =>$numeroP);
		$this->loadview('verPersonal.php',$viewBag);
	}
}