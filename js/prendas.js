function editarPrenda() {
    var id = document.getElementById("id").value;
    var prenda_nombre = document.getElementById("prenda_nombre").value;
    var prenda_telas = document.getElementById("prenda_telas").value;
    var metros_por_tela = document.getElementById("metros_por_tela").value;
    
    data = {
        id: id,
        prenda_nombre: prenda_nombre,
        prenda_telas: prenda_telas,
        metros_por_tela: metros_por_tela
    };
    Swal.fire({
        title: "Guardar cambios?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/prendas/editPrenda.php",
            type: "POST",
            data: data,
        }).done(function () {
            location.href = "http://capsula.local/index.php?pagina=prendas";
        });
        }
    });
}

function savePrenda() {
    var prenda_nombre = document.getElementById("prenda_nombre").value;
    var metros_por_tela = document.getElementById("metros_por_tela").value;
    var imagen = document.getElementById("imagen").value;

    var telas = $('#telas').select2('data')
    var prenda_telas = "";

    for (var i = 0; i < telas.length; i++) {
        prenda_telas = prenda_telas + telas[i].id + ","
    }

    data = {
        prenda_nombre: prenda_nombre,
        prenda_telas: prenda_telas,
        metros_por_tela: metros_por_tela,
        imagen: imagen
    };
    Swal.fire({
        title: "Guardar prenda?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/prendas/savePrendas.php",
            type: "POST",
            data: data,
        }).done(function () {
            location.href = "http://capsula.local/index.php?pagina=prendas";
        });
        }
    });
}

$(document).ready(function() {
    $('#telas').select2({
        allowClear: true,
        theme: 'classic'
    });
});