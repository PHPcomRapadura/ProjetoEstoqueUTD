<?php
	//arquivo de rotas
	include_once dirname(__DIR__).'/model/urls.php';

	//classes necessárias
	include_once $project_path.'/model/class/Connect.class.php';
	include_once $project_path.'/model/class/Manager.class.php';
	include_once $project_path.'/model/class/User.class.php';


	//receber os dados
	$email = $_POST['email'];
	$password = sha1($_POST['password']);


	//cria o objeto gerenciador do banco
	$manager = new Manager();

	//prepara a busca
	$tables['tb_user'] = array(); //todas as colunas
	$tables['tb_profile'] = array();
	$rel['tb_user.profile_id'] = "tb_profile.id_profile";
	$filters['user_email'] = $email;

	//realiza a consulta
	$log = $manager->select_special($tables, $rel, $filters, " LIMIT 1");

	//testando
	if($log === false){
		header("location: $project_index/?error=user_not_found");
	}elseif($log[0]['user_status'] == "0"){ //status
		header("location: $project_index/?error=user_inative");
	}elseif($log[0]['user_password'] != $password){//senha
		header("location: $project_index/?error=password_incorrect");
	}else{//deu certo.
		
		//atualizando ultimo acesso
		$last_d['user_last_access'] = date('Y-m-d H:i:s');
		$last_f['id_user'] = $log[0]['id_user'];
		$manager->update_common('tb_user', $last_d, $last_f, "");
		$log[0]['user_last_access'] = $last_d['user_last_access'];

		//removendo a senha
		unset($log[0]['user_password']);

		//criando o objeto com os dados do banco
		$user = new User($log[0]['user_name'], $log[0]['user_email']);

		//setando dados do usuario.
		foreach ($log[0] as $k => $v) {
			$user->$k = $v;
		}

		//inicia o serviço sessão
		session_start();

		//colocando o objeto dentro da sessao.
		$_SESSION[md5('us_inventory')] = $user;

		header("location: $project_index");
	}
	
?>