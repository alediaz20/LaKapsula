<?php
class ControllerPlantilla{
    public function cTraerPlantilla(){
        session_start();
        if(!isset($_SESSION['user'])){
            include("views/paginas/login.php");
        }else{
            include("views/plantilla.php");
        }
    }
}

?>


