<?php
require_once("connect.php");
$post = $_POST;

$tabla = TBL_TELAS;
$precio_por_metro = $post['tela_precio'] / $post['tela_rendimiento'];
$sql = "UPDATE $tabla SET `nombre`='".$post['tela_nombre']."',`precio_por_kg`=".$post['tela_precio'].",`metros_por_kg`=".$post['tela_rendimiento'].",`precio_por_metro`=".$precio_por_metro." WHERE id=".$post['id'];
$result = $mysqli->query($sql);

if($result){ ?>
    <script> 
        window.location.replace(<?php echo DIR_BASE.'pagina=telas' ?>); 
    </script>
<?php
}
?>