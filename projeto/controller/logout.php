<?php
	include_once dirname(__DIR__).'/model/urls.php';

	//inicia a sessao
	session_start();

	//destroi a sessao
	session_destroy();

	//retorna pro usuario(index) a resposta
	header("location: $project_index?success=logout");
?>