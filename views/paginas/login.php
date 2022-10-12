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
<body style="font-family: 'Jost', sans-serif;" class="bg-secondary">
<div class="container-login100">
<div class="wrap-login100">
    <div class="card bg-kuality">
        <div class="card-header text-center justify-content-center">
            <img src="../../imgs/mainlogo2.png" alt="La Kapsula" height="50%" width="50%">
        </div>
        <div class="card-body">
            <form action="ajax/login.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="User" name="user">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-kuality">Ingresar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
</div>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

