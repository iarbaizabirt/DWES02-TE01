<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vehículos registrados</title>
</head>
<body>
    <h1>Listado de vehículos</h1>

    <?php if (isset($error)): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php else: ?>
        <?php foreach ($vehiculos as $vehiculo): ?>
            <article>
                <h2>
                    <?= htmlspecialchars($vehiculo->marca . ' ' . $vehiculo->modelo) ?>
                </h2>

                <p>ID: <?= htmlspecialchars((string) $vehiculo->id) ?></p>
                <p>Año: <?= htmlspecialchars((string) $vehiculo->anio) ?></p>
                <p>Tipo: <?= htmlspecialchars($vehiculo->tipo) ?></p>

                <?php if ($vehiculo instanceof \App\Models\Coche): ?>
                    <p>Puertas: <?= htmlspecialchars((string) $vehiculo->puertas) ?></p>
                <?php elseif ($vehiculo instanceof \App\Models\Moto): ?>
                    <p>Sidecar: <?= $vehiculo->sidecar ? 'Sí' : 'No' ?></p>
                <?php endif; ?>
            </article>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="index.html">Volver</a></p>
</body>
</html>