<?php 
namespace Controllers;
use config\Data;
//controlador para acciones operativas, como interactuar con la base de datos y llamar a modelos que requieren
//un objeto de la clase Data;
class OpController extends Controller {  

	protected $db; // acceso a base de datos;
	function __construct (){

		parent::__construct();
		if (isset($_SESSION['nombre']) && isset($_SESSION['pass'])){
			$this->usuario = $_SESSION['nombre'];
			$this->pass = $_SESSION['pass'];
			$this->db = new Data($this->usuario, $this->pass);
		}else{
			header('location:index.php');
		}

	}
}