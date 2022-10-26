function calcular() {
    let a = document.getElementById("ancho").value;
    let b = document.getElementById("alto").value;
    let tipo = document.getElementById("tipovinilo").value;
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
            url: "../ajax/calcularVinilo.php",
            type: "POST",
            data: ruta
        }).done(function (res) {
            document.getElementById("resultado").style = "display: block";
            $("#resultado").html(res);
        });
    }
}
