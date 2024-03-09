<?php

if(isset($_GET["token"])){

    $item = "token";
    $valor = $_GET["token"];

    $usuario = controladorFormularios::ctrSeleccionarRegistros($item, $valor);
    //echo '<pre>';  print_r($usuario); echo '</pre>';
}

?>


<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/user.png"></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $usuario["name"]; ?>"placeholder="Enter new name" id="name" name="updateName">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/email.png"></span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Enter new email" id="email" name="updateEmail">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/password.png"></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter new password" id="pwd" name="updatePassword">

                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
                <input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>">
                
            </div>
        </div>

        <?php
            $actualizar = controladorFormularios::ctrActualizarRegistro();

            if($actualizar == "ok"){

                echo '<script>
            if (window.history.replaceState){
                window.history.replaceState(null, null, window.location.href)

                }
                </script>';

            echo '<div class="alert alert-success">Updated Successfully</div>
            
            <script> 
            setTimeout(function(){
                    window.location = "index.php?pag=inicio";
                },3000);
            </script>
            ';
            }

            if($actualizar == "error"){

                echo '<script>
            if (window.history.replaceState){
                window.history.replaceState(null, null, window.location.href)

                }
                </script>';

            echo '<div class="alert alert-success">error updating user</div>';
            }
        ?>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>