function entregar(id){
    var id = document.getElementById
    $.ajax({
            url: "../../ajax/entregarPrenda.php",
            type: "POST",
            data: id
            }).done({
                // location.reload()
            });
}


var tabla = document.querySelector("#pedidos");

var dataTable = new DataTable(tabla);