<?php 
namespace Controllers;

class Inicio extends Controller{

	function __construct(){
		parent::__construct();
		if(!(isset($_SESSION['nombre']) && isset($_SESSION['pass'])))
		{
			header('location:index.php');
		}
	}
	public function index(){
		$this->loadView('panelIni.php');
	}
}