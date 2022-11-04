function calcular() {
    let a = document.getElementById("ancho").value;
    let b = document.getElementById("alto").value;
    let tipo = document.getElementById("tipovinilo").value;
    console.log(tipo)
    var ruta = "ancho=" + a + "&alto=" + b + "&tipo=" + tipo;
    if (a == 0 || b == 0) {
    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Como vas a multiplicar por 0, keidiota",
        showConfirmButton: false,
        timer: 2500,
    });
    } else {
        $.ajax({
            url: "../ajax/Vinilos/calcularVinilo.php",
            type: "POST",
            data: ruta
        }).done(function (res) {
            document.getElementById("resultado").style = "display: block";
            $("#resultado").html(res);
        });
    }
}

function guardarVinilo(){
    var id = document.getElementById("id").value
    var nombre = document.getElementById("nombre").value
    var precio = document.getElementById("precio").value
    data = {
        id:id,
        nombre:nombre,
        precio:precio
    }
    Swal.fire({
        title: "Guardar cambios?",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../ajax/Vinilos/editVinilo.php",
                type: "POST",
                data: data
            }).done(function () {
                swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Cambios guardados",
                    showConfirmButton: false,
                    timer: 2500,
                });
                location.href = "http://capsula.local/index.php?pagina=calcvinil";
            });
        }
    });

    

}