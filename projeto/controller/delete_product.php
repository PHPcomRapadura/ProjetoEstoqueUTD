<?php
	include_once dirname(__DIR__).'/model/urls.php';
	include_once $project_path.'/model/class/Connect.class.php';
	include_once $project_path.'/model/class/Manager.class.php';
	include_once $project_path.'/model/class/User.class.php';

	session_start();

	if(!isset($_SESSION[md5('us_inventory')])){
		header("location: $project_index?error=less_permission");		
	}

	//resgata os dados do usuario
	$user = $_SESSION[md5('us_inventory')];

	//testando permissão
	if($user->profile_page != "admin"){
		header("location: $project_index?error=less_permission");
	}

	if(!isset($_POST['filter'])){
		header("location: $project_index?error=less_permission");
	}

	//recebendo os dados
	$data['id_product'] = $_POST['filter'];

	$manager = new Manager();

	$manager->delete_common('tb_product', $data, "");

	header("location: $project_index/".$user->profile_page.".php?option=list_products&success=product_deleted");

?>