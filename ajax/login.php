<?php
require_once("config.php");
require_once("connect.php");
$post = $_POST;
$sql = "SELECT * FROM `usuarios` where user='".$post['user']."'";
$result = $mysqli->query($sql);
if($result){
     // Cycle through results
    while ($row = $result->fetch_object()){
        $user[] = $row;
    }
    $result->close();
}else{
    return ("El usuario no existe");
}

if($post['password'] == $user[0]->password){
    session_start();
    $_SESSION['user'] = $user[0]->user;
}else{
    return ("contraseña incorrecta");
}
?>
<script> 
    window.location.replace(<?php echo DIR_BASE.'listado.php' ?>); 
</script>





