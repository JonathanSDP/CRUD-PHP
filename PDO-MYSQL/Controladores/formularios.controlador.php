<?php
//en este php va cada controlador que se conecta con los modelos  para solicitar la respuesta que se va a ver en la vista

    class controladorFormularios{


        /*********************
         * REGISTRO 
         *********************/
        static public function ctrRegister(){
            
            if(isset($_POST["registerName"])){

                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registerName"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registerEmail"]) &&
			   preg_match('/^[0-9a-zA-Z]+$/', $_POST["registerPassword"])){

                $tabla = "registros";

                $token = md5($_POST["registerName"]."+".$_POST["registerEmail"]);

                $datos = array("token" => $token,
                                "name" => $_POST["registerName"],
                                "email" => $_POST["registerEmail"],
                                "password" => $_POST["registerPassword"]);

                $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

                return $respuesta;


                }else{

                    $respuesta = "error";
                    return $respuesta;
                }

            }
        }

         /*********************
         * SELECCIONAR REGISTROS
         *********************/


        static public function ctrSeleccionarRegistros($item, $valor){

            $tabla = "registros";

            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            return $respuesta;
        }

        /*********************
         * LOGIN
         *********************/

        public function ctrLogin(){

            if(isset($_POST["loginEmail"])){

                $tabla = "registros";
                $item = "email";
                $valor = $_POST["loginEmail"];

                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

                if($respuesta["email"] == $_POST["loginEmail"] && $respuesta["password"] == $_POST["loginPassword"]){

                    ModeloFormularios::mdlActualizarIntentosFallidos($tabla, 0, $respuesta["token"]);


                    $_SESSION["loginValidate"] = "ok";

                    echo '<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href)
                        
                            }

                        window.location = "index.php?pag=inicio";
                    </script>';
                }else{

                    if($respuesta["intentos_fallidos"] < 3){

                        $tabla = "registros";
                        $intentos_fallidos = $respuesta["intentos_fallidos"]+1;
                        $actualizarIntentosFallidos = ModeloFormularios::mdlActualizarIntentosFallidos($tabla, $intentos_fallidos, $respuesta["token"]);
                    }else{
                        
                        echo '<div class="alert alert-warning">RECAPTCHA Error!, you need to validate your identity</div>';

                    }

                    echo '<script>
                        if (window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href)
                        
                            }
                    </script>';

                    echo '<div class="alert alert-danger">Error!, user or password incorrect.</div>';
                }
            }
        }

        /*********************
         * UPDATE USER
         *********************/

        static public function ctrActualizarRegistro(){

            if(isset($_POST["updateName"])){

                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateName"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["updateEmail"])){

                    $users = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);

                    $compararToken = md5($users["name"]."+".$users["email"]);

                    if($compararToken == $_POST["tokenUsuario"]){

                    if($_POST["updatePassword"] != ""){

                        if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["updatePassword"])){

                        $password = $_POST["updatePassword"];
                        }
                    }else{

                        $password = $_POST["passwordActual"];
                    }

                    $tabla = "registros";

                    $datos = array("token" => $_POST["tokenUsuario"],
                                "name" => $_POST["updateName"],
                                "email" => $_POST["updateEmail"],
                                "password" => $password);

                    $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

                    return $respuesta;
                    }else{

                        $respuesta = "error";
                        return $respuesta;
                    }
                }else{

                    $respuesta = "error";
                    return $respuesta;
                }
            }
         }

        /*********************
         * DELETE USER
         *********************/

         public function ctrEliminarRegistro(){
            
            if(isset($_POST["eliminarRegistro"])){

                $users = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["eliminarRegistro"]);

                $compararToken = md5($users["name"]."+".$users["email"]);

                if($compararToken == $_POST["eliminarRegistro"]){

                    $tabla = "registros";
                    $valor = $_POST["eliminarRegistro"];

                    $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

                    if($respuesta == "ok"){

                        echo '<script>
                            if (window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href)
                            
                                }

                            window.location = "index.php?pag=inicio";
                        </script>';
                    }
                }
            }
         }
    }

