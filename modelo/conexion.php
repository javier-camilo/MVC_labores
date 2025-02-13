<?php

class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "labores_db";
    public $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->user, $this->password, $this->database);
        $this->conexion->set_charset("utf8");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}

?>
