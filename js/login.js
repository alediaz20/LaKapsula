const user = document.getElementById("user");
const password = document.getElementById("password");
const form = document.getElementById("login");
let error = "";

form.addEventListener("submit", e=>{
    e.preventDefault();
    if(user.value == ""){
        error = error + "usuario,"
    }
    if(password.value == ""){
        error = error + "contraseña"
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
        form.submit();
    }
});