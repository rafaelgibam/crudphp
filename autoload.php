<?php

define('WWW_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

function __autoload( $class ){
    $class = WWW_ROOT . DS . str_replace(DS,'\\',$class) . '.php';

    if(!file_exists($class)){
        throw new Exception("Não existe o arquivo $class no seu diretorio");
    }

    require_once $class;
    
}