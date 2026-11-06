<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\VehicleController;

$controller = new VehicleController();

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $vehiculo = ($id !== false && $id !== null)
        ? $controller->getById($id)
        : null;

    require __DIR__ . '/../src/Views/vehiculo_get.php';

} elseif ($method === 'POST') {
    $json = $_POST['jsonPost'] ?? '';
    $vehiculoData = json_decode($json, true);

    if (!is_array($vehiculoData)) {
        $vehiculos = [];
        $error = 'El JSON introducido no es válido.';
    } else {
        $vehiculos = $controller->store($vehiculoData);
    }

    require __DIR__ . '/../src/Views/vehiculo_post.php';
}
?>