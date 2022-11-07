

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

function AgregarDinero() {
    var precio = document.getElementById("precio").value;
    var nueva_entrega = document.getElementById("nueva_entrega").value;
    var entrega_anterior = document.getElementById("entrega_anterior").value;
    var id = document.getElementById("id").value;
    data = {
        id: id,
        precio: precio,
        nueva_entrega: nueva_entrega,
        entrega_anterior: entrega_anterior,
    };
    Swal.fire({
        title: "Agregar <b>$" + nueva_entrega + "?</b>",
        showCancelButton: true,
        confirmButtonText: "Agregar",
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/Clientes/agregarDinero.php",
            type: "POST",
            data: data,
        }).done(function () {
            location.href = "http://capsula.local/index.php?pagina=clientes";
        });
        }
    });
}
