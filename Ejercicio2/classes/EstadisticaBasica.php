<?php
require_once __DIR__ . '/Estadistica.php';

class EstadisticaBasica extends Estadistica
{
    public function calcularMedia(array $datos): float
    {
        return array_sum($datos) / count($datos);
    }

    public function calcularMediana(array $datos): float
    {
        sort($datos);
        $n = count($datos);
        return ($n % 2 === 0) ? ($datos[$n / 2 - 1] + $datos[$n / 2]) / 2 : $datos[floor($n / 2)];
    }

    public function calcularModa(array $datos): array
    {
        $freq = array_count_values($datos);
        $max = max($freq);
        return array_keys($freq, $max);
    }

    public function generarInforme(array $datos): array
    {
        $informe = [];
        foreach ($datos as $nombre => $valores) {
            $informe[$nombre] = [
                'media' => $this->calcularMedia($valores),
                'mediana' => $this->calcularMediana($valores),
                'moda' => $this->calcularModa($valores),
            ];
        }
        return $informe;
    }
}
