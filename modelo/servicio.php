<?php
include_once 'conector/BaseDatos';
class servicio
{
    private $idServicio;
    private $nombre;
    private $precio;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idServicio = '';
        $this->nombre = '';
        $this->precio = '';
        $this->mensajeOperacion = '';
    }
    // Metodos Setters
    public function setear($datos)
    {
        $this->setIdServicio($datos['idServicio']);
        $this->setNombre($datos['nombre']);
        $this->setPrecio($datos['precio']);
    }

    //Getters y Setters
   
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getIdServicio(){
        return $this->idServicio;
    }
    public function setIdServicio($idServicio){
        $this->idServicio = $idServicio;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }




    // Consultas a la Base de Datos
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM servicio WHERE idServicio = " . $this->getIdServicio();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear(['idServicio' => $row['idServicio'], 'nombre' => $row['nombre'],'precio' => $row['precio'] ]);
                }
            }
        } else {
            $this->setMensajeOperacion("servicio->listar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {

        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM servicio ";
        if ($parametro != "") {
            $sql = $sql . 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res >= 0) {
                while ($row = $base->Registro()) {
                    $obj = new servicio();
                    $obj->setear(['idServicio' => $row['idServicio'], 'nombre' => $row['nombre'],'precio' => $row['precio']]);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("servicio->listar: " . $base->getError());
        }

        return $arreglo;
    }
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;

        $nombre = $this->getNombre();
        $precio = $this->getPrecio();

        $sql = "INSERT INTO servicio(nombre, precio)
                VALUES ('$nombre', '$precio')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdServicio($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("servicio->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("servicio->insertar: " . $base->getError());
        }

        return $resp;
    }


    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();

        $idServicio = $this->getIdServicio();
        $nombre = $this->getNombre();
        $precio = $this->getPrecio();

        $sql = "UPDATE servicio
                SET nombre = '$nombre', precio = '$precio'  
                WHERE idServicio = '$idServicio'";
                echo $sql;
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setMensajeOperacion("Servicio->modificar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Servicio->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;

        $idServicio = $this->getIdServicio();

        if ($base->Iniciar()) {
            $sql = "DELETE FROM servicio WHERE idServicio = '$idServicio'";
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setMensajeOperacion("servicio->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("servicio->eliminar: " . $base->getError());
        }
        return $resp;
    }
    
    
   


    
}
?>