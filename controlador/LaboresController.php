<?php
require_once "../modelo/LaboresModel.php";

class LaboresController {
    private $modelo;

    public function __construct() {
        $this->modelo = new LaboresModel();
    }

    public function registrarLabor() {
        if (!empty($_POST["labor"]) && !empty($_POST["fecha"]) && !empty($_POST["cantidad"]) && !empty($_POST["tarifa"]) && !empty($_POST["empleado"]) && !empty($_POST["lote"])) {
            $labor = $_POST["labor"];
            $fecha = $_POST["fecha"];
            $cantidad = $_POST["cantidad"];
            $tarifa = $_POST["tarifa"];
            $empleado = $_POST["empleado"];
            $lote = $_POST["lote"];

            if ($this->modelo->insertarLabor($labor, $fecha, $cantidad, $tarifa, $empleado, $lote)) {
                header("Location: ../vistas/labores.php?msg=success");
                exit();
            } else {
                header("Location: ../vistas/labores.php?msg=error");
                exit();
            }
        } else {
            header("Location: ../vistas/labores.php?msg=empty");
            exit();
        }
    }

    public function eliminarLabor() {
        if (!empty($_POST["id"])) {
            $id = $_POST["id"];
            if ($this->modelo->eliminarLabor($id)) {
                header("Location: ../vistas/labores.php?msg=deleted");
                exit();
            } else {
                header("Location: ../vistas/labores.php?msg=delete_error");
                exit();
            }
        } else {
            header("Location: ../vistas/labores.php?msg=invalid_id");
            exit();
        }
    }

    public function editarLabor() {
        if (!empty($_POST["id"]) && !empty($_POST["labor"]) && !empty($_POST["fecha"]) && !empty($_POST["cantidad"]) && !empty($_POST["tarifa"]) && !empty($_POST["empleado"]) && !empty($_POST["lote"])) {
            $id = $_POST["id"];
            $labor = $_POST["labor"];
            $fecha = $_POST["fecha"];
            $cantidad = $_POST["cantidad"];
            $tarifa = $_POST["tarifa"];
            $empleado = $_POST["empleado"];
            $lote = $_POST["lote"];
    
            if ($this->modelo->actualizarLabor($id, $labor, $fecha, $cantidad, $tarifa, $empleado, $lote)) {
                header("Location: ../vistas/labores.php?msg=updated");
                exit();
            } else {
                header("Location: ../vistas/labores.php?msg=update_error");
                exit();
            }
        } else {
            header("Location: ../vistas/labores.php?msg=empty");
            exit();
        }
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LaboresController();
    
    if (isset($_POST["accion"])) {
        if ($_POST["accion"] == "eliminar") {
            $controller->eliminarLabor();
        } elseif ($_POST["accion"] == "editar") {
            $controller->editarLabor();
        } else {
            $controller->registrarLabor();
        }
    } else {
        $controller->registrarLabor();
    }
}

?>
