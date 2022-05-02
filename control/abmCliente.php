<?php

class abmCliente
{
   
    public function cargarObjeto($param){
        $obj = null;
        if (
            array_key_exists('idCliente', $param) and
            array_key_exists('nombre', $param) and
            array_key_exists('apellido', $param) and
            array_key_exists('telefono', $param)
        ) {
            
            $obj = new cliente();
            $obj->setear($param['idCliente'], $param['nombre'], $param['apellido'], $param['telefono']);
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
            if (isset($param['idCliente']))
                $where .= ' and idCliente = ' . "'" . $param['idCliente'] . "'";
            if (isset($param['nombre']))
                $where .= ' and nombre =' . $param['nombre'] . "'";
            if (isset($param['apellido']))
                $where .= ' and apellido =' ."'". $param['apellido'] . "'";
                if (isset($param['telefono']))
                $where .= ' and telefono =' ."'". $param['telefono'] . "'";
        }
        $arreglo = cliente::listar($where);
        return $arreglo;
    }
}

?>