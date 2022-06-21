<?php

class conexion
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->server;dbname=album", $this->user, $this->password);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConexion($sql) //insertar//borrar//actualizar//
    {
        $this->conexion->exec($sql);
        return $this->conexion->lastInsertId();
    }

    public function getConsulta($sql) //select//
    {
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
