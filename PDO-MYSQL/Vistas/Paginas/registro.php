<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="nombre">Name:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/user.png"></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter name" id="nombre" name="registerName">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/email.png"></span>
                </div>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="registerEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/password.png"></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="registerPassword">
            </div>
        </div>
        <?php

        /***********************
         * FORMA EN LA QUE SE INSTANCIA UN METODO NO ESTATICO.
         ***********************/
        //$register = new controladorFormularios();
        //$register -> crtRegister();

        /***********************
         * FORMA EN LA QUE SE INSTANCIA UN METODO ESTATICO.
         ***********************/
        $register = controladorFormularios::ctrRegister();
        
        if($register == "ok"){

            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href)

                }
            </script>';

            echo '<div class="alert alert-success">Registered Successfully</div>';
        }

        if($register == "error"){

            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href)

                }
            </script>';

            echo '<div class="alert alert-danger">error, no special characters allowed</div>';

        }
        ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>