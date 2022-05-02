<?php

class abmPeluquero
{
   
    public function cargarObjeto($param){
        $obj = null;
        if (
            array_key_exists('idPeluquero', $param) and
            array_key_exists('nombre', $param) and
            array_key_exists('apellido', $param) and
            array_key_exists('telefono', $param) and
            array_key_exists('email', $param) and
            array_key_exists('pass', $param) and
            array_key_exists('porcentajePago', $param)
        ) {
            
            $obj = new peluquero();
            $obj->setear($param['idPeluquero'], $param['nombre'], $param['apellido'], 
            $param['telefono'], $param['pass'], $param['email'], $param['porcentajePago']);
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
            if (isset($param['idPeluquero']))
                $where .= ' and idPeluquero = ' . "'" . $param['idPeluquero'] . "'";
            if (isset($param['nombre']))
                $where .= ' and nombre =' . $param['nombre'] . "'";
            if (isset($param['apellido']))
                $where .= ' and apellido =' ."'". $param['apellido'] . "'";
            if (isset($param['telefono']))
                $where .= ' and telefono =' ."'". $param['telefono'] . "'";
            if (isset($param['email']))
                $where .= ' and email =' ."'". $param['email'] . "'";
            if (isset($param['pass']))
                $where .= ' and pass =' ."'". $param['pass'] . "'";
            if (isset($param['porcentajePago']))
                $where .= ' and porcentajePago =' ."'". $param['porcentajePago'] . "'";
        }
        $arreglo = peluquero::listar($where);
        return $arreglo;
    }
}


?>