<?php

	//include_once '../controller/login.php';
	
	//Variável que guarda o nome do proj.
	$project_name = "/www/tarde/projeto";

	//Variável que guarda o caminho do projeto no servidor.
	$project_index = "http://".$_SERVER['SERVER_NAME']."/$project_name";	

	//Variável do projeto no diretório de localização
	$project_path = $_SERVER['DOCUMENT_ROOT']."/$project_name";


	//Globalizando as variáveis
	$GLOBALS['project_index'] = $project_index;
	$GLOBALS['project_path'] = $project_path; 

	
	//função de inclusão de classes
	function include_class(){

		include_once ($GLOBALS['project_path'].'/models/class/User.class.php');
		include_once ($GLOBALS['project_path'].'/models/class/Category.class.php');
		include_once ($GLOBALS['project_path'].'/models/class/Product.class.php');
		include_once ($GLOBALS['project_path'].'/models/class/People.class.php');

		//Manager e Connect
		include_once ($GLOBALS['project_path'].'/models/class/
			Connect.class.php');
		include_once ($GLOBALS['project_path'].'/models/class/Manager.class.php');
		
		//Incluindo arquivo de validação de mensagens (success, errors e infos)
		include_once ($GLOBALS['project_path'].'/controller/validate.php');

		//functions: menu, get_timestamp, return_month, send_email...
		include_once ($GLOBALS['project_path'].'/controller/functions.php');

	
	}
	

?>