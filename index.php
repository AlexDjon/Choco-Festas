<?php
//. Header
require_once 'includes/header.php';

//. Listar arquivos dentro da pasta views
$procurarViews = glob(SITE_VIEWS."{*.php}", GLOB_BRACE);

//. Remover views/ do caminho dos arquivos listados
for($i = 0; $i < count($procurarViews); $i++) { 
	$procurarViews[$i] = explode('.php', explode('/', $procurarViews[$i])[1])[0];
}


function loged() {
	if(isset($_COOKIE['logado']) && $_COOKIE['logado'] == 1) {
		return true;
	} 
	else {
		return false;
	}
}

//. Procura na pasta views e se não achar vai ser incluso a pagina inicial ou de login
if (isset($_GET['p'])) {
	$pagina = trim(urldecode($_GET['p']));

	// Verificar path
	for ($i = 0; $i < count($procurarViews); $i++) {
		if($pagina == $procurarViews[$i]) {
            $req = loged() ? $pagina : 'login';
		}
	}
}
else {
	if(loged()) {
		$req = 'inicio';
	}
	else {
		$req = 'login';
	}
}

require_once SITE_VIEWS.$req.'.php';

?>