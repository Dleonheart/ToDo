<?php

namespace  Controllers;
class Controller {
	
	
	 function __construct(){
		session_start();		
	}

	public function loadView($view, $data = null){

		if (isset($data)) {
			extract($data);
		}
		
		include ('views/'.$view);
	}


 }
