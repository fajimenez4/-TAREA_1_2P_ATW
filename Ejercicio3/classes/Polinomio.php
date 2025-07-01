<?php
require_once __DIR__ . '/PolinomioAbstracto.php';

class Polinomio extends PolinomioAbstracto
{
    private $terminos;

    public function __construct(array $terminos)
    {
        $this->terminos = $terminos;
    }

    public function evaluar(float $x): float
    {
        $resultado = 0;
        foreach ($this->terminos as $grado => $coef) {
            $resultado += $coef * pow($x, $grado);
        }
        return $resultado;
    }

    public function derivada(): array
    {
        $resultado = [];
        foreach ($this->terminos as $grado => $coef) {
            if ($grado > 0)
                $resultado[$grado - 1] = $coef * $grado;
        }
        return $resultado;
    }

    public static function sumarPolinomios(array $pol1, array $pol2): array
    {
        $resultado = $pol1;
        foreach ($pol2 as $grado => $coef) {
            if (!isset($resultado[$grado])) {
                $resultado[$grado] = 0;
            }
            $resultado[$grado] += $coef;
        }
        ksort($resultado); // ordena por grado
        return $resultado;
    }
    public function getTerminos(): array
    {
        return $this->terminos;
    }

}
