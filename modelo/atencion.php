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
    public function setear($datos)
    {
        $this->setIdAtencion($datos['idAtencion']);
        $this->setObjCliente($datos['objCliente']);
        $this->setObjPeluquero($datos['objPeluquero']);
        $this->setObjServicio($datos['objServicio']);

        $this->setFechaAtencion($datos['fechaAtencion']);
        $this->setHoraAtencion($datos['horaAtencion']);
        $this->setMetodoPago($datos['metodoPago']);
        $this->setCortePagadoPeluquero($datos['cortePagadoPeluquero']);
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



      // Consultas a la Base de Datos
      public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $idAtencion=$this->getIdAtencion();
        $sql = "SELECT * FROM atencion WHERE idAtencion = '$idAtencion'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $objCliente=new cliente;
                    $objPeluquero= new peluquero;
                    $objServicio= new servicio;
                    $objCliente->setIdCliente($row['idCliente']);
                    $objCliente->cargar();
                    $objPeluquero->setIdPeluquero($row['idPeluquero']);
                    $objPeluquero->cargar();
                    $objServicio->setIdServicio($row['idServicio']);
                    $objServicio->cargar();
                    $this->setear(['idAtencion' => $row['idAtencion'], 'objPeluquero' => $objPeluquero,
                    'objCliente' => $objCliente ,'objServicio' => $objServicio, 
                    'fechaAtencion'=>$row['fechaAtencion'], 'horaAtencion'=>$row['horaAtencion'],
                    'metodoPago'=>['metodoPago'],'cortePagadoPeluquero'=>$row['cortePagadoPeluquero']]);
                }
            }
        } else {
            $this->setMensajeOperacion("usuario->listar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {

        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM atencion ";
        if ($parametro != "") {
            $sql = $sql . 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res >= 0) {
                while ($row = $base->Registro()) {
                    $objCliente=new cliente;
                    $objPeluquero= new peluquero;
                    $objServicio= new servicio;
                    $objCliente->setIdCliente($row['idCliente']);
                    $objCliente->cargar();
                    $objPeluquero->setIdPeluquero($row['idPeluquero']);
                    $objPeluquero->cargar();
                    $objServicio->setIdServicio($row['idServicio']);
                    $objServicio->cargar();
                    $obj = new atencion();
                    $obj->setear(['idAtencion' => $row['idAtencion'], 'objPeluquero' => $objPeluquero,
                    'objCliente' => $objCliente ,'objServicio' => $objServicio, 
                    'fechaAtencion'=>$row['fechaAtencion'], 'horaAtencion'=>$row['horaAtencion'],
                    'metodoPago'=>['metodoPago'],'cortePagadoPeluquero'=>$row['cortePagadoPeluquero']]);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("cliente->listar: " . $base->getError());
        }

        return $arreglo;
    }
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        $idAtencion=$this->getIdAtencion();
        $objCliente=$this->getObjCliente();
        $idCliente=$objCliente->getIdCliente();
        $objPeluquero=$this->getObjPeluquero();
        $idPeluquero=$objPeluquero->getIdPeluquero();
        $objServicio=$this->getObjServicio();
        $idServicio=$objServicio->getIdServicio();

        $fechaAtencion = $this->getFechaAtencion();
        $horaAtencion = $this->getHoraAtencion();
        $metodoPago = $this->getMetodoPago();
        $cortePagadoPeluquero=$this->getCortePagadoPeluquero();
        
        $sql = "INSERT INTO atencion(idPeluquero, 
        idCliente, idServicio, fechaAtencion, horaAtencion, metodoPago, 
        cortePagadoPeluquero)
        VALUES ('$idPeluquero', '$idCliente', '$idServicio', '$fechaAtencion', 
        '$horaAtencion', '$metodoPago' , '$cortePagadoPeluquero')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdAtencion($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("cliente->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("cliente->insertar: " . $base->getError());
        }

        return $resp;
    }


    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idAtencion=$this->getIdAtencion();
        
        $objCliente=$this->getObjCliente();
        $idCliente=$objCliente->getIdCliente();
        
        $objPeluquero=$this->getObjPeluquero();
        $idPeluquero=$objPeluquero->getIdPeluquero();
        
        $objServicio=$this->getObjServicio();
        $idServicio=$objServicio->getIdServicio();

        $fechaAtencion = $this->getFechaAtencion();
        $horaAtencion = $this->getHoraAtencion();
        $metodoPago = $this->getMetodoPago();
        $cortePagadoPeluquero=$this->getCortePagadoPeluquero();
      

        $sql = "UPDATE atencion
                SET idAtencion = '$idAtencion', idPeluquero = '$idPeluquero' ,
                 idCliente = '$idCliente' , idServicio = '$idServicio', 
                 horaAtencion = '$horaAtencion', 
                fechaAtencion = '$fechaAtencion', metodoPago = '$metodoPago', 
                cortePagadoPeluquero = '$cortePagadoPeluquero'
                WHERE idAtencion = '$idAtencion'";
                echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setMensajeOperacion("Peluquero->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Peluquero->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;

        $idAtencion = $this->getIdAtencion();

        if ($base->Iniciar()) {
            $sql = "DELETE FROM atencion WHERE idAtencion = '$idAtencion'";
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setMensajeOperacion("Cliente->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Cliente->eliminar: " . $base->getError());
        }
        return $resp;
    }
    





}
