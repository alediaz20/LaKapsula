<?php
require_once("class.kapsula.php");
require_once("class.pedidos.php");

class cClientes extends cKapsula
{

    public function __construct()
    {
        $this->mainTable = TBL_CLIENTES;
        $this->mysqli = $this->connect();
    }

    public function getClientes()
    {
        $sql = "SELECT * FROM `" . $this->mainTable . "`";
        $result = $this->mysqli->query($sql);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $clientes[] = $row;
            }
            $result->close();
        }
        return $clientes;
    }


    public function getClienteByName($nombre)
    {
        $sql = "SELECT * FROM `" . $this->mainTable . "` WHERE nombre_apellido = '" . $nombre . "'";
        $result = $this->mysqli->query($sql);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $cliente[] = $row;
            }
            $result->close();
        }
        return $cliente;
    }

    public function createCliente($nombre, $monto)
    {
        $sql = "INSERT INTO `" . $this->mainTable . "` (nombre_apellido, monto_debe, monto_entrega) VALUES ('" . $nombre . "','" . $monto . "','0')";
        $result = $this->mysqli->query($sql);
        return $result;
    }
    public function updateClienteMonto($monto, $id)
    {
        $sql = "UPDATE `" . $this->mainTable . "` SET `monto_debe` = '" . $monto . "' WHERE `clientes`.`id` = " . $id;
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function getPedidosCliente($nombre)
    {
        $cPedidos = new cPedidos();
        $pedidos = $cPedidos->getPedidosByCliente($nombre);
        return $pedidos;
    }
}
