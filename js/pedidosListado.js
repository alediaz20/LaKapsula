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