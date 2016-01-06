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
	$data['category_name'] = $_POST['name'];
	$data['category_desc'] = $_POST['desc'];

	$manager = new Manager();
	$manager->insert_common('tb_category', $data, "");

	header("location: $project_index/".$user->profile_page.".php?option=list_categories&success=category_created");
?>