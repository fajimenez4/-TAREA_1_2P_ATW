<?php
interface EstadisticaInterface
{
    public function calcularMedia(array $datos): float;
    public function calcularMediana(array $datos): float;
    public function calcularModa(array $datos): array;
}