<?php
require_once("class.kapsula.php");
class cTelas extends cKapsula
{
    public function __construct()
    {
        $this->mainTable = TBL_TELAS;
        $this->mysqli = $this->connect();
    }

    /**
     * Devuelve el listado de telas 
     *
     * @return telas
     */
    public function getTelas()
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` ORDER BY id");

        if ($result) {
            while ($row = $result->fetch_object()) {
                $telas[] = $row;
            }
            $result->close();
        }
        return $telas;
    }

    /**
     * Actualiza una prenda en la db
     *
     * @param [array] $data
     * @return result
     */
    function editTela($data)
    {
        $precio_por_metro = $data['tela_precio'] / $data['tela_rendimiento'];
        $sql = "UPDATE `" . $this->mainTable . "` SET `nombre`='" . $data['tela_nombre'] . "',`precio_por_kg`=" . $data['tela_precio'] . ",`metros_por_kg`=" . $data['tela_rendimiento'] . ",`precio_por_metro`=" . $precio_por_metro . " WHERE id=" . $data['id'];
        $result = $this->mysqli->query($sql);

        return $result;
    }

    /**
     * Almacena una tela en la db
     *
     * @param [array] $data
     * @return result
     */
    function saveTelas($data){
        $precio_por_metro = $data['tela_precio'] / $data['tela_rendimiento'];
        $sql = "INSERT into `".$this->mainTable."`(nombre,precio_por_kg,metros_por_kg,precio_por_metro) VALUES ('".$data['tela_nombre']."',".$data['tela_precio'].",".$data['tela_rendimiento'].",".$precio_por_metro.")";
        $result = $this->mysqli->query($sql);

        return $result;
    }
}
