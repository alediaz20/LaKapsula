<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La Kapsula</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@300&display=swap" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body style="font-family: 'Jost', sans-serif;">
<?php
  if($_SESSION['user'] == 'cavila'){
      $paginas = ["prendas","telas","listado","editarTela","editarPrenda","login"];
  }else{
    $paginas = ["listado","login"];
  }
?>
<div class="container-fluid bg-light mb-5">
  <div class="nav nav-justified py-2 nav-pills">
    <?php if(isset($_GET['pagina'])){ ?>
      <!-- listado -->
      <?php if($_GET['pagina']=="listado"){ ?>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?pagina=listado">Listado de prendas</a>
        </li>
      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pagina=listado">Listado de prendas</a>
        </li>
      <?php } ?>

        <?php  if($_SESSION['user'] == 'cavila') {      
          // prendas
          if($_GET['pagina']=="prendas"){ ?>
            <li class="nav-item">
              <a class="nav-link active" href="index.php?pagina=prendas">Prendas</a>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pagina=prendas">Prendas</a>
            </li>
          <?php } ?>
          <!-- telas -->
          <?php if($_GET['pagina']=="telas"){ ?>
            <li class="nav-item">
              <a class="nav-link active" href="index.php?pagina=telas">Telas</a>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?pagina=telas">Telas</a>
            </li>
          <?php } 
          } 
        ?>

      <?php }else{ ?>
        <li class="nav-item">
          <a class="nav-link active" href="index.php?pagina=listado">Listado de prendas</a>
        </li>
        <?php  if($_SESSION['user'] == 'cavila') {  ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=prendas">Prendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=telas">Telas</a>
          </li>
    <?php } 
  }
  ?>
  </div>
</div>

  <div>
      <?php
        if(isset($_GET['pagina'])){
          if(in_array($_GET['pagina'],$paginas)){
            include_once("paginas/".$_GET['pagina'].".php");
          }else{
            include_once("paginas/404.php");
          }
        } else{
          include_once("paginas/listado.php");
        }
      ?>
  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/sweetalert2.all.min.js"></script>
</body>
</html>