<?php
require_once "../modelo/LaboresModel.php";

if (!isset($_GET["id"])) {
    header("Location: labores.php?msg=invalid_id");
    exit();
}

$modelo = new LaboresModel();
$id = $_GET["id"];
$labor = $modelo->obtenerLaborPorId($id);

if (!$labor) {
    header("Location: labores.php?msg=not_found");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Labor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Editar Labor</h2>
    <form action="../controlador/LaboresController.php" method="POST">
        <input type="hidden" name="id" value="<?= $labor->id ?>">

        <div class="mb-3">
        <label class="form-label">Labor</label>
        <select class="form-control" name="labor" required>
            <option value="">Seleccione una labor</option>
            <option value="cosecha" <?= $labor->labor == 'cosecha' ? 'selected' : '' ?>>Cosecha</option>
            <option value="siembra" <?= $labor->labor == 'siembra' ? 'selected' : '' ?>>Siembra</option>
            <option value="riego" <?= $labor->labor == 'riego' ? 'selected' : '' ?>>Riego</option>
            <option value="poda" <?= $labor->labor == 'poda' ? 'selected' : '' ?>>Poda</option>
            <option value="fertilizacion" <?= $labor->labor == 'fertilizacion' ? 'selected' : '' ?>>Fertilización</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="<?= $labor->fecha ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" value="<?= $labor->cantidad ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tarifa</label>
            <input type="number" class="form-control" name="tarifa" value="<?= $labor->tarifa ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Empleado</label>
            <input type="text" class="form-control" name="empleado" value="<?= $labor->empleado ?>" required>
        </div>

        <div class="mb-3">
        <label class="form-label">Lote</label>
        <select class="form-control" name="lote" required>
            <option value="">Seleccione un lote</option>
            <option value="lote1" <?= $labor->lote == 'lote1' ? 'selected' : '' ?>>Lote 1</option>
            <option value="lote2" <?= $labor->lote == 'lote2' ? 'selected' : '' ?>>Lote 2</option>
            <option value="lote3" <?= $labor->lote == 'lote3' ? 'selected' : '' ?>>Lote 3</option>
            <option value="lote4" <?= $labor->lote == 'lote4' ? 'selected' : '' ?>>Lote 4</option>
        </select>
        </div>

        <input type="hidden" name="accion" value="editar">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="labores.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
