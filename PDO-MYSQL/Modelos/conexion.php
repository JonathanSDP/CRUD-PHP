<?php

class Conexion{

    #PDO("nombre del servidor; nombre base de datos", "usuario", "contraseña")

    static public function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=curso-php", 
                        "root",
                        "");
        $link ->exec("set names utf8") ;

        return $link;
    }
}