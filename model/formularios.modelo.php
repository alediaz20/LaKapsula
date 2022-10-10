<?php
require_once("class.db.php");

class ModeloFormularios{

    static public function mdlRegistro($tabla,$data){
        $sql = "INSERT into $tabla(nombre,precio_por_kg,metros_por_kg) VALUES (".$data['nombre'].",".$data['precio_por_kg'].",".$data['metros_por_kg'].")";
        $stmt = cDataBase::conectar()->prepare($sql);
        
        if($stmt->execute()){
            return "ok";
        }else{
            print_r( $stmt->errorInfo());
        }
    }
}
