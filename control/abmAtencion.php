<?php

class abmPeluquero
{
   
    public function cargarObjeto($param){
        $obj = null;
        if (
            array_key_exists('idAtencion', $param) and
            array_key_exists('idCliente', $param) and
            array_key_exists('idPeluquero', $param) and
            array_key_exists('idServicio', $param) and
            array_key_exists('fechaAtencion', $param) and
            array_key_exists('horaAtencion', $param) and
            array_key_exists('metodoPago', $param) and
            array_key_exists('cortePagadoPeluquero', $param)
        ) {
            
            $objCliente = new cliente(); 
            $objCliente->setIdCliente($param['idCliente']);
            $objCliente->cargar();
           
            $objPeluquero = new peluquero(); 
            $objPeluquero->setIdPeluquero($param['idPeluquero']);
            $objPeluquero->cargar();
        
            $objServicio = new servicio(); 
            $objServicio->setIdServicio($param['idServicio']);
            $objServicio->cargar();
            
            $fechaAtencion = date("m-d-y");
            $horaAtencion = date("H:i:s");


            $obj = new atencion();
            $obj->setear([$param['idAtencion'],'objPeluquero' => $objPeluquero, 'objServicio' => $objServicio, 
            'objCliente' => $objCliente, 'fechaAtencion' => $fechaAtencion, 
            'horaAtencion' => $horaAtencion , $param['metodoPago'], $param['cortePagadoPeluquero']]);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    public function seteadosCamposClaves($param)
    {
        $resp = false;
        if (isset($param)) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param)
    {
        // print_r($param);
        $resp = false;
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null and $elObjtTabla->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }



    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['idAtencion']))
                $where .= ' and idAtencion = ' . "'" . $param['idAtencion'] . "'";
            if (isset($param['idCliente']))
                $where .= ' and idCliente =' . $param['idCliente'] . "'";
            if (isset($param['idPeluquero']))
                $where .= ' and idPeluquero =' ."'". $param['idPeluquero'] . "'";
            if (isset($param['idServicio']))
                $where .= ' and idServicio =' ."'". $param['idServicio'] . "'";
            if (isset($param['fechaAtencion']))
                $where .= ' and fechaAtencion =' ."'". $param['fechaAtencion'] . "'";
            if (isset($param['horaAtencion']))
                $where .= ' and horaAtencion =' ."'". $param['horaAtencion'] . "'";
            if (isset($param['metodoPago']))
                $where .= ' and metodoPago =' ."'". $param['metodoPago'] . "'";
            if (isset($param['cortePagadoPeluquero']))
                $where .= ' and cortePagadoPeluquero =' ."'". $param['cortePagadoPeluquero'] . "'";
        }
        $arreglo = atencion::listar($where);
        return $arreglo;
    }
}


?>