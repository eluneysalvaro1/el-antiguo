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



}
