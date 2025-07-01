<?php
require_once __DIR__ . '/classes/Polinomio.php';

$pol1 = new Polinomio([0 => 2, 1 => -3, 2 => 1]); // x^2 - 3x + 2
$pol2 = new Polinomio([0 => 1, 1 => 4, 3 => 5]);  // 5x^3 + 4x + 1
$x = 2;

echo "El polinomio pol1 es: \n";
foreach ($pol1->getTerminos() as $grado => $coef) {
    echo "$coef x^$grado \n";
}

echo "\nEl polinomio pol2 es: \n";
foreach ($pol2->getTerminos() as $grado => $coef) {
    echo "$coef x^$grado \n";
}

echo "\nEvaluación de pol1 \n";
echo "en x=$x: " . $pol1->evaluar($x) . "\n";
echo "Derivada de pol1:\n";
foreach ($pol1->derivada() as $grado => $coef) {
    echo "$coef x^$grado \n";
}

echo "\nSuma de pol1 y pol2:\n";
$suma = Polinomio::sumarPolinomios(
    [0 => 2, 1 => -3, 2 => 1],
    [0 => 1, 1 => 4, 3 => 5]
);
foreach ($suma as $grado => $coef) {
    echo "$coef x^$grado \n";
}

