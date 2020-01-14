<?php
class Connection {
    public function init() {
        /**
         * Conexao
         */
        $db_host = '127.0.0.4';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'chocofestas';

        $connection = new mysqli($db_host, $db_user, $db_pass, $db_name);

        return $connection;
    }
}

?>