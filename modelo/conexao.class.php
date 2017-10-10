<?php
    abstract class conexao {
        protected $db;

        protected function __construct()
        {
            //qual banco ser� utilizado=mysql
            //nome do servidor onde est� o banco de dados = localhost
            //nome do banco de dados = order_coffee
            //define charset
            $dc="mysql:host=localhost;dbname=order_coffee;charset=utf8";
            $utf = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            );
            try
            {
                $this->db = new PDO($dc, "root", "", $utf);
            }
            catch ( Exception $e )
            {
                die ($e->getMessage());
            }
        }
    }
