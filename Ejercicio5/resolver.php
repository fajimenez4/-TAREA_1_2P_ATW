<?php
require_once __DIR__ . '/classes/EulerNumerico.php';

// Definir la ecuación diferencial: dy/dx = x + y
$f = fn($x, $y) => $x + $y;

$descripcionFuncion = 'dy/dx = x + y';

$cond = ['x0' => 0, 'y0' => 1];
$param = ['h' => 0.1, 'pasos' => 10];

$resultado = aplicarMetodo($f, $cond, $param);

echo "Resolviendo la ecuación diferencial: $descripcionFuncion\n";
echo "Condición inicial: y({$cond['x0']}) = {$cond['y0']}\n";
echo "Paso h = {$param['h']} con {$param['pasos']} iteraciones\n\n";

echo "Solución aproximada (Método de Euler):\n";
foreach ($resultado as $punto) {
    echo "x = {$punto['x']}  =>  y = {$punto['y']}\n";
}