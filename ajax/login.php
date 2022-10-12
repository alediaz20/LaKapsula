<?php
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
    // window.location.replace('https://lakapsula.000webhostapp.com/index.php?listado.php'); 
    window.location.replace('http://capsula.local/index.php?listado.php'); 
</script>





