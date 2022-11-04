function saveTela() {
    var tela_nombre = document.getElementById("tela_nombre").value;
    var tela_precio = document.getElementById("tela_precio").value;
    var tela_rendimiento = document.getElementById("tela_rendimiento").value;
    data = {
        tela_nombre: tela_nombre,
        tela_precio: tela_precio,
        tela_rendimiento: tela_rendimiento,
    };
    Swal.fire({
        title: "Guardar tela?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/Telas/saveTelas.php",
            type: "POST",
            data: data,
        }).done(function () {
            location.href = "http://capsula.local/index.php?pagina=telas";
        });
        }
    });
}

function editTela() {
    var id = document.getElementById("id").value;
    var tela_nombre = document.getElementById("tela_nombre").value;
    var tela_precio = document.getElementById("tela_precio").value;
    var tela_rendimiento = document.getElementById("tela_rendimiento").value;
    data = {
        id: id,
        tela_nombre: tela_nombre,
        tela_precio: tela_precio,
        tela_rendimiento: tela_rendimiento,
    };
    Swal.fire({
        title: "Guardar cambios?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax({
            url: "../../ajax/telas/editTela.php",
            type: "POST",
            data: data,
        }).done(function () {
            location.href = "http://capsula.local/index.php?pagina=telas";
        });
        }
    });
}