<?php
declare(strict_types=1);

namespace App\Models;

class Vehiculo
{
    public function __construct(
        public int $id,
        public string $marca,
        public string $modelo,
        public int $anio,
        public string $tipo
    ) {
    }
}
?>