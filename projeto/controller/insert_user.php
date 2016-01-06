<?php
	include_once dirname(__DIR__).'/model/urls.php';
	include_once $project_path.'/model/class/Connect.class.php';
	include_once $project_path.'/model/class/Manager.class.php';
	include_once $project_path.'/model/class/User.class.php';

	session_start();

	//permissao
	if(!isset($_SESSION[md5('us_inventory')])){
		header("location: $project_index?error=permission_denied");
	}

	//testa se é admin
	$user = $_SESSION[md5('us_inventory')];

	if($user->profile_page != "admin"){
		header("location: $project_index?error=permission_denied");
	}

	//aqui começa...
	//recebe os dados
	$data['user_name'] = $_POST['name'];
	$data['user_email'] = $_POST['email'];
	$data['user_password'] = sha1($_POST['password']);
	$data['profile_id'] = $_POST['profile'];

	$manager = new Manager();
	$manager->insert_common('tb_user', $data, "");

	header("location: $project_index/".$user->profile_page.".php?option=list_users&success=user_created");
?>