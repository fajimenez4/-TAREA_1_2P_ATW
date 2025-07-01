<?php
interface SistemaEcuacionesInterface
{
    public function calcularResultado(array $ecuaciones): array;
    public function validarConsistencia(array $ecuaciones): bool;
}