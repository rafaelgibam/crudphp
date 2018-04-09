<?php

namespace Models;
use PDO, PDOException;

class DB
{
    public static function getConnection() {
        if(!isset($pdo)){
            try{
                $pdo = new PDO("mysql:host=localhost;dbname=crud","root","");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }catch(PDOException $e){
                echo "ERRO NA CONEXÃO COM O BANDO DE DADOS DETALHES: {$e->getMessage()}";
            }
            return $pdo;
        }
    }

    public static function prepare($sql){
        return self::getConnection()->prepare($sql);
    }
}