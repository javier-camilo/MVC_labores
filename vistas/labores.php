<?php
require_once "../modelo/LaboresModel.php";
$modelo = new LaboresModel();
$labores = $modelo->obtenerLabores();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Labores</title>
    <title>Pagina de labores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>



<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrCjyj9jMK3IXfyZwbk8-_LviZLbqt7O34Xg&s" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Gestion de labores
    </a>
  </div>
</nav>


<div class="container-fluid row mt-4">

    <!-- Formulario -->
    <form action="../controlador/LaboresController.php" method="POST" class="col-4 p-3">
        <h3 class="text-center text-primary">Registro de labores</h3>

        <?php
        if (isset($_GET["msg"])) {
            if ($_GET["msg"] == "success") {
                echo '<div class="alert alert-success">Registro guardado correctamente</div>';
            } elseif ($_GET["msg"] == "error") {
                echo '<div class="alert alert-danger">Error al registrar los datos</div>';
            } elseif ($_GET["msg"] == "empty") {
                echo '<div class="alert alert-warning">Todos los campos son obligatorios</div>';
            } elseif ($_GET["msg"] == "deleted") {
                echo '<div class="alert alert-success">Registro eliminado correctamente</div>';
            } elseif ($_GET["msg"] == "delete_error") {
                echo '<div class="alert alert-danger">Error al eliminar el registro</div>';
            } elseif ($_GET["msg"] == "invalid_id") {
                echo '<div class="alert alert-warning">ID inválido para eliminar</div>';
            }
            if (isset($_GET["msg"])) {
                if ($_GET["msg"] == "updated") {
                    echo '<div class="alert alert-success">Registro actualizado correctamente</div>';
                } elseif ($_GET["msg"] == "update_error") {
                    echo '<div class="alert alert-danger">Error al actualizar el registro</div>';
                }
            }
        }
        ?>


        <div class="mb-3">
            <label class="form-label">Labor</label>
            <input type="text" class="form-control" name="labor" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tarifa</label>
            <input type="number" class="form-control" name="tarifa" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Empleado</label>
            <input type="text" class="form-control" name="empleado" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Lote</label>
            <input type="text" class="form-control" name="lote" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>

    <!-- Tabla de registros -->
    <div class="col-8 p-4">
        <h3 class="mt-4">Lista de Labores</h3>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Labor</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Tarifa</th>
                    <th>Empleado</th>
                    <th>Lote</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($datos = $labores->fetch_object()) { ?>
                    <tr>
                        <td><?= $datos->id ?></td>
                        <td><?= $datos->labor ?></td>
                        <td><?= $datos->fecha ?></td>
                        <td><?= $datos->cantidad ?></td>
                        <td><?= $datos->tarifa ?></td>
                        <td><?= $datos->empleado ?></td>
                        <td><?= $datos->lote ?></td>
                        <td>
                            <a href="editar_labor.php?id=<?= $datos->id ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="../controlador/LaboresController.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $datos->id ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta labor?');">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
