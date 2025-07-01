<?php
require_once __DIR__ . '/../interfaces/PolinomioInterface.php';

abstract class PolinomioAbstracto implements PolinomioInterface
{
    abstract public function evaluar(float $x): float;
    abstract public function derivada(): array;
    
}
