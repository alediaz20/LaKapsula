<?php
require_once("ajax/plantillaController.php");
// require_once("model/class.db.php");
// require_once("model/formularios.modelo.php");

const COSTO_VINILO = 1000.00;
const COSTO_CONFECCION = 3000.00;

// $objeto_db = new cDataBase("localhost","root","","capsula");
// $db = $objeto_db->connect();

$plantilla = new ControllerPlantilla;
$plantilla->cTraerPlantilla();
