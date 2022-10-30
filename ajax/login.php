<?php
require_once("config.php");
require_once("connect.php");

$usuario = strtolower($_POST['user']);
$password = $_POST['password'];

$sql = "SELECT * FROM `usuarios` where user='".$usuario."' AND password='".$password."'";
$result = $mysqli->query($sql);

if($result->num_rows >= 1){
    $datos =  $result->fetch_assoc();
    session_start();
    $_SESSION['user'] = $datos['user'];
    echo json_encode(array('error' => false,'msg'=>"Usuario correcto",$datos['user']));
}else{
    echo json_encode(array('error' => true,'msg'=>"Usuario o contraseña incorrecto"));
}
$result->close();

