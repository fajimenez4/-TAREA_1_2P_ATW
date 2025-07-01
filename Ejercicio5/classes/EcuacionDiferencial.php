<?php
require_once __DIR__ . '/../interfaces/EcuacionDiferencialInterface.php';

abstract class EcuacionDiferencial implements EcuacionDiferencialInterface
{
    abstract public function resolverEuler(callable $f, array $cond, array $param): array;
}