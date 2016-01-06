<?php
	include_once dirname(__DIR__).'/model/urls.php';

	include_once $project_path.'/model/class/Connect.class.php';
	include_once $project_path.'/model/class/Manager.class.php';
	include_once $project_path.'/model/class/User.class.php';


	//iniciar a sessao 
	session_start();

	//testando permissão.
	if(!isset($_SESSION[md5('us_inventory')])){
		header("location: $project_index?error=permission_denied");
	}

	//resgata os dados antigos do usuário
	$user = $_SESSION[md5('us_inventory')];

	//receber os dados
	$new_data['user_name'] = $_POST['name'];
	$new_data['user_email'] = $_POST['email'];
	if($_POST['password'] != ""){
		$new_data['user_password'] = sha1($_POST['password']);
	}

	//alterar no banco
	$manager = new Manager();

	//filtros
	$filters['id_user'] = $user->id_user;

	//executa a atualização
	$manager->update_common('tb_user', $new_data, $filters, "");


	//alterar na sessao
	$user->user_name = $new_data['user_name'];
	$user->user_email = $new_data['user_email'];

	//atualiza a sessao
	$_SESSION[md5('us_inventory')] = $user;

	header("location: $project_index/".$user->profile_page.".php?success=user_updated");


?>