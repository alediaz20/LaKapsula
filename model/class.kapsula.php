<?php
require_once("class.telas.php");
require_once("class.prendas.php");
require_once($_SERVER['DOCUMENT_ROOT']."/ajax/config.php");

class cKapsula {

    public function connect(){
        $mysqli = new mysqli(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME);
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        return $mysqli;
    }

    /**
     * Calcula los costos de las prendas
     *
     * @return costo
     */
    public function calcularCostos(){
        $cPrendas = new cPrendas;
        $cTelas = new cTelas;

        $prendas = $cPrendas->getPrendas();
        $telas = $cTelas->getTelas();
        
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
        return $costo; 
    }


}