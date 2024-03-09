<?php
#EL INDEX: en el mostraremos la salida de las vistas al usuario y tambien a traves de el enviaremos
#las distintas acciones que el usuario envie al controlador
    /*
    Require() establece que el codigo del archivo invocado es requerido, es decir
    obligatorio para el funcionamiento del programa. Por ello , si el archivo especificado en la funcion require()
    no se encuentra saltara un error "PHP fatal error" y el programa PHP se detendra.
     */
    /*
    la version require_once() funciona de la misma manera que require() salvo que al utilizar la vercion _once, se impide la carga de un mismo archivo mas de una vez.
    si requerimos el mismo codigo mas de una vez corremos el riesgo de redeclaraciones de variables,funciones o clases
    */
    require_once "controladores/plantillacontrolador.php";
    require_once "controladores/formularios.controlador.php";
    require_once "modelos/formularios.modelo.php";

    $plantilla = new controladorPlantilla();
    $plantilla-> ctrlTraerPlantilla();
