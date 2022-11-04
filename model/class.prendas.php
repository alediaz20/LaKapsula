<?php
require_once("class.kapsula.php");

class cPrendas extends cKapsula
{
    public function __construct()
    {
        $this->mainTable = TBL_PRENDAS;
        $this->mysqli = $this->connect();
    }

    /**
     * Devuelve el listado de prendas
     *
     * @return prendas
     */
    public function getPrendas()
    {
        $result = $this->mysqli->query("SELECT * FROM `".$this->mainTable."` ORDER BY id");
        if ($result) {
            while ($row = $result->fetch_object()) {
                $prendas[] = $row;
            }
            $result->close();
        }
        return $prendas;
    }

    /**
     * Devuelve una prenda por id
     *
     * @return prendas
     */
    public function getPrendaById($id)
    {
        $result = $this->mysqli->query("SELECT * FROM `".$this->mainTable."`WHERE id=".$id);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $prenda[] = $row;
            }
            $result->close();
        }
        return $prenda[0];
    }

    /**
     * Almacena una prenda en la DB
     *
     * @param [array] $data
     */
    public function savePrenda($data)
    {
        $sql = "INSERT INTO `".$this->mainTable."`(nombre,telas,metros_por_tela) VALUES ('" . $data['prenda_nombre'] . "','" . $data['prenda_telas'] . "','" . $data['metros_por_tela'] . "')";
        $result = $this->mysqli->query($sql);

        $sql2 = "SELECT id FROM `".$this->mainTable."` WHERE `nombre` = '" . $data['prenda_nombre'] . "'";
        $result = $this->mysqli->query($sql2);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $prenda[] = $row;
            }
            $result->close();
        }

        $idprenda = $prenda[0]->id;
        $directorio = '../imgs/prendas/';
        $subir_archivo = $directorio . basename($idprenda . ".png");
        move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo);
    }

    /**
     * Actualiza una prenda en la db
     *
     * @param [array] $data
     * @return void
     */
    public function editPrenda($data)
    {
        $sql = "UPDATE `".$this->mainTable."` SET `nombre`='" . $data['prenda_nombre'] . "',`telas`='" . $data['prenda_telas'] . "',`metros_por_tela`='" . $data['metros_por_tela'] . "' WHERE id=" . $data['id'];
        $result = $this->mysqli->query($sql);
        
        return $result;
    }
}
