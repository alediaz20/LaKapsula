<?php
require_once("class.kapsula.php");

class cVinilos extends cKapsula
{

    public function __construct()
    {
        $this->mainTable = TBL_VINILOS;
        $this->mysqli = $this->connect();
    }

    /**
     * Devuelve el listado de vinilos
     *
     * @return vinilos
     */
    public function getVinilos()
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` ORDER BY id");
        if ($result) {
            while ($row = $result->fetch_object()) {
                $vinilos[] = $row;
            }
            $result->close();
        }
        return $vinilos;
    }


    /**
     * Actualiza un vinilo en la db
     *
     * @param [array] $data
     * @return void
     */
    public function editVinilo($data)
    {
        $sql = "UPDATE `" . $this->mainTable . "` SET `nombre_para_mostrar`='" . $data['nombre'] . "',`precio`=" . $data['precio'] . " WHERE id=" . $data['id'];
        $result = $this->mysqli->query($sql);
        return $result;
    }

    /**
     * Calcula el costo de corte de un vinilo
     *
     * @param [array] $data
     * @return resultado
     */
    public function calcularCorte($data)
    {
        $vinilos = $this->getVinilos();
        
        $corte = $data['ancho'] * $data['alto'];
        foreach ($vinilos as $key => $value) {
            if ($data['tipo'] == $value->nombre) {
                $costocm = $value->precio / $value->dimension;
                $costo = $corte * $costocm;
                $resultado = $costo * 3;
            }
        }
        $result = ["a_cobrar"=>$resultado,"costo"=>$costo];
        return $result; 
    }
}
