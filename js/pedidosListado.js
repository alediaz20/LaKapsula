function entregar(id){
    $.ajax({
            url: "../../ajax/entregarPrenda.php",
            type: "POST",
            data: id
            }).done({
                // location.reload()
            });
}

function eliminar(id,nombre){
    data = {"id":id}
    Swal.fire({
        title: 'Eliminar pedido de '+nombre+'?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../ajax/eliminarPedido.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://lakapsula.local/index.php?pagina=pedidos'
                });
        } 
    });
}

function entregar(id,nombre,nombreprenda){
    data = {"id":id}
    Swal.fire({
        title: 'Entregar '+nombreprenda+' a '+nombre+'?',
        showCancelButton: true,
        confirmButtonText: 'Entregar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../ajax/entregarPrenda.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://lakapsula.local/index.php?pagina=pedidos'
                });
        } 
    });
}

function entregar_a_klt(id,nombreprenda){
    data = {"id":id}
    Swal.fire({
        title: 'Entregar '+nombreprenda+'?',
        showCancelButton: true,
        confirmButtonText: 'Entregar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../ajax/entregarAKlt.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://lakapsula.local/index.php?pagina=pedidosConfeccion'
                });
        } 
    });
}

$(document).ready(function(){
    $('#pedidos').DataTable({
        responsive: true,
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'excel',
                // className: 'dt-button',
                text: '<i class="fa-solid fa-file-excel"></i> Exportar Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> Exportar PDF',
                className: 'btn btn-danger'
            }
        ],
        language:{
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        order: [[0, 'desc']]
    });
});