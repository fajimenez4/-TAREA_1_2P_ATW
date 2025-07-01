<?php
require_once __DIR__ . '/../interfaces/SistemaEcuacionesInterface.php';

abstract class SistemaEcuaciones implements SistemaEcuacionesInterface
{
    abstract public function calcularResultado(array $ecuaciones): array;
    abstract public function validarConsistencia(array $ecuaciones): bool;
}