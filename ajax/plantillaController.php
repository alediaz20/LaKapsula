<?php
class ControllerPlantilla{
    public function cTraerPlantilla(){
        if(!isset($_SESSION['user'])){
            include("views/paginas/login.php");
        }else{
            session_start();
            include("views/plantilla.php");
        }
    }
}

?>


