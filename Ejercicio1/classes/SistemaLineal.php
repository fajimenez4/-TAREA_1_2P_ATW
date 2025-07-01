<?php
require_once __DIR__ . '/SistemaEcuaciones.php';

class SistemaLineal extends SistemaEcuaciones
{
    public function calcularResultado(array $ecuaciones): array
    {
        // Ecuación 1: a1*x + b1*y = c1
        // Ecuación 2: a2*x + b2*y = c2
        $a1 = $ecuaciones['eq1']['x'];
        $b1 = $ecuaciones['eq1']['y'];
        $c1 = $ecuaciones['eq1']['c'];

        $a2 = $ecuaciones['eq2']['x'];
        $b2 = $ecuaciones['eq2']['y'];
        $c2 = $ecuaciones['eq2']['c'];

        // Verificar que b1 != 0 para despejar y de la primera ecuación
        if ($b1 == 0 && $b2 == 0) {
            return ['error' => 'No se puede aplicar sustitución: ambos coeficientes de y son cero'];
        }

        // Despejar y de la primera ecuación: y = (c1 - a1*x)/b1
        // Sustituir en la segunda: a2*x + b2*((c1 - a1*x)/b1) = c2
        // a2*x + (b2*c1 - b2*a1*x)/b1 = c2
        // Multiplicar ambos lados por b1:
        // a2*b1*x + b2*c1 - b2*a1*x = c2*b1
        // (a2*b1 - b2*a1)*x = c2*b1 - b2*c1
        $den = $a2 * $b1 - $b2 * $a1;
        if ($den == 0) {
            return ['error' => 'Sistema sin solución única'];
        }
        $x = ($c2 * $b1 - $b2 * $c1) / $den;
        // Ahora sustituimos x en la ecuación 1 para obtener y
        if ($b1 != 0) {
            $y = ($c1 - $a1 * $x) / $b1;
        } else {
            // Si b1 == 0, despejar x de la ecuación 1 y sustituir en la ecuación 2 para y
            if ($a1 == 0) {
                return ['error' => 'Ecuación 1 inválida'];
            }
            $x = $c1 / $a1;
            if ($b2 == 0) {
                return ['error' => 'No se puede determinar y'];
            }
            $y = ($c2 - $a2 * $x) / $b2;
        }
        return ['x' => $x, 'y' => $y];
    }

    public function validarConsistencia(array $ecuaciones): bool
    {
        $a1 = $ecuaciones['eq1']['x'];
        $b1 = $ecuaciones['eq1']['y'];
        $a2 = $ecuaciones['eq2']['x'];
        $b2 = $ecuaciones['eq2']['y'];
        // El sistema es consistente si los coeficientes no son proporcionales
        return ($a1 * $b2 - $a2 * $b1) !== 0;
    }
}

function resolverSistema(array $eq1, array $eq2): array
{
    $ecuaciones = [
        'eq1' => $eq1,
        'eq2' => $eq2
    ];
    $sistema = new SistemaLineal();
    if (!$sistema->validarConsistencia($ecuaciones)) {
        return ['error' => 'El sistema no tiene solución única.'];
    }
    return $sistema->calcularResultado($ecuaciones);
}