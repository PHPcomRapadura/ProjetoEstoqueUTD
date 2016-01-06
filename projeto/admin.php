<?php
	//arquivo principal de toda página
	//possui as rotas de todos os arquivos
	include_once 'model/urls.php';
	//validação de mensagens, opções do menu, e ações do sistema
	include_once 'controller/validate.php';
	//dicionário
	include_once 'model/dictionary.php';

	//classe de modelo do Usuário
	include_once 'model/class/User.class.php';

	//iniciar a sessao
	session_start();

	//testa se ja existe usuario logado
	if(isset($_SESSION[md5('us_inventory')])){		
		//recupera os dados do usuário
		$user = $_SESSION[md5('us_inventory')];

		//testa se é admin
		if($user->profile_page != "admin"){
			header("location: $project_index?error=permission_denied");
		}
	}else{
		header("location: $project_index?error=permission_denied");
	}


	//titulo da página
	$page_title = "Página do Administrador";

	function page_content(){
		validate_message();

		if(validate_option() == false){
			include_once $GLOBALS['project_path'].'/view/welcome.html';
		}
	}


	//incluindo template
	include_once 'view/template.html';
?>