<?php

class Database extends PDO {

    public function __construct() {

        try {
            parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $custom_errormsg = 'Erro ao conectar ao banco de dados - <u>verifique suas propriedades de conexão com o banco de dados!</u>';
            echo "<br>\n <div style ='color:red'><strong>" . $custom_errormsg . "</strong></div><br>\n<br>\n ". $e->getMessage();
            echo "<br>\nPHP Version : ".phpversion()."<br>\n";
        }
    }

}
