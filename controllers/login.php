<?php 

namespace Controllers;
use config\Data;
use PDOException;
use Models\Verificador;
class Login extends Controller{

	function __construct(){

		session_start();
	}
	public function verificar(){
		
		if(isset($_POST['usuario']) && isset($_POST['pass'])){
			
			$usuario = $_POST['usuario'];
			$pass = $_POST['pass'];
			
			try{			
				//$data = new Data($usuario, $pass);
				Verificador::verificar($usuario, $pass);
				$_SESSION['nombre'] = $usuario;
				$_SESSION['pass'] = $pass;
				header('location:index.php?url=inicio');
				exit;
			}catch(PDOException $e){
				$datos = array('error' => $e->getMessage());
					$this->loadView('home.php',$datos);
			}
		}else{
			$datos = array('error' => 'No se encontraron datos de acceso');
			$this->loadView('home.php',$datos);
		}		
	}

	public function cerrarSesion(){
		Verificador::cerrarSesion();
		header('location:index.php');
	}
}