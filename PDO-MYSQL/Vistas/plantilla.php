<?php
session_start();
?>
<!--en este php va el contenido del index.php-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ejemplo MVC</title>

    <!--PLUGINS CSS-->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!--PLUGINS JS-->

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Latest compiled Fontawesome -->
<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--*************
        LOGOTIPO
        ******************-->

        <div class="container-fluid">

            <h3  class="text-center py-3">LOGO</h3>

        </div>

        <!--*************
        BOTONERA
        ******************-->

        <div class="container-fluid bg-light">

            <div class="container">

                <ul class="nav nav-justified py-2 nav-pills">
                
                <?php if (isset($_GET["pag"])): ?>
                    
                    <?php if ($_GET["pag"] == "registro"): ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=registro">Register</a>
                    </li>
                    <?php else: ?>

                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=registro">Register</a>
                    </li>

                    <?php endif ?>

                <?php endif ?>

                <?php if (isset($_GET["pag"])): ?>
                    
                    <?php if ($_GET["pag"] == "ingreso"): ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=ingreso">Login</a>
                    </li>
                    <?php else: ?>

                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=ingreso">Login</a>
                    </li>

                    <?php endif ?>

                <?php endif ?>

                <?php if (isset($_GET["pag"])): ?>
                    
                    <?php if ($_GET["pag"] == "inicio"): ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=inicio">Index</a>
                    </li>
                    <?php else: ?>

                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=inicio">Index</a>
                    </li>

                    <?php endif ?>
                    
                    <?php if ($_GET["pag"] == "salir"): ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=salir">LogOut</a>
                    </li>
                    <?php else: ?>

                        <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=salir">LogOut</a>
                    </li>

                    <?php endif ?>

                    <?php else: ?>
                    
                        <!--*************
                GET: $_GET["variables"] Variables que se pasan como parametros VIA URL
                (tambien conocido como cadena de consulta a traves de la URL)
                Cuando es la primera variable se separa con "?"
                las que siguen a continuación se separan con "&"
                ******************-->
                     

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pag=registro">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=ingreso">Login</a>                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=inicio">Index</a>                        
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pag=salir">LogOut</a>
                    </li>


                <?php endif ?>

                </ul>

            </div>

        </div>
        
        <!--*************
        CONTENIDO
        ******************-->

        
        <div class="container-fluid py-5">

            <div class="container">

                <?php

                    #ISSET: isset() Determina si una variable esta definida y no es NULL

                    if(isset($_GET["pag"])){
                        if($_GET["pag"] == "registro" ||
                           $_GET["pag"] == "ingreso" ||
                           $_GET["pag"] == "inicio" ||
                           $_GET["pag"] == "editar" ||
                           $_GET["pag"] == "salir"){


                            include "paginas/".$_GET["pag"].".php";
                           }

                        else{
                            include "paginas/error404.php";

                        }
                        

                    }else {

                        include "paginas/registro.php";
                    }
                    
                ?>
            </div>
        </div>

</body>
</html>
