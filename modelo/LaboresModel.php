<?php
require_once "Conexion.php";

class LaboresModel {
    private $conexion;

    public function __construct() {
        $this->conexion = (new Conexion())->getConexion();
    }

    public function insertarLabor($labor, $fecha, $cantidad, $tarifa, $empleado, $lote) {
        $stmt = $this->conexion->prepare("INSERT INTO labores (labor, fecha, cantidad, tarifa, empleado, lote) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddss", $labor, $fecha, $cantidad, $tarifa, $empleado, $lote);
        return $stmt->execute();
    }

    public function obtenerLabores() {
        $query = "SELECT * FROM labores";
        return $this->conexion->query($query);
    }

    public function eliminarLabor($id) {
        $stmt = $this->conexion->prepare("DELETE FROM labores WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function obtenerLaborPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM labores WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_object();
    }
    
    public function actualizarLabor($id, $labor, $fecha, $cantidad, $tarifa, $empleado, $lote) {
        $stmt = $this->conexion->prepare("UPDATE labores SET labor=?, fecha=?, cantidad=?, tarifa=?, empleado=?, lote=? WHERE id=?");
        $stmt->bind_param("ssddssi", $labor, $fecha, $cantidad, $tarifa, $empleado, $lote, $id);
        return $stmt->execute();
    }

}

?>
