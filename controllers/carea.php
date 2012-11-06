<?php 
namespace Controllers;
use config\Data;
use PDOException;
use Models\Area;

class Carea extends OpController{

	function __construct(){
		parent::__construct();
		
	}

	public function verAreas(){
		
		$areasData = new area($this->db);
		$areas = $areasData->allareas();
		if(is_string($areas)){
			$viewBag['error'] = $areas;
			$this->loadView('panelIni.php', $viewBag); 
		}else{
			$viewBag = array('areas' => $areas);
			$this->loadView('verAreas.php',$viewBag);
	         }
	}
}