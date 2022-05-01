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



      // Consultas a la Base de Datos
      public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM atencion WHERE idAtencion = " . $this->getIdAtencion();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear(['idCliente' => $row['idCliente'], 'nombre' => $row['nombre'],'telefono' => $row['telefono'] ,'apellido' => $row['apellido']]);
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
        $sql = "SELECT * FROM cliente ";
        if ($parametro != "") {
            $sql = $sql . 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res >= 0) {
                while ($row = $base->Registro()) {
                    $obj = new cliente();
                    $obj->setear(['idCliente' => $row['idCliente'], 'nombre' => $row['nombre'],'telefono' => $row['telefono'] ,'apellido' => $row['apellido']]);
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

        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $telefono = $this->getTelefono();
        
        $sql = "INSERT INTO cliente(nombre, apellido, telefono )
                VALUES ('$nombre', '$apellido', '$telefono')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdCliente($elid);
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

        $idCliente = $this->getIdCliente();
        $nombre = $this->getNombre();
        $apellido = $this->getApellido();
        $telefono = $this->getTelefono();

        $sql = "UPDATE cliente
                SET nombre = '$nombre', apellido = '$apellido' , telefono = '$telefono'  
                WHERE idCliente = '$idCliente'";
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

        $idCliente = $this->getIdCliente();

        if ($base->Iniciar()) {
            $sql = "DELETE FROM cliente WHERE idCliente = '$idCliente'";
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
