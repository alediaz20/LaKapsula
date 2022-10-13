let costoautoadhesivo = 1500 / 6000;
let costotermocomun = 2100 / 5000;
let costoespecial = 3800 / 5000;
let costofluo = 2900 / 5000;
let costoreflec = 5300 / 5000;
let costoholo = 2900 / 5000;
let porcentajeganancia = 3; //300%


function calcular(){
    let tipo = document.getElementById("tipovinilo").value
    let a = document.getElementById("ancho").value
    let b = document.getElementById("alto").value
    let corte = a*b;
    var resultado;
    var costo;

    if(tipo == "textil"){
        costo = corte * costotermocomun;
    }
    if(tipo == "autoadhesivo"){
        costo = corte * costoautoadhesivo;
    }
    if(tipo == "especial"){
        costo = corte * costoespecial;
        resultado = costo * porcentajeganancia;
    }
    if(tipo == "fluo"){
        costo = corte * costofluo;
    }
    if(tipo == "reflec"){
        costo = corte * costoreflec;
    }
    if(tipo == "holografico"){
        costo = corte * costoholo;
    }

    if(a == 0 || b == 0){
            Swal.fire({
                position: 'top-end',
                icon: 'warning',
                title: 'Como vas a multiplicar por 0, keidiota',
                showConfirmButton: false,
                timer: 2500
        })
    }else{
        resultado = costo * porcentajeganancia;
        document.getElementById("resultado1").innerHTML = "Precio a cobrar $"+resultado.toFixed(2);
        document.getElementById("resultado2").innerHTML = "Costo del corte $"+costo.toFixed(2);
        document.getElementById("resultado").style="display: block";
    }
}
