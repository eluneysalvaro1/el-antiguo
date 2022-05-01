<?php

class peluquero
{
    private $idPeluquero;
    private $nombre;
    private $pass;
    private $email;
    private $apellido;
    private $telefono;
    private $porcentajePago;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idPeluquero = '';
        $this->nombre = '';
        $this->pass = '';
        $this->email = '';
        $this->telefono = '';
        $this->apellido = '';
        $this->porcentajePago = ''; 
        $this->mensajeOperacion = '';
    }
    // Metodos Setters
    public function setear($datos)
    {
        $this->setIdPeluquero($datos['idPeluquero']);
        $this->setNombre($datos['nombre']);
        $this->setPass($datos['pass']);
        $this->setEmail($datos['email']);
        $this->setApellido($datos['apellido']);
        $this->setTelefono($datos['telefono']);
        $this->setProcentajePago($datos['porcentajePago']);
    }

    //Getters y Setters
    public function getIdPeluquero(){
        return $this->idPeluquero;
    } 
    public function setIdPeluquero($idPeluquero){
        $this->idPeluquero = $idPeluquero;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass = $pass;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
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
    public function getPorcentajePago(){
        return $this->porcentajePago;
    }
    public function setPorcentajePago($porcentajePago){
        $this->porcentajePago = $porcentajePago;
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
        $sql = "SELECT * FROM peluquero WHERE idPeluquero = " . $this->getIdPeluquero();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear(['idPeluquero' => $row['idPeluquero'], 'nombre' => $row['nombre'],'pass' => $row['pass'], 'email' => $row['email'], 'telefono' => $row['telefono'] ,'apellido' => $row['apellido'] , 'porcentajePago' => $row['porcentajePago']]);
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
        $sql = "SELECT * FROM peluquero ";
        if ($parametro != "") {
            $sql = $sql . 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res >= 0) {
                while ($row = $base->Registro()) {
                    $obj = new peluquero();
                    $obj->setear(['idPeluquero' => $row['idPeluquero'], 'nombre' => $row['nombre'],'pass' => $row['pass'], 'email' => $row['email'], 'telefono' => $row['telefono'] ,'apellido' => $row['apellido'] , 'porcentajePago' => $row['porcentajePago']]);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("peluquero->listar: " . $base->getError());
        }

        return $arreglo;
    }
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;

        $nombre = $this->getNombre();
        $pass = $this->getPass();
        $email = $this->getEmail();
        $apellido = $this->getApellido();
        $telefono = $this->getTelefono();
        $porcentajePago = $this->getPorcentajePago();
        
        $sql = "INSERT INTO peluquero(nombre, apellido, email, telefono , pass , porcentajePago)
                VALUES ('$nombre', '$apellido', '$email', '$telefono' , '$pass' , '$porcentajePago')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdPeluquero($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("peluquero->insertar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("peluquero->insertar: " . $base->getError());
        }

        return $resp;
    }


    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();

        $idPeluquero = $this->getIdPeluquero();
        $nombre = $this->getNombre();
        $pass = $this->getPass();
        $email = $this->getEmail();
        $apellido = $this->getApellido();
        $telefono = $this->getTelefono();
        $porcentajePago = $this->getPorcentajePago();

        $sql = "UPDATE peluquero 
                SET nombre = '$nombre', pass = '$pass', email = '$email', apellido = '$apellido' , telefono = '$telefono' , porcentajePago = '$porcentajePago'  
                WHERE idPeluquero = '$idPeluquero'";
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

        $idPeluquero = $this->getIdPeluquero();

        if ($base->Iniciar()) {
            $sql = "DELETE FROM peluquero WHERE idPeluquero = '$idPeluquero'";
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setMensajeOperacion("Peluquero->eliminar: " . $base->getError());
            }
        } else {
            $this->setMensajeOperacion("Peluquero->eliminar: " . $base->getError());
        }
        return $resp;
    }
    
    
   

    
}

?>