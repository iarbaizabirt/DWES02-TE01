<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar vehículo</title>
</head>
<body>
    <h1>Resultado de la búsqueda</h1>

    <?php if ($vehiculo === null): ?>
        <p>No se ha encontrado ningún vehículo con ese ID.</p>
    <?php else: ?>
        <p>ID: <?= htmlspecialchars((string) $vehiculo->id) ?></p>
        <p>Marca: <?= htmlspecialchars($vehiculo->marca) ?></p>
        <p>Modelo: <?= htmlspecialchars($vehiculo->modelo) ?></p>
        <p>Año: <?= htmlspecialchars((string) $vehiculo->anio) ?></p>
        <p>Tipo: <?= htmlspecialchars($vehiculo->tipo) ?></p>

        <?php if ($vehiculo instanceof \App\Models\Coche): ?>
            <p>Puertas: <?= htmlspecialchars((string) $vehiculo->puertas) ?></p>
        <?php elseif ($vehiculo instanceof \App\Models\Moto): ?>
            <p>Sidecar: <?= $vehiculo->sidecar ? 'Sí' : 'No' ?></p>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="index.html">Volver</a></p>
</body>
</html>