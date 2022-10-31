<?php
const COSTO_VINILO = 1800.00;
const COSTO_CONFECCION = 1700.00;

// Base de datos
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'capsula';

const TBL_PRENDAS = 'prendas';
const TBL_TELAS = 'telas';
const TBL_USERS = 'usuarios';
const TBL_VINILOS = 'vinilos';
const TBL_PEDIDOS = 'pedidos';
const PERMITIDO_LUCAS = ["listado","nuevoPedido","pedidos","login","salir","agregarDinero","clientes"];
const PAGINAS_LUCAS = [
    "listado"=>["nombre"=>"Listado de prendas",
                "icon"=>"fas fa-ellipsis-v"],
    "nuevoPedido"=>["nombre"=>"Nuevo Pedido",
                "icon"=>"fas fa-cart-plus"],
    "pedidos"=>["nombre"=>"Ver Pedidos",
                "icon"=>"fas fa-eye"],
    "clientes"=>["nombre"=>"Clientes",
                "icon"=>"fas fa-users"],
    "salir"=>["nombre"=>"Salir",
            "icon"=>"fas fa-sign-out-alt"]
];

const PERMITIDO_CARO = ["prendas","telas","listado","nuevoPedido","pedidos","editarTela","editarPrenda","calcvinil","editarVinilo","login","salir","agregarDinero","pedidosConfeccion","clientes"];
const PAGINAS_CARO = [
    "listado"=>["nombre"=>"Listado de prendas",
                "icon"=>"fas fa-ellipsis-v"],
    "prendas"=>["nombre"=>"Prendas",
                "icon"=>"fas fa-tshirt"],
    "telas"=>["nombre"=>"Telas",
              "icon"=>"fas fa-scroll"],
    "calcvinil"=>["nombre"=>"Calculadora de vinilos",
                  "icon"=>"fas fa-calculator"],
    "nuevoPedido"=>["nombre"=>"Nuevo Pedido",
                    "icon"=>"fas fa-cart-plus"],
    "pedidos"=>["nombre"=>"Ver Pedidos",
                "icon"=>"fas fa-eye"],
    "pedidosConfeccion"=>["nombre"=>"Ver Pedidos a confeccionar",
                "icon"=>"fas fa-eye"],
    "clientes"=>["nombre"=>"Clientes",
                "icon"=>"fas fa-users"],
    "salir"=>["nombre"=>"Salir",
            "icon"=>"fas fa-sign-out-alt"],
];

const TALLES = ["4","8","12","16","S","M","L","XL","XXL"];

const URL_ajax = "http://capsula.local/ajax";
const URL_local = "http://capsula.local/";
