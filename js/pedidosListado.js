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
        "language":{
        "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        }
    });
});