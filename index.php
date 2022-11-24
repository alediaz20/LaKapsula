<?php
session_start();
require_once("ajax/config.php");
require_once("ajax/plantillaController.php");
require_once("model/class.kapsula.php");
require_once("includes/common.inc.php");

$plantilla = new ControllerPlantilla;
$plantilla->cTraerPlantilla();

$Kapsula = new cKapsula();
$Kapsula->connect();