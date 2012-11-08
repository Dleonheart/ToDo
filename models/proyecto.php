<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

class Proyecto extends DataInterface{	

	function __construct($db){
		parent::__construct($db);
	}

	public function allProyectos(){
		$proyectos = array();
		try {
			$stm = $this->dataContext->query('SELECT * FROM ADMINTODO.PROYECTO');
			while ($proyecto = $stm->fetchObject()) {
				$proyectos[] = $proyecto;
			}

			return $proyectos;

		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}

	public function darBaja($id){
		$stm = $this->dataContext->prepare("UPDATE ADMINTODO.PROYECTO SET ESTADOPRO = ?  
											WHERE K_PROYECTO = ?");
		$stm->execute(array('DB',$id));
	}

	public function crearNuevoProyecto($datos,$area){
		
		$stm = $this->dataContext->prepare("INSERT into ADMINTODO.proyecto values ((select max(k_proyecto)+1 from ADMINTODO.proyecto), 
											:codigo, 
											:nombre, 
											(SELECT SYSDATE FROM dual), 
											 TO_DATE(:fecha,'mm/dd/yyyy'), 'A' )");

		$stm->execute($datos);

		$statement = $this->dataContext->query('SELECT max(k_proyecto) as ID FROM ADMINTODO.proyecto');
		$idProyecto = $statement->fetchObject()->ID;
		$datosNuArea = array(':codigoEnc' => $datos[':codigo'],
							 ':nombre' => 'Direccion',
							 ':idProyecto' => $idProyecto );
		
		$area->nueva($datosNuArea); //codigo del director		
	}
}