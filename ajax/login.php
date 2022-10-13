<?php
require_once("config.php");
require_once("connect.php");
$usuario = strtolower($_POST['user']);
$sql = "SELECT * FROM `usuarios` where user='".$usuario."'";
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

if($_POST['password'] == $user[0]->password){
    session_start();
    $_SESSION['user'] = $user[0]->user;
}else{
    return ("contraseña incorrecta");
}
?>
<script> 
    window.location.replace('http://lakapsula.000webhostapp.com/index.php?pagina=telas'); 
</script>





