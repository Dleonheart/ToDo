<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Personal extends DataInterface{

	function __construct($db){
		parent::__construct($db);
	}

	public function getListPersonal(){
		$listaPersonal = array();
		try{
			$stm = $this->dataContext->query('SELECT * FROM ADMINTODO.EMPLEADO ORDER BY EMPLEADO.CARGO');
			while($persona = $stm->fetchObject()){
				$listaPersonal[] = $persona;
			}
			return $listaPersonal;
		}
		catch(PDOEXception $e){
			return $e->getMessage();
		}
	}

	public function contarPersonal(){
		$cantidadP = array();
		try{
			$stm = $this->dataContext->query('SELECT EMPLEADO.CARGO as cargo, COUNT(EMPLEADO.CARGO) as numero 
												FROM ADMINTODO.EMPLEADO GROUP BY EMPLEADO.CARGO ORDER BY EMPLEADO.CARGO');
			while($cantidad = $stm->fetchObject()){
				$cantidadP[] = $cantidad;
			}
			return $cantidadP;
		}
		catch(PDOEXception $e){
			return $e->getMessage();
		}
	}


	public function crearPersonal($nombresE,$apellidosE,$tipoDocE,$numDocE,$cargoE){
		try{
			$stm = $this->dataContext->prepare("INSERT INTO ADMINTODO.EMPLEADO (K_EMPLEADO, N_NOMBRES, N_APELLIDOS,	TIPO_DOCUMENTO, Q_DOCUMENTO, CARGO, ESTADOEMP) 
												VALUES ((SELECT MAX(K_EMPLEADO) FROM ADMINTODO.EMPLEADO)+1,:nombresE,:apellidosE,:tipoDocE,:numDocE,:cargoE,'A')");
			$stm->execute(array(':nombresE'=>$nombresE,':apellidosE'=> $apellidosE,':tipoDocE'=> $tipoDocE,':numDocE'=> $numDocE,':cargoE'=>$cargoE));
				
			if($stm == true){				
				return true;
			}
			else{
				return false;
			}
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function eliminarPersonal($kempleado){
		try{
			$stm = $this->dataContext->prepare("UPDATE ADMINTODO.EMPLEADO e SET e.ESTADOPER = 'D' 
												WHERE e.K_EMPLEADO = :kempleado AND e.CARGO != 'DP' AND e.CARGO != 'DA' AND 
													(SELECT COUNT(t.K_TAREA) FROM ADMINTODO.TAREA WHERE t.K_EMPLEADO = :kempleado AND t.ESTADOTAR = 0) = 0");
			$stm->execute(array(':kempelado'=>$kempelado));
			
			if($stm == true){
				return true;	
			}else{
				return false;	
			}			
		}
		catch(PDOException $e){
			return $e->getMessage();
		}

	}

}