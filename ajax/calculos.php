<?php

require_once("connect.php");

require_once("getTelas.php");

require_once("getPrendas.php");



$precio_por_tela = array();



foreach ($prendas as $id => $value) {

    $nombre = $value->nombre;
    $costo[$nombre] = ["id"=>$value->id,
                        "precio"=> 0];

    $telas_de_prenda = explode(",",$value->telas);

    $metros_por_tela = explode(",",$value->metros_por_tela);

    

    $tela_cantidad = array();

    foreach($telas_de_prenda as $key => $value){

        $tela_cantidad[ucwords($value)] = $metros_por_tela[$key];

    }



    foreach($telas_de_prenda as $key=>$value){

        $telas_de_prenda[$key] = ucwords($value);

    }



    foreach($telas as $key => $value){

        $telas[$key]->nombre = ucwords($telas[$key]->nombre);

    }



    foreach($telas as $key=>$value){

        if(in_array($value->nombre,$telas_de_prenda)){

            $costo[$nombre]['precio'] += ($value->precio_por_metro * $tela_cantidad[$value->nombre]);

        }

    }    



}



