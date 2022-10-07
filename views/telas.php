<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prendas</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jost:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/custom.css">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>
<body style="font-family: 'Jost', sans-serif;">

<div class="container mb-4">
    <button class="btn btn-primary"><a href="../index.php" class="text-white">Inicio</a></button>
    <button class="btn btn-primary"><a href="prendas.php" class="text-white">Agregar prendas</a></button>
</div>
<div class="container-telas p-3">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Nueva tela</h3></div> 
        <form method="post" name="telas" action="../ajax/saveTelas.php">
            <div class="card-body">
                <div class="form-group">
                    <label for="tela_nombre">Tela</label>
                    <input type="text" class="form-control" name="tela_nombre" placeholder="Tela">
                </div>
                <label for="tela_precio">Precio x Kg</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input type="number" class="form-control" name="tela_precio" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label for="tela_rendimiento">Metros por kg</label>
                    <input type="text" class="form-control" name="tela_rendimiento" placeholder="Cuantos metros rinde un kg">
                </div>
            </div>  
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div>
        </form>
    </div>
    <?php require_once("../ajax/getTelas.php"); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Telas</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Tela</th>
                        <th>Precio x Kg</th>
                        <th style="width: 40px">Metros x Kg</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($telas as $key => $value){ ?>
                    <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->nombre; ?></td>
                        <td>$<?php echo $value->precio_por_kg; ?></td>
                        <td><?php echo $value->metros_por_kg; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="../js/telas.js"></script>
</body>