<?php
    class Pedidos {
        private function db() {
            $con = new Connection;
            if($init = $con->init()) {
                return $init;
            }
        }

        public function verificar() {
            if(isset($_COOKIE['logado']) && $_COOKIE['logado'] == 1) {
                return true;
            }
            else {
                return false;
            }
        }

        public function listar($dados) {
            $infoFiltro = array(['a'=>'id', 'd'=>'data_pedido', 'c'=>'cliente', 'n'=>'telefone', 't'=>'tema'],
                                ['D'=>'DESC', 'C'=>'ASC']);
                                
            $coluna = $infoFiltro[0][substr($dados['filtro'], 0, 1)];
            $ordem = $infoFiltro[1][substr($dados['filtro'], 1, 1)];
            
            $pesquisa = mysqli_real_escape_string($this->db(), $dados['pesquisa']);
            //$pesquisa = $dados['pesquisa'];
            $sql = 'SELECT id, data_evento, data_pedido, cliente, telefone, tema FROM pedidos WHERE cliente LIKE "%'.$pesquisa.'%" OR data_pedido LIKE "%'.$pesquisa.'%" OR data_evento LIKE "%'.$pesquisa.'%" OR telefone LIKE "%'.$pesquisa.'%" OR nome LIKE "%'.$pesquisa.'%" OR tema LIKE "%'.$pesquisa.'%" OR endereco LIKE "%'.$pesquisa.'%" OR dados LIKE "%'.$pesquisa.'%" ORDER BY '.$coluna.' '.$ordem.' LIMIT '.$dados['rows'];
            
            $listar = $this->db()->query($sql);

            $retorno = array();
            if($listar && $this->verificar()) {
                while($row = $listar->fetch_assoc()) {                
                    array_push($retorno, $row);
                }
            }
            return $retorno;
        }
        
        public function abrirPedido($id) {
            if(is_numeric($id) && $id > 0) {
                $sql = "SELECT * FROM pedidos WHERE id = '$id'";
                $pedido = $this->db()->query($sql);
                if($pedido && $this->verificar()) {
                    $retorno = array();
                    foreach($pedido->fetch_assoc() as $key => $value) {
                        $retorno[$key] = htmlspecialchars_decode($value, ENT_QUOTES);
                    }
                    return $retorno;
                }
                else {
                    return false;
                }
            }
        }

        public function salvarPedido($dados) {
            foreach($dados as $key => $value) {
                $dados[$key] = htmlspecialchars(mysqli_real_escape_string($this->db(), $value), ENT_QUOTES);
            }
            $data = date('d/m/Y');
            $sql = 'INSERT INTO pedidos(`data_pedido`, `cliente`, `telefone`, `nome`, `idade`, `data_evento`, `tema`, `endereco`, `dados`, `status`) VALUES ("'.$data.'"';
            foreach($dados as $key => $value) {
                $sql .= ', "'.$value.'"';
            }
            $sql .= ', "1")';
            if($this->verificar()) {
                if($this->db()->query($sql)) {
                    return 1;
                }
                else {
                    return 0;
                }
            }
            else {
                return 0;
            }
        }

        public function editarPedido($dados) {
            foreach($dados as $key => $value) {
                $dados[$key] = htmlspecialchars(mysqli_real_escape_string($this->db(), $value), ENT_QUOTES);
            }
            $sql = 'UPDATE pedidos SET ';
            $indice = 0;
            foreach($dados as $key => $value) {
                if($indice == 0) {                    
                    $sql .= '`'.$key.'` = "'.$value.'"';
                }
                else if($key != 'id') {
                    $sql .= ', `'.$key.'` = "'.$value.'"';
                }
                $indice++;
            }
            $sql .= ' WHERE `id`="'.$dados['id'].'"';

            if($this->verificar()) {
                if($this->db()->query($sql)) {
                    return 1;
                }
                else {
                    return 0;
                }
            }
            else {
                return 0;
            }
        }

        public function deletar($id) {
            $sql = 'DELETE FROM pedidos WHERE `id`='.$id;
            if($this->verificar()) {
                if($this->db()->query($sql)) {
                    return 1;
                }
                else {
                    return 0;
                }
            }
            else {
                return 0;
            }
        }
    }
?>
