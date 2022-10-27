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
        dom: 'lBfrtip',
        buttons: [
        {
            extend: 'excel',
            className: 'dt-button',
            text: '<i class="fa-solid fa-file-excel"></i> Exportar Excel'
        }],
        language:{
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
    });
});