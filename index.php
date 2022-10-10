<?php
require_once("ajax/plantillaController.php");
require_once("model/class.db.php");
require_once("model/formularios.modelo.php");

$objeto_db = new cDataBase("localhost","root","","capsula");
$db = $objeto_db->connect();

$plantilla = new ControllerPlantilla;
$plantilla->cTraerPlantilla();
