<?php
date_default_timezone_set('America/Sao_Paulo');

// Classes
require_once 'class/Connection.class.php';
require_once 'class/Pedidos.class.php';
$pedidos = new Pedidos;


// Action
if(isset($_GET['a'])) {
    $action = trim($_GET['a']);
    switch ($action) {
        case 'listar':
            $dados = array('pesquisa' => $_GET['pesquisa'], 'filtro' => $_GET['filtro'], 'rows' => $_GET['rows']);
            echo json_encode($pedidos->listar($dados));
        break;

        case 'abrir':
            $retorno = $pedidos->abrirPedido($_GET['id']);
            if($retorno) {
                echo json_encode($retorno);
            }
            else {
                echo 0;
            }
        break;

        case 'save':
            $dados = array('cliente' => $_GET['cliente'], 'telefone' => $_GET['telefone'], 'nome' => $_GET['nome'], 'idade' => $_GET['idade'], 'data_evento' => $_GET['data_evento'], 'tema' => $_GET['tema'], 'endereco' => $_GET['endereco'], 'dados' => $_GET['dados']);
            
            if($pedidos->salvarPedido($dados)) {
                echo 3;
            }
            else {
                echo 2;
            }
        break;

        case 'edit':
            $dados = array('cliente' => $_GET['cliente'], 'telefone' => $_GET['telefone'], 'nome' => $_GET['nome'], 'idade' => $_GET['idade'], 'data_evento' => $_GET['data_evento'], 'tema' => $_GET['tema'], 'endereco' => $_GET['endereco'], 'dados' => $_GET['dados'], 'id' => $_GET['id']);
            if($pedidos->editarPedido($dados)) {
                echo 1;
            }
            else {
                echo 0;
            }
        break;

        case 'delete':
            $id = is_numeric($_GET['id']) ? $_GET['id'] : 0;
            if($pedidos->deletar($id)) {
                echo 1;
            }
            else {
                echo 0;
            }
        break;
    }
}

?>