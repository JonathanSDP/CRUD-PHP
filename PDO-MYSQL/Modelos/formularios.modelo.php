<?php
//en este modelo van las  respuestas que se mandan a las vistas
require_once "conexion.php";

class ModeloFormularios{

    /*********************
    * REGISTRO 
    *********************/

    static public function mdlRegistro($tabla, $datos){
        # satement : declaracion

        /*
        Prepare() prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute().
        la sentencia SQL puede contener cero o mas marcadores de parametros
        con nombre (:name) o signos de interrogacion (?) por los cuales los valores reales seran sustituidos
        cuando la sentencia sea ejecutada 
        ayuda a prevenir inyecciones SQL eliminando la necesitad de entrecomillar 
        manualmente los parametros
        */
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (token,name, email, password) VALUES
        (:token,:name, :email, :password)");

        #bindParam()
        /*
         vincula una variable de php a un parametro de sustitucion con nombre o de signo de interrogacion correspondiente 
         de la sentencia SQL que fue usada para preparar la sentencia
        */
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
        $stmt = null;
    }

    /*********************
    * SELECCIONAR REGISTROS
    *********************/

    static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt -> fetchAll();

        }else{

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt -> fetch();
    
            $stmt->closeCursor();
            $stmt = null;
        }
    }

     /*********************
    * Actualizar Registro 
    *********************/

    static public function mdlActualizarRegistro($tabla, $datos){
       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name=:name,email=:email,password=:password WHERE token =:token");

        
        $stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        
        $stmt = null;
    }

    /*********************
    * Eliminar Registro 
    *********************/

    static public function mdlEliminarRegistro($tabla, $valor){
       
        $stmt = Conexion::conectar()->prepare("DELETE from $tabla where token=:token");

        
        $stmt->bindParam(":token", $valor, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        
        $stmt = null;
    }

     /*********************
    * Actualizar Intentos 
    *********************/

    static public function mdlActualizarIntentosFallidos($tabla, $valor, $token){
       
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token =:token");

        
        $stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
        $stmt->bindParam(":token", $token, PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }
        
        $stmt = null;
    }
}