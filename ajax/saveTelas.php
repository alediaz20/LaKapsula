<?php
require_once("connect.php");
$post = $_POST;

$tabla = TBL_TELAS;
$precio_por_metro = $post['tela_precio'] / $post['tela_rendimiento'];

$sql = "INSERT into $tabla(nombre,precio_por_kg,metros_por_kg,precio_por_metro) VALUES ('".$post['tela_nombre']."',".$post['tela_precio'].",".$post['tela_rendimiento'].",".$precio_por_metro.")";

$result = $mysqli->query($sql);

if($result){ ?>
    <script> 
        window.location.replace(<?php echo DIR_BASE.'pagina=telas' ?>); 
    </script>
<?php
}
?>