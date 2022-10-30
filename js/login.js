function Login(){
    let user = document.getElementById("user").value
    let password = document.getElementById("password").value
    data = {"user":user,
        "password":password};
    $.ajax({
        url: "../../ajax/login.php",
        type: "POST",
        data: data
    }).done(function(res){
        var respuesta = JSON.parse(res);
        if(respuesta.error == true){
            Swal.fire({
                position: "center",
                icon: "warning",
                title:  respuesta.msg,
                showConfirmButton: false,
                timer: 2500,
            });
        }else{
            window.location.href = 'http://lakapsula.local/index.php?pagina=listado';
        }
});
}