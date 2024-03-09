<?php

class controladorPlantilla{

    /****************************
     * llamada a la plantilla
     ****************************/

    public function ctrlTraerPlantilla(){
        #include() Se utiliza para invocar el archivo que contiene el codigo html-php
        include "Vistas/plantilla.php";
    }
}
?>