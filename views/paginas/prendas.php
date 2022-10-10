<div class="container text-center">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Nueva prenda</h3></div> 
        
        <form method="post" name="prendas" action="../ajax/savePrendas.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <input type="text" class="form-control" name="prenda_nombre" placeholder="Nombre prenda">
                </div>
                <div class="form-group">
                    <label for="prenda_telas">Telas</label>
                    <input type="text" class="form-control" name="prenda_telas" placeholder="Telas (Separado por comas)">
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen">
                </div>
            </div>  
            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Guardar"></input>
            </div>
        </form>
    </div>
</div>