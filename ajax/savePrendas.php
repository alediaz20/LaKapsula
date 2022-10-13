<?php
require_once("connect.php");

$post = $_POST;
$tabla = TBL_PRENDAS;
$sql = "INSERT INTO `$table`(nombre,telas,metros_por_tela) VALUES ('".$post['prenda_nombre']."','".$post['prenda_telas']."','".$post['metros_por_tela']."')";
$result = $mysqli->query($sql);

$sql2 = "SELECT id FROM `$table` WHERE `nombre` = '".$post['prenda_nombre']."'";

$result = $mysqli->query($sql2);
if($result){
    while ($row = $result->fetch_object()){
        $prenda[] = $row;
    }
    $result->close();
}

$idprenda = $prenda[0]->id;

$directorio = '../imgs/';
$subir_archivo = $directorio.basename($idprenda.".png");
move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo);


if($result){ ?>
    <script> 
        window.location.replace(<?php echo DIR_BASE.'pagina=prendas' ?>); 
    </script>
<?php
}
?>