<?php

require_once("class.kapsula.php");

class cCobros extends cKapsula
{

    public function __construct()
    {
        $this->mainTable = TBL_COBROS;
        $this->mysqli = $this->connect();
    }

    public function getCobros()
    {
        $sql = "SELECT * FROM `" . $this->mainTable . "`";

        $result = $this->mysqli->query($sql);

        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_object()) {
                $cobros[] = $row;
            }
        }
        return $cobros;
    }

    public function saveCobro($data)
    {
        $monto_total = $data['monto_total'];

        $monto_ale = $monto_total / 7;
        $monto_caro = $monto_total - $monto_ale;

        $fecha = $data['fecha_cobro'];
        $fecha = date_create($fecha);
        $fecha = date_format($fecha, "Y:m:d h:m:s");

        $insert = "INSERT INTO `".$this->mainTable."`(monto_total,monto_caro,monto_ale,fecha_cobro) VALUES ('" . $monto_total . "','" . $monto_caro . "','" . $monto_ale . "','" . $fecha . "')";

        $result = $this->mysqli->query($insert);
        return $result;
    }
}
