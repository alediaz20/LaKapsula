<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>La Kapsula</title>
  <link rel="icon" type="image/png" href="../imgs/mainlogo.png" />
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

  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/datatables.min.css" />

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/datatables.min.js"></script>
  <script src="../js/sweetalert2.all.min.js"></script>

</head>

<body style="font-family: 'Jost', sans-serif;">
  <div class="container-fluid mb-5">
    <?php include_once("mainmenu.php") ?>
  </div>
  <?php if (isset($_GET['pagina'])) {
    if (in_array($_GET['pagina'], array_keys($paginas_permitidas))) {
      include_once("paginas/" . $paginas_permitidas[$_GET['pagina']]['dir']);
    } else {
      include_once("paginas/404.php");
    }
  } else {
    include_once("paginas/Prendas/listado.php");
  }
  ?>
  </div>

  <footer>
    <?php
    include_once("footer.php");
    ?>
  </footer>


</body>

</html>