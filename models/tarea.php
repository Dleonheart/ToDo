<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Tarea extends DataInterface{

	function __construct($db){
		parent::__construct($db);
	}

	public function getTareas (){
		$tareasList = array();
		try{
			$stm = $this->dataContext->query("SELECT t.K_TAREA, t.K_EMPLEADO, p.N_NOMBRE AS NPROYECTO, 
												a.N_NOMBRE as ANOMBRE ,t.DESCRIPCION,e.N_NOMBRES, e.N_APELLIDOS, t.Q_PRIORIDAD, t.ESTADOTAR 
											FROM ADMINTODO.TAREA t, ADMINTODO.PROYECTO p, ADMINTODO.EMPLEADO e , ADMINTODO.AREA a 
											WHERE t.K_PROYECTO = p.K_PROYECTO AND e.K_EMPLEADO = t.K_EMPLEADO AND t.K_AREA = a.K_AREA
											ORDER BY a.N_NOMBRE");			
			while ($tarea = $stm->fetchObject()) {
				$tareasList[] = $tarea;
			}
			return $tareasList;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}

	}

	public function countTareasPro(){
		$proyectosTar = array();
		try{
			$stm = $this->dataContext->query("SELECT p.N_NOMBRE AS NPROYECTO, COUNT(p.N_NOMBRE)AS CANTIDAD, p.ESTADOPRO 
						FROM ADMINTODO.TAREA t, ADMINTODO.PROYECTO p 
						WHERE t.K_PROYECTO = p.K_PROYECTO 
						GROUP BY p.N_NOMBRE, p.ESTADOPRO");

			while($proyecto = $stm->fetchObject()){
				$proyectosTar[] = $proyecto;
			}
			return $proyectosTar;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}

	}



	public function actualizarTarea($ktarea, $kpersonal){
		try{
			$stm = $this->dataContext->prepare("UPDATE ADMINTODO.TAREA t SET t.ESTADOTAR = 1 WHERE t.K_TAREA = :ktarea AND t.K_EMPLEADO = :kpersonal AND t.ESTADOTAR = 0");
			$stm->execute(array(':ktarea'=>$ktarea, ':kpersonal'=>$kpersonal));
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

	public function getProYAreas(){
		$listProYAreas = array();
		try{
			$stm = $this->dataContext->query("SELECT p.N_NOMBRE AS PNOMBRE, p.K_PROYECTO, a.N_NOMBRE AS ANOMBRE, a.K_AREA 
												FROM ADMINTODO.PROYECTO p, ADMINTODO.AREA a 
												WHERE p.K_PROYECTO = a.K_PROYECTO");
			while($proYArea = $stm->fetchObject()){
				$listProYAreas[] = $proYArea;
			}
			return $listProYAreas;
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function nuevaTarea($karea, $kproyecto, $kempleado, $descripcion, $prioridad, $fentrega){
		try{
			$stm = $this->dataContext->prepare("INSERT INTO ADMINTODO.TAREA (K_TAREA, K_EMPLEADO, K_PROYECTO,K_AREA, DESCRIPCION, Q_PRIORIDAD, ESTADOTAR, F_ASIGNACION, F_ENTREGA) 
												VALUES ((SELECT MAX(K_TAREA) FROM ADMINTODO.TAREA)+1,:kempleado,:kproyecto,:karea,:descripcion,:prioridad,0,TO_DATE((SELECT SYSDATE FROM dual),'mm/dd/yyyy'),TO_DATE(:fentrega,'mm/dd/yyyy'))");
			$stm->execute(array(':karea'=>$karea,':kproyecto'=> $kproyecto,':kempleado'=> $kempleado,':descripcion'=> $descripcion,':prioridad'=>$prioridad,':fentrega'=>$fentrega));
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

	public function eliminarTarea($ktarea){
		try{
			$stm = $this->dataContext->prepare('DELETE FROM ADMINTODO.TAREA WHERE K_TAREA = :ktarea');
			$stm->execute(array(':ktarea'=>$ktarea));
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
}