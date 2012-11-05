<?php 
namespace Models;
use Config\Data;
use PDO;
use PDOException;

abstract class DataInterface {

	protected $dataContext;

	function __construct($dataContext){

		$this->dataContext = $dataContext;

	}


}