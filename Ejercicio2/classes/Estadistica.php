<?php
require_once __DIR__ . '/../interfaces/EstadisticaInterface.php';

abstract class Estadistica implements EstadisticaInterface
{
    abstract public function calcularMedia(array $datos): float;
    abstract public function calcularMediana(array $datos): float;
    abstract public function calcularModa(array $datos): array;
}

