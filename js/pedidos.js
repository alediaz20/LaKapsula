function actualizarPrecio(precio, id_prenda) {
    document.getElementById("precio").value = precio;
    document.getElementById("precio_para_descuento").value = precio;
    document.getElementById("id_prenda").value = id_prenda;
    document.getElementById("total_descuento").value = " ";
    document.getElementById("porc_descuento").value = " ";
}

function aplicarDescuento() {
    var precio = document.getElementById("precio_para_descuento").value;
    var descuento = document.getElementById("porc_descuento").value;
    desc = precio / 100;
    desc = desc * descuento;
    document.getElementById("total_descuento").value = desc;
    precio = parseInt(precio) - parseInt(desc);
    document.getElementById("precio").value = precio;
}

function nuevoPedido() {
    var id_prenda = document.getElementById("id_prenda").value;
    var nombre = document.getElementById("nombre").value;
    var prenda = document.getElementById("prenda").value;
    var talle = document.getElementById("talle").value;
    var precio = document.getElementById("precio").value;
    let error = "";

    if (prenda == "Seleccione una prenda") {
        error = error + "prenda,";
    }
    if (nombre == "") {
        error = error + "nombre,";
    }
    if (talle == "Seleccione un talle") {
        error = error + "talle";
    }
    if (error != "") {
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "Falta ingresar: " + error,
            showConfirmButton: false,
            timer: 2500,
        });
        error = "";
    } else {
        data = {
            id_prenda: id_prenda,
            nombre: nombre,
            prenda: prenda,
            talle: talle,
            precio: precio,
        };

        $.ajax({
            url: "../ajax/Pedidos/nuevoPedido.php",
            type: "POST",
            data: data,
        }).done(function (res) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Pedido registrado",
                showConfirmButton: false,
                timer: 2500,
            });
        });
    }
}
