$(document).ready(function(){
    new Chart($prendas, {
        type: "bar",
        data: {
            labels: labelsPrendas,
            datasets: [dataPrendas],
        },
        options: {
            borderRadius:20,
        },
    });
    
    new Chart($pedidosMensuales, {
        type: "bar",
        data: {
            labels: labelsPedidos,
            datasets: [dataPedidosMensuales],
        },
        options: {
            borderRadius:20,
        },
    });
});



// Mas Pedidos
function getMasPedidos() {
    var result = "";
    $.ajax({
        url: "../ajax/Pedidos/getMasPedidos.php",
        async: false,
        success: function (data) {
        result = data;
        },
    });
    return result;
}

var respuestaPrendas = getMasPedidos();
respuestaPrendas = JSON.parse(respuestaPrendas);

// seteo Prendas mas pedidas
const $prendas = document.querySelector("#prendas");
const labelsPrendas = respuestaPrendas.labels;

const dataPrendas = {
    label: "Cantidad",
    data: respuestaPrendas.data,
    borderWidth: 1,
};

// Pedidos Mensuales
function getPedidosMensuales() {
    var resultPedidosMensuales = "";
    $.ajax({
        url: "../ajax/Pedidos/getPedidosMensuales.php",
        async: false,
        type: "POST",
        entregado: false,
        success: function (data) {
        resultPedidosMensuales = data;
        },
    });
    return resultPedidosMensuales;
}

// Seteo Pedidos mensuales
var pedidosMensuales = getPedidosMensuales();
pedidosMensuales = JSON.parse(pedidosMensuales);
const $pedidosMensuales = document.querySelector("#pedidosMensuales");
const labelsPedidos = pedidosMensuales.labels;

const dataPedidosMensuales = {
    label: "Cantidad",
    data: pedidosMensuales.data,
    borderWidth: 1,
};

