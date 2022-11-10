<?php
require_once("class.kapsula.php");

class cPedidos extends cKapsula
{

    public function __construct()
    {
        $this->mainTable = TBL_PEDIDOS;
        $this->tableCliente = TBL_CLIENTES;
        $this->mysqli = $this->connect();
    }

    /**
     * Devuelve listado de pedidos
     *
     * @return pedidos
     */
    public function getPedidos()
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` ORDER BY fecha_pedido DESC");
        if ($result) {
            while ($row = $result->fetch_object()) {
                $pedidos[] = $row;
            }
            $result->close();
        }
        return $pedidos;
    }

    /**
     * Devuelve un pedido
     *
     * @return pedidos
     */
    public function getPedidoById($id)
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` WHERE id=".$id);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $pedido[] = $row;
            }
            $result->close();
        }
        return $pedido[0];
    }
    
    /**
     * Devuelve un pedido
     *
     * @return pedidos
     */
    public function getPedidosByCliente($nombre)
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` WHERE nombre_apellido='".$nombre."'");
        if ($result) {
            while ($row = $result->fetch_object()) {
                $pedido[] = $row;
            }
            $result->close();
        }

        if(isset($pedido)){
            return $pedido;
        }else{
            return null;
        }
    }

    /**
     * Devuleve total de pedidos
     *
     * @return totalpedidos
     */
    public function getTotalPedidos()
    {
        $result = $this->mysqli->query("SELECT * FROM `" . $this->mainTable . "` ORDER BY fecha_pedido DESC");
        $totalpedidos = $result->num_rows;
        return $totalpedidos;
    }

    /**
     * Devuelve un top de pedidos mas solicitados
     *
     * @return MasPedidos
     */
    public function getMasPedidos($cant)
    {
        $result = $this->mysqli->query("SELECT prenda, COUNT(*) as cantidad FROM `" . $this->mainTable . "` u GROUP BY prenda HAVING COUNT(*) ORDER BY cantidad DESC LIMIT 0," . $cant);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $maspedidos[] = $row;
            }
            $result->close();
        }
        return $maspedidos;
    }
    
    /**
     * Devuelve cantidad de pedidos por mes, pasarle true si quiere solo los pedidos entregados
     *
     * @return pedidosmensuales
     */
    public function getPedidosMensuales($entregados = false)
    {
        if($entregados){
            $sql = "SELECT COUNT(*) as cantidad, MONTHNAME(p.fecha_pedido) AS Mes FROM `".$this->mainTable."` p GROUP BY Mes WHERE fecha_entrega != '0000-00-00 00:00:00'";
        }else{
            $sql = "SELECT COUNT(*) as cantidad, MONTHNAME(p.fecha_pedido) AS Mes FROM `".$this->mainTable."` p GROUP BY Mes";
        }
        $result = $this->mysqli->query($sql);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $pedidosMensuales[] = $row;
            }
            $result->close();
        }
        return $pedidosMensuales;
    }

    /**
     * Devuelve cantidad de pedidos entre fechas
     *
     * @return MasPedidos
     */
    public function getPedidosEntreFechas($fecha_desde,$fecha_hasta)
    {
        $sql = "SELECT COUNT(*) as cantidad FROM `".$this->mainTable."` WHERE fecha_pedido BETWEEN '".$fecha_desde."' AND '".$fecha_hasta."'";
        $result = $this->mysqli->query($sql);
        if ($result) {
            while ($row = $result->fetch_object()) {
                $pedidosMensuales[] = $row;
            }
            $result->close();
        }
        return $pedidosMensuales;
    }

    /**
     * Devuelve cantidad de pedidos entregados
     *
     * @return cantidadEntregado
     */
    public function getCantidadEntregado()
    {
        $result = $this->mysqli->query("SELECT * from `" . $this->mainTable . "` WHERE fecha_entrega != '0000-00-00 00:00:00'");

        $cantidadEntregado = $result->num_rows;
        return $cantidadEntregado;
    }


    public function savePedido($data)
    {
        require_once("class.clientes.php");
        $cCliente = new cClientes();

        $nombre = strtolower($data['nombre']);

        $sql = "INSERT into `" . $this->mainTable . "`(id_prenda,prenda,talle,nombre_apellido,precio,fecha_entrega) VALUES (" . $data['id_prenda'] . ",'" . $data['prenda'] . "','" . $data['talle'] . "','" . $nombre . "'," . $data['precio'] . ",'0000-00-00 00:00:00')";
        $result = $this->mysqli->query($sql);

        //Obtengo cliente para actualizar
        $cliente = $cCliente->getClienteByName($nombre);

        if ($cliente) {
            $monto_debe = $cliente[0]->monto_debe + $data['precio'];
            $cCliente->updateClienteMonto($monto_debe, $cliente[0]->id);
        } else {
            $cCliente->createCliente($nombre, $data['precio']);
        }

        return $result;
    }

    public function deletePedido($id,$nombre)
    {   
        require_once("class.clientes.php");
        $cCliente = new cClientes();

        $pedidoactual = $this->getPedidoById($id);
        $preciopedido = $pedidoactual->precio;

        $cliente = $cCliente->getClienteByName($nombre);
        
        if (isset($cliente)) {
            $monto_debe = $cliente[0]->monto_debe - $preciopedido;
            if ($monto_debe < 0) {
                $monto_debe = 0;
            }
            $cCliente->updateClienteMonto($monto_debe,$cliente[0]->id);
        }

        // Borro pedido
        $sql = "DELETE FROM `" . $this->mainTable . "` WHERE id = " . $id;
        $result = $this->mysqli->query($sql);
        return $result;
    }

    public function entregarPrenda($id)
    {
        $fechaahora = date("Y:m:d h:m:s");
        $sql = "UPDATE `".$this->mainTable."` SET `fecha_entrega`='".$fechaahora."' WHERE id = ".$id;
        $result = $this->mysqli->query($sql);
        return $result;
    }
    public function entregarKLT($id)
    {
        $fechaahora = date("Y:m:d h:m:s");
        $sql = "UPDATE `".$this->mainTable."` SET `entregado_a_klt`='".$fechaahora."' WHERE id = ".$id;
        $result = $this->mysqli->query($sql);
        return $result;
    }
}
