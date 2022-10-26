<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>La Kapsula</title>

  <link rel="icon" type="image/png" href="../imgs/mainlogo.png"/>

  <!-- Google Font: Source Sans Pro -->

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@400&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@300&display=swap" rel="stylesheet">

  

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Theme style -->

  <link rel="stylesheet" href="css/adminlte.min.css">

  <link rel="stylesheet" href="css/custom.css">

  

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

</head>



<body style="font-family: 'Jost', sans-serif;">

  <?php

  if ($_SESSION['user'] == 'cavila') {

    $paginas = PERMITIDO_CARO;

  } else {

    $paginas = PERMITIDO_LUCAS;

  }

  ?>

  

  <div class="container-fluid mb-5">

    <div class="nav nav-justified py-2 nav-pills bg-kuality">

      <?php if (isset($_GET['pagina'])) { ?>

        <!-- listado -->

        <?php if ($_GET['pagina'] == "listado") { ?>

          <li class="nav-item bg-kuality">

            <a class="nav-link active" href="index.php?pagina=listado"><i class="fas fa-list"></i><span> Listado de prendas</span></a>

          </li>

        <?php } else { ?>

          <li class="nav-item bg-kuality">

            <a class="nav-link" href="index.php?pagina=listado"><i class="fas fa-list"></i><span> Listado de prendas</span></a>

          </li>

        <?php } ?>



        <?php if ($_SESSION['user'] == 'cavila') {

          // prendas

          if ($_GET['pagina'] == "prendas") { ?>

            <li class="nav-item">

              <a class="nav-link active" href="index.php?pagina=prendas"><i class="fas fa-tshirt"></i><span> Prendas</span></a>

            </li>

          <?php } else { ?>

            <li class="nav-item">

              <a class="nav-link" href="index.php?pagina=prendas"><i class="fas fa-tshirt"></i><span> Prendas</span></a>

            </li>

          <?php } ?>

          <!-- telas -->

          <?php if ($_GET['pagina'] == "telas") { ?>

            <li class="nav-item">

              <a class="nav-link active" href="index.php?pagina=telas"><i class="fas fa-scroll"></i><span> Telas</span></a>

            </li>

          <?php } else { ?>

            <li class="nav-item">

              <a class="nav-link" href="index.php?pagina=telas"><i class="fas fa-scroll"></i><span> Telas</span></a>

            </li>

        <?php } ?>

          <!-- Calculadora Vinilo -->

          <?php if ($_GET['pagina'] == "calcvinil") { ?>

            <li class="nav-item">

              <a class="nav-link active" href="index.php?pagina=calcvinil"><i class="fas fa-calculator"></i><span> Calculadora vinilos</span></a>

            </li>

          <?php } else { ?>

            <li class="nav-item">

              <a class="nav-link" href="index.php?pagina=calcvinil"><i class="fas fa-calculator"></i><span> Calculadora vinilos</span></a>

            </li>

        <?php } 

        } ?>

        <li class="nav-item">

          <a class="nav-link" href="index.php?pagina=salir"><span>Salir </span><i class="fas fa-sign-out-alt"></i></a>

        </li>

      <?php } else { ?>

        <li class="nav-item">

          <a class="nav-link active" href="index.php?pagina=listado"><i class="fas fa-list"></i><span> Listado de prendas</span></a>

        </li>

        <?php if ($_SESSION['user'] == 'cavila') {  ?>

          <li class="nav-item">

            <a class="nav-link" href="index.php?pagina=prendas"><p>Prendas</p></span></a>

          </li>

          <li class="nav-item">

            <a class="nav-link" href="index.php?pagina=telas"><i class="fas fa-scroll"></i><span> Telas</span></a>

          </li>

          <li class="nav-item">

              <a class="nav-link" href="index.php?pagina=calcvinil"><i class="fas fa-calculator"></i><span> Calculadora vinilos</span></a>

            </li>

      <?php } ?>

          <li class="nav-item">

            <a class="nav-link" href="index.php?pagina=salir"><span>Salir </span><i class="fas fa-sign-out-alt"></i></a>

          </li>

    <?php } ?>

    </div>

  </div>



  <div>

    <?php

    if (isset($_GET['pagina'])) {

      if (in_array($_GET['pagina'], $paginas)) {

        include_once("paginas/" . $_GET['pagina'] . ".php");

      } else {

        include_once("paginas/404.php");

      }

    } else {

      include_once("paginas/listado.php");

    }

    ?>

  </div>



  <footer class="mt-5">

      <div class="col-md-12 col-sm-12 col-xs-12 d-flex justify-content-between px-4" style="background-color: rgba(60, 60, 60, 30%)">

        <p class="copyright-text col-5 inline-block">Copyright &copy; 2022 All Rights Reserved by Alejandro Diaz</p>

    </div>

  </footer>

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->

  <script src="views/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->

  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->

  <script src="js/sweetalert2.all.min.js"></script>

</body>



</html>