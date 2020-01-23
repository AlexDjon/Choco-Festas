<?php
//. Header
require_once 'includes/header.php';

//. Listar arquivos dentro da pasta views
$procurarViews = glob(SITE_VIEWS."{*.php}", GLOB_BRACE);

//. Remover views/ do caminho dos arquivos listados
for($i = 0; $i < count($procurarViews); $i++) { 
	$procurarViews[$i] = explode('.php', explode('/', $procurarViews[$i])[1])[0];
}

//. Procura na pasta views
if (isset($_GET['p'])) {
	$pagina = trim(urldecode($_GET['p']));

	for ($i = 0; $i < count($procurarViews); $i++) {
		if($pagina == $procurarViews[$i]) {
            $retorno = $pagina;
		}
	}
	if (isset($retorno)) {
		// Verificar login
		if(!isset($_COOKIE['logado']) || $_COOKIE['logado'] != 1) {
			require_once SITE_VIEWS.'login.php';
		}
		else {
			require_once SITE_VIEWS.$retorno.'.php';
		}
	}
	else {
		require_once SITE_VIEWS.'undefined.html';
	}
}
else {
	header('Location: '.SITE_RAIZ.'inicio');
}

?>