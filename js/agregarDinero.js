function AgregarDinero(){
    
var precio = document.getElementById("precio").value;
var nueva_entrega = document.getElementById("nueva_entrega").value;
var entrega_anterior = document.getElementById("entrega_anterior").value;
var id = document.getElementById("id").value;
    data = {"id":id,
            "precio":precio,
            "nueva_entrega":nueva_entrega,
            "entrega_anterior":entrega_anterior
        }
    Swal.fire({
    title: 'Agregar <b>$'+nueva_entrega+'?</b>',
    showCancelButton: true,
    confirmButtonText: 'Agregar',
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/agregarDinero.php",
            type: "POST",
            data: data
            }).done(function(){
                location.href = 'http://lakapsula.online/index.php?pagina=clientes';
            });
    } 
});


}
    
    