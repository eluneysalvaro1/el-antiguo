<?php

class atencion
{
    private $idAtencion;
    private $objPeluquero;
    private $objServicio;
    private $objCliente;
    private $fechaAtencion;
    private $horaAtencion;
    private $metodoPago;
    private $cortePagadoPeluquero;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idAtencion = '';
        $this->objPeluquero = '';
        $this->objServicio = '';
        $this->objCliente = '';
        $this->fechaAtencion = '';
        $this->horaAtencion = '';
        $this->metodoPago = '';
        $this->cortePagadoPeluquero = false;
        $this->mensajeOperacion = '';
    }


    //Setters and Getters
    public function getIdAtencion(){
        return $this->idAtencion;
    }
    public function setIdAtencion($idAtencion){
        $this->idAtencion = $idAtencion;
    }
    public function getObjPeluquero(){
        return $this->objPeluquero;
    } 
    public function setObjPeluquero($objPeluquero){
        $this->objPeluquero = $objPeluquero;
    }
    public function getObjServicio(){
        return $this->objServicio;
    }
    public function setObjServicio($objServicio){
        $this->objServicio = $objServicio;
    }
    public function getObjCliente(){
        return $this->objCliente;
    }
    public function setObjCliente($objCliente){
        $this->objCliente = $objCliente;
    }
    public function getFechaAtencion(){
        return $this->fechaAtencion;
    }
    public function setFechaAtencion($fechaAtencion){
        $this->fechaAtencion = $fechaAtencion;;
    }
    public function getHoraAtencion(){
        return $this->horaAtencion;
    }
    public function setHoraAtencion($horaAtencion){
        $this->horaAtencion = $horaAtencion;
    }
    public function getMetodoPago(){
        return $this->metodoPago;
    }
    public function setMetodoPago($metodoPago){
        $this->metodoPago = $metodoPago;
    }
    public function getCortePagadoPeluquero(){
        return $this->cortePagadoPeluquero;
    }
    public function setCortePagadoPeluquero($cortePagadoPeluquero){
        $this->cortePagadoPeluquero = $cortePagadoPeluquero;
    }
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }


    
}
