<?php
require_once __DIR__ . '/classes/SistemaLineal.php';

// Ejemplo: 2x + 3y = 5 y 4x - y = 1
$ecuaciones = [
    'eq1' => ['x' => 2, 'y' => 3, 'c' => 5],
    'eq2' => ['x' => 4, 'y' => -1, 'c' => 1]
];

$sistema = new SistemaLineal();

echo "Sistema de Ecuaciones:\n";
echo "Ecuación 1: " . $ecuaciones['eq1']['x'] .'x + ' . $ecuaciones['eq1']['y'] .'y = ' . $ecuaciones['eq1']['c'] . "\n";
echo "Ecuación 2: " . $ecuaciones['eq2']['x'] .'x + ' . $ecuaciones['eq2']['y'] .'y = ' . $ecuaciones['eq2']['c'] . "\n";

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