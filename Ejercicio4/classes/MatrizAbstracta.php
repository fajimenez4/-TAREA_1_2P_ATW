<?php
require_once __DIR__ . '/../interfaces/MatrizInterface.php';

abstract class MatrizAbstracta implements MatrizInterface
{
    abstract public function multiplicar(array $otra): array;
    abstract public function inversa(): array;
}
