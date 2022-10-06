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
    <link rel="stylesheet" href="css/custom.css">
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
</head>
<body style="font-family: 'Jost', sans-serif;">

<div class="container mb-4">
    <button class="btn btn-primary"><a href="../index.php" class="text-white">Inicio</a></button>    
    <button class="btn btn-primary"><a href="telas.php" class="text-white">Agregar tela</a></button>
</div>

<div class="container">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Nueva prenda</h3></div> 
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <input type="text" class="form-control" id="prenda_nombre" placeholder="Nombre prenda">
                </div>
                <div class="form-group">
                    <label for="prenda_telas">Telas</label>
                    <input type="text" class="form-control" id="prenda_telas" placeholder="Telas (Separado por comas)">
                </div>
                <div class="form-group">
                    <label for="prenda_imagen">Imagen</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="prenda_imagen">
                            <label class="custom-file-label" for="prenda_imagen">Subir imagen</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">subir</span>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="card-footer">
                <button class="btn btn-primary" onclick="guardarTela()">Guardar</button>
            </div>
        </form>
        </div>
</div>