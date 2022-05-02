<?php

class abmPeluquero
{
   
    public function cargarObjeto($param){
        $obj = null;
        if (
            array_key_exists('idServicio', $param) and
            array_key_exists('nombre', $param) and
            array_key_exists('precio', $param) 
        
        ) {
            
            $obj = new peluquero();
            $obj->setear($param['idServicio'], $param['nombre'], $param['precio']);
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
            if (isset($param['idServicio']))
                $where .= ' and idServicio = ' . "'" . $param['idServicio'] . "'";
            if (isset($param['nombre']))
                $where .= ' and nombre =' . $param['nombre'] . "'";
            if (isset($param['precio']))
                $where .= ' and precio =' ."'". $param['precio'] . "'";
        }
        $arreglo = servicio::listar($where);
        return $arreglo;
    }
}


?>