<?php

class Connection {
    private static $conn = null;

    public static function getConnection() {

        if(self::$conn == null) {
            try {
                $opcoes = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Define o charset da conexão
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Define o tipo do erro como exceção
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //Define o retorno das consultas como array associativo (campo => valor)
                ); 

                self::$conn = new PDO( "mysql:host=localhost;dbname=futebol", "root", "", $opcoes);
            } catch(PDOException $e) {
                echo "Erro";
            }
        }
    
        return self::$conn;
    } 
}