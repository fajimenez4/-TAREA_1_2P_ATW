<?php
require_once __DIR__ . '/classes/SistemaLineal.php';

echo "Ingrese coeficientes para la ecuación 1 (a1 b1 c1):\n";
[$a1, $b1, $c1] = array_map('floatval', explode(' ', trim(fgets(STDIN))));

echo "Ingrese coeficientes para la ecuación 2 (a2 b2 c2):\n";
[$a2, $b2, $c2] = array_map('floatval', explode(' ', trim(fgets(STDIN))));

$ecuaciones = [
    'eq1' => ['x' => $a1, 'y' => $b1, 'c' => $c1],
    'eq2' => ['x' => $a2, 'y' => $b2, 'c' => $c2]
];

$sistema = new SistemaLineal();

if (!$sistema->validarConsistencia($ecuaciones)) {
    echo "El sistema no tiene solución única.\n";
    exit(1);
}

$resultado = resolverSistema($ecuaciones['eq1'], $ecuaciones['eq2']);

if (isset($resultado['error'])) {
    echo "Error: " . $resultado['error'] . "\n";
} else {
    echo "Solución:\n";
    echo "x = " . $resultado['x'] . "\n";
    echo "y = " . $resultado['y'] . "\n";
}
?>