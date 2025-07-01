<?php
require_once __DIR__ . '/classes/Matriz.php';

// Definir matrices 2x2 asociativas
$A = [
    'fila1' => ['col1' => 2, 'col2' => 3],
    'fila2' => ['col1' => 1, 'col2' => 4]
];
$B = [
    'fila1' => ['col1' => 5, 'col2' => 6],
    'fila2' => ['col1' => 7, 'col2' => 8]
];

$matrizA = new Matriz($A);

echo "Matriz A:\n";
foreach ($matrizA->getDatos() as $fila => $cols) {
    echo "$fila: ";
    foreach ($cols as $col => $valor) {
        echo "$col = $valor ";
    }
    echo "\n";
}
echo "\nMatriz B:\n";
foreach ($B as $fila => $cols) {    
    echo "$fila: ";
    foreach ($cols as $col => $valor) {
        echo "$col = $valor ";
    }
    echo "\n";
}

// Multiplicación A * B
$producto = $matrizA->multiplicar($B);
echo "Producto A * B:\n";
foreach ($producto as $fila => $cols) {
    echo "$fila: ";
    foreach ($cols as $valor) {
        echo $valor . " ";
    }
    echo "\n";
}

// Inversa y determinante de A
$inversaA = $matrizA->inversa();
echo "\nInversa de A:\n";
foreach ($inversaA as $fila => $cols) {
    echo "$fila: ";
    foreach ($cols as $valor)
        echo $valor . " ";
    echo "\n";
}

$detA = determinante($A);
echo "\nDeterminante de A: $detA\n";