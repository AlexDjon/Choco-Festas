<?php
// Iniciar Sessões
if(!isset($_SESSION)) {
	session_start();
	ob_start();
}
date_default_timezone_set('America/Sao_Paulo');

// Senha
$systemPassword = 'Boxcodev';

// Criar constantes de informações sobre o site
$infosDoSite = json_decode(file_get_contents('assets/infos.json'));
foreach ($infosDoSite->Infos as $info) {
    define($info->nome, $info->dados);
}

if(isset($_GET['a'])) {
	$mainAction = trim($_GET['a']);
	switch($mainAction) {
		case 'login':
			if(isset($_POST['senha']) && $_POST['senha'] == $systemPassword) {
				setcookie('logado', 1);
			}
			header('Location: /chocofestas/');
		break;
		case 'logout':
			setcookie('logado');
			header('Location: /chocofestas/');
		break;
	}
}
?>