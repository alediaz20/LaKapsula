function agregarCobro(){
    var fecha_cobro = document.getElementById("fecha_cobro").value
    var monto_total = document.getElementById("monto_total").value
    
    data = {
        fecha_cobro:fecha_cobro,
        monto_total:monto_total
    }
    Swal.fire({
        title: 'Añadir Cobro ?',
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../../ajax/Cobros/saveCobros.php",
                type: "POST",
                data: data
                }).done(function(){
                    location.href = 'http://lakapsula.local/index.php?pagina=cobros'
                });
        } 
    });
}

$(document).ready(function(){
    $('#cobros').DataTable({
        responsive: true,
        dom: 'lrtip',
        language:{
            "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
        },
        order: [[0, 'asc']],
    });
});