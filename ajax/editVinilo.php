<?php
require_once("config.php");
require_once("connect.php");
$post = $_POST;
$tabla = 'vinilos';

$sql = "UPDATE $tabla SET `nombre_para_mostrar`='".$post['nombre']."',`precio`=".$post['precio']." WHERE id=".$post['id'];
$result = $mysqli->query($sql);

?>
<script> 
    window.location.replace('http://lakapsula.000webhostapp.com/index.php?pagina=calcvinil'); 
</script>
