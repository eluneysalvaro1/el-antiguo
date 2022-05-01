<?php

class cliente
{
    private $idCliente;
    private $nombre;
    private $apellido;
    private $telefono;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idCliente = '';
        $this->nombre = '';
        $this->telefono = '';
        $this->apellido = '';
        $this->mensajeOperacion = '';
    }
    // Metodos Setters
    public function setear($datos)
    {
        $this->setIdPeluquero($datos['idCliente']);
        $this->setNombre($datos['nombre']);
        $this->setApellido($datos['apellido']);
        $this->setTelefono($datos['telefono']);
    }

    //Getters y Setters
    public function getIdCliente(){
        return $this->idCliente;
    } 
    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
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
        $sql = "SELECT * FROM cliente WHERE idCliente = " . $this->getIdCliente();
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
?>