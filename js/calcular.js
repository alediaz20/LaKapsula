let costoautoadhesivo = 728 / 6000;
let costotermocomun = 1232 / 5000;
let costoespecial = 2218 / 5000;
let costofluo = 1680 / 5000;
let costoreflec = 3204 / 5000;
let porcentajeganancia = 3; //300%


function calcular(){
    let tipo = document.getElementById("tipovinilo").value
    let a = document.getElementById("ancho").value
    let b = document.getElementById("alto").value
    let corte = a*b;
    var resultado;
    var costo;
    console.log(a);
    console.log(b);
    console.log(tipo);

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
    }
    
    
}