<div class="container-telas px-4">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">Nueva prenda</h3></div> 
        
        <form method="post" name="prendas" action="../ajax/savePrendas.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="prenda_nombre">Prenda</label>
                    <input type="text" class="form-control form-control-border border-width-2" name="prenda_nombre" placeholder="Nombre prenda">
                </div>
                <div class="form-group">
                    <label for="prenda_telas">Telas</label>
                    <input type="text" class="form-control form-control-border border-width-2" name="prenda_telas" placeholder="Telas (Separado por comas)">
                </div>
                <div class="form-group">
                    <label for="metros_por_tela">Metros por tela</label>
                    <input type="text" class="form-control form-control-border border-width-2" name="metros_por_tela" placeholder="Metros por tela (Separado por comas)">
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
    <?php require_once("ajax/getPrendas.php"); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Prendas</h3>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Prenda</th>
                        <th>Telas</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($prendas as $key => $value){ ?>
                    <tr>
                        <td><?php echo $value->id;?></td>
                        <td><?php echo $value->nombre; ?></td>
                        <td><?php echo $value->telas; ?></td>
                        <td><a href="index.php?pagina=editarPrenda&id=<?php echo $value->id ?>" class="btn btn-info">Editar</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>