$(document).ready(function(){
    var today = new Date();
    var day = today.getDate();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    hoy = day + "-" + month + "-" + year;
    $('#pedidos').DataTable({
        responsive: true,
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '<i class="fa-solid fa-file-excel"></i> Exportar Excel',
                className: 'btn btn-success',
                title: 'Pedidos hasta ' + hoy,
                excelStyles: {                      // Add an excelStyles definition
                    template:['blue_medium' , 'header_cyan']
                },
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf"></i> Exportar PDF',
                className: 'btn btn-danger',
                title: 'Pedidos hasta ' + hoy
            }
        ],
        language:{
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        "lengthMenu": [ 25, 50, 75, 100 ],
        "pageLength": 50,
        order: [[4, 'desc']]
    });
});

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
                    location.href = 'http://lakapsula.local/index.php?pagina=pedidosConfeccion'
                });
        } 
    });
}

function buscarPedidoEntreFechas(){
    var fecha_desde = document.getElementById("fecha_desde").value
    var fecha_hasta = document.getElementById("fecha_hasta").value
    data = {
        fecha_desde : fecha_desde,
        fecha_hasta : fecha_hasta
    }
    $.ajax({
        url: "../../ajax/Pedidos/pedidosEntreFechas.php",
        type: "POST",
        data: data
        }).done(function(res){
            $("#pedidos_entre_fechas").html(res);
        });
}