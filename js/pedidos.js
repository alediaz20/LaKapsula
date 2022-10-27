function actualizarPrecio(precio,id_prenda){
    document.getElementById("precio").value = precio;
    document.getElementById("id_prenda").value = id_prenda;
}

const nombre = document.getElementById("nombre");
const prenda = document.getElementById("prenda");
const talle = document.getElementById("talle");
const form = document.getElementById("pedido");
let error = "";

form.addEventListener("submit", e=>{
    e.preventDefault();
    if(prenda.value == "Seleccione una prenda"){
        error = error + "prenda,"
    }
    if(nombre.value.lenght == ""){
        error = error + "nombre,"
    }
    if(talle.value == "Seleccione un talle"){
        error = error + "talle"
    }
    if(error != ""){
        Swal.fire({
            position: "center",
            icon: "warning",
            title: "Falta ingresar: " + error,
            showConfirmButton: false,
            timer: 2500,
        });
        error = "";
    }else{
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Pedido registrado",
            showConfirmButton: false,
            timer: 2500,
        });
        form.submit();
    }
});


