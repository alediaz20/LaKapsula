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
const TBL_CLIENTES = 'clientes';
const TBL_COBROS = 'cobros';



const PERMITIDO_LUCAS = [
    "listado" => [ "dir" => "Prendas/listado.php" ],
    "pedidos" => [ "dir" => "Pedidos/pedidos.php" ],
    "nuevoPedido" => [ "dir" => "Pedidos/nuevoPedido.php" ],
    "clientes" => [ "dir" =>"Clientes/clientes.php" ],
    "agregarDinero" => [ "dir" =>"Clientes/agregarDinero.php" ],
    "login" => [ "dir" => "login.php" ],
    "salir" => [ "dir" => "salir.php" ],   
];

    
const PAGINAS_LUCAS = [
    "listado"=>["nombre"=>"Listado de prendas", "icon"=>"fas fa-ellipsis-v"],
    "nuevoPedido"=>["nombre"=>"Nuevo Pedido", "icon"=>"fas fa-cart-plus"],
    "pedidos"=>["nombre"=>"Ver Pedidos", "icon"=>"fas fa-eye"],
    "clientes"=>["nombre"=>"Clientes", "icon"=>"fas fa-users"],
    "salir"=>["nombre"=>"Salir", "icon"=>"fas fa-sign-out-alt"],
];

const PERMITIDO_CARO = [
            "prendas" => [ "dir" => "Prendas/prendas.php" ],
            "listado" => [ "dir" => "Prendas/listado.php" ],
            "editarPrenda" => [ "dir" => "Prendas/editarPrenda.php" ],
            "telas" => [ "dir" => "Telas/telas.php" ],
            "editarTela" => [ "dir" => "Telas/editarTela.php" ],
            "pedidos" => [ "dir" => "Pedidos/pedidos.php" ],
            "nuevoPedido" => [ "dir" => "Pedidos/nuevoPedido.php" ],
            "pedidosConfeccion" => [ "dir" =>"Pedidos/pedidosConfeccion.php" ],
            "calcvinil" => [ "dir" => "Vinilos/calcvinil.php" ],
            "editarVinilo" => [ "dir" => "Vinilos/editarVinilo.php" ],
            "clientes" => [ "dir" =>"Clientes/clientes.php" ],
            "agregarDinero" => [ "dir" =>"Clientes/agregarDinero.php" ],
            "cobros" => [ "dir" => "Cobros/cobros.php" ],
            "login" => [ "dir" => "login.php" ],
            "salir" => [ "dir" => "salir.php" ],   
];
    
const PAGINAS_CARO = [
    "listado"=>["nombre"=>"Listado de prendas", "icon"=>"fas fa-ellipsis-v"],
    "prendas"=>["nombre"=>"Prendas", "icon"=>"fas fa-tshirt"],
    "telas"=>["nombre"=>"Telas", "icon"=>"fas fa-scroll"],
    "calcvinil"=>["nombre"=>"Calculadora de vinilos", "icon"=>"fas fa-calculator"],
    "nuevoPedido"=>["nombre"=>"Nuevo Pedido", "icon"=>"fas fa-cart-plus"],
    "pedidos"=>["nombre"=>"Ver Pedidos", "icon"=>"fas fa-eye"],
    "pedidosConfeccion"=>["nombre"=>"Ver Pedidos a confeccionar", "icon"=>"fas fa-eye"],
    "clientes"=>["nombre"=>"Clientes", "icon"=>"fas fa-users"],
    "cobros"=>["nombre"=>"Cobros", "icon"=>"fas fa-dollar"],
    "salir"=>["nombre"=>"Salir", "icon"=>"fas fa-sign-out-alt"],
];

const TALLES = ["4","8","10","12","16","S","M","L","XL","XXL","MEDIAS"];

const URL_ajax = "http://capsula.local/ajax";
const URL_local = "http://capsula.local/";
// const DIR_model = "http://capsula.local/model";

defined('DIR_ROOT') || define('DIR_ROOT',$_SERVER['DOCUMENT_ROOT']."/");
defined('DIR_AJAX') || define('DIR_AJAX',$_SERVER['DOCUMENT_ROOT']."/ajax/");
defined('DIR_MODEL') || define('DIR_MODEL',$_SERVER['DOCUMENT_ROOT']."/model/");
defined('DIR_VIEWS') || define('DIR_VIEWS',$_SERVER['DOCUMENT_ROOT']."/views/");


