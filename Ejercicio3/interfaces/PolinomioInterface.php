<?php
interface PolinomioInterface
{
    public function evaluar(float $x): float;
    public function derivada(): array;
}
