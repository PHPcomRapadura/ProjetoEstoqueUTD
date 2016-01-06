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

	//recebendo os dados
	$data['category_id'] = $_POST['category'];
	$data['product_name'] = $_POST['name'];
	$data['product_price'] = $_POST['price'];
	$data['product_details'] = $_POST['details'];
	$data['product_quantity'] = $_POST['quantity'];

	$manager = new Manager();

	$manager->insert_common('tb_product', $data, "");

	header("location: $project_index/".$user->profile_page.".php?option=list_products&success=product_created");

?>