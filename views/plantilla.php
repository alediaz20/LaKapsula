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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/datatables.min.css"/>
 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/af-2.4.0/b-2.2.3/b-html5-2.2.3/date-1.1.2/r-2.3.0/datatables.min.js"></script>

</head>

<body style="font-family: 'Jost', sans-serif;">

  <?php  if ($_SESSION['user'] == 'cavila') {
            $paginas = PAGINAS_CARO;
            $paginas_permitidas = PERMITIDO_CARO;
          } else {
            $paginas = PAGINAS_LUCAS;
            $paginas_permitidas = PERMITIDO_LUCAS;
          }
  ?>

  <div class="container-fluid mb-5">
    <div class="nav nav-justified py-2 nav-pills bg-kuality">
      <?php foreach($paginas as $pagina => $pag){ ?>
        <li class="nav-item bg-kuality">
          <a class="nav-link <?php if(isset($_GET['pagina']) & ($_GET['pagina'] == $pagina)){ echo 'active';} ?>" href="index.php?pagina=<?php echo $pagina ?>">
            <i class="<?php echo $pag['icon']?>"></i><span> <?php echo $pag['nombre'] ?></span>
          </a>
        </li>
      <?php } ?>
    </div>
  </div> 
      <?php if (isset($_GET['pagina'])) {
              if (in_array($_GET['pagina'], $paginas_permitidas)) {
                include_once("paginas/" . $_GET['pagina'] . ".php");
              } else {
                include_once("paginas/404.php");
              }
            } else {
              include_once("paginas/listado.php");
            }
      ?>
  </div>


<?php
  include_once("footer.php");
?>

  <script src="../js/sweetalert2.all.min.js"></script>
</body>
</html>