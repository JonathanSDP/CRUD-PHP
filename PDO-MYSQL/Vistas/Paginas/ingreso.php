<div class="d-flex justify-content-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/email.png"></span>
                </div>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="loginEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><img src="imagenes/password.png"></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="loginPassword">
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
        $login = new controladorFormularios();
        $login->ctrLogin();
        ?>


        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>