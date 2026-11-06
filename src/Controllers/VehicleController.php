<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Vehiculo;
use App\Models\Coche;
use App\Models\Moto;

require_once __DIR__ . '/../../recursos/vehiculos_bbdd.php';

class VehicleController
{
    private function leerVehiculos(): array
    {
        $vehiculos = [];

        foreach (VEHICULOS as $datos) {
            if ($datos['tipo'] === 'coche') {
                $vehiculos[] = new Coche(
                    $datos['id'],
                    $datos['marca'],
                    $datos['modelo'],
                    $datos['anio'],
                    $datos['tipo'],
                    $datos['puertas']
                );
            } elseif ($datos['tipo'] === 'moto') {
                $vehiculos[] = new Moto(
                    $datos['id'],
                    $datos['marca'],
                    $datos['modelo'],
                    $datos['anio'],
                    $datos['tipo'],
                    $datos['sidecar']
                );
            }
        }

        return $vehiculos;
    }

    public function getById(int $id): ?Vehiculo
    {
        $vehiculos = $this->leerVehiculos();

        foreach ($vehiculos as $vehiculo) {
            if ($vehiculo->id === $id) {
                return $vehiculo;
            }
        }

        return null;
    }

    public function store(array $vehiculoData): array
    {
        $vehiculos = $this->leerVehiculos();

        if ($vehiculoData['tipo'] === 'coche') {
            $nuevoVehiculo = new Coche(
                $vehiculoData['id'],
                $vehiculoData['marca'],
                $vehiculoData['modelo'],
                $vehiculoData['anio'],
                $vehiculoData['tipo'],
                $vehiculoData['puertas']
            );
        } elseif ($vehiculoData['tipo'] === 'moto') {
            $nuevoVehiculo = new Moto(
                $vehiculoData['id'],
                $vehiculoData['marca'],
                $vehiculoData['modelo'],
                $vehiculoData['anio'],
                $vehiculoData['tipo'],
                $vehiculoData['sidecar']
            );
        } else {
            return $vehiculos;
        }

        $vehiculos[] = $nuevoVehiculo;

        return $vehiculos;
    }
}
?>