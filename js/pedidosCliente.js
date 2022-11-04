

function verPedidos(nombre){
    data = {"nombre":nombre}
    $.ajax({
        url: "../ajax/verPedidosCliente.php",
        type: "POST",
        data: data
    }).done(function (res) {
        document.getElementById("pedidos_cliente_card").style = "display: block";
        $("#pedidos_cliente_header").html("Pedidos de "+nombre.toUpperCase());
        $("#pedidos_cliente_body").html(res);
    });
}


$(document).ready(function(){
    $('#clientes').DataTable({
        responsive: true,
        dom: 'fltp',
        language:{
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "lengthMenu": [ 20, 40, 80, 100 ],
        "pageLength": 20,
        order: [[0, 'asc']],
    });
});