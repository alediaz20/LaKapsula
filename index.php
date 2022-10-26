<?php
session_start();
require_once("ajax/config.php");
require_once("ajax/plantillaController.php");

$plantilla = new ControllerPlantilla;
$plantilla->cTraerPlantilla();

