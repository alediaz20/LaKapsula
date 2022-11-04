function verPedidos(nombre){
    data = {"nombre":nombre}
    $.ajax({
        url: "../ajax/Clientes/verPedidosCliente.php",
        type: "POST",
        data: data
    }).done(function (res) {
        document.getElementById("pedidos_cliente_card").style = "display: block";
        $("#pedidos_cliente_header").html("Pedidos de "+nombre.toUpperCase());
        $("#pedidos_cliente_body").html(res);
    });
}


function eliminar(id,nombre){
    data = {"id":id,
            "nombre":nombre}
    Swal.fire({
        title: 'Eliminar pedido de '+nombre+'?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../ajax/Pedidos/eliminarPedido.php",
                type: "POST",
                data: data
                }).done(function(){
                    verPedidos(nombre);
                    // location.href = 'http://lakapsula.online/index.php?pagina=clientes&nombre='+nombre;
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
                url: "../../ajax/Pedidos/entregarPrenda.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://www.lakapsula.online/index.php?pagina=pedidos'
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
                url: "../../ajax/Pedidos/entregarAKlt.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://www.lakapsula.online/index.php?pagina=pedidosConfeccion'
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
        "lengthMenu": [ 25, 50, 75, 100 ],
        "pageLength": 50,
        order: [[0, 'desc']]
    });
});