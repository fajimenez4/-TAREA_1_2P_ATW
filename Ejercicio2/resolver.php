<?php
require_once __DIR__ . '/classes/EstadisticaBasica.php';

$datos = [
    'grupo1' => [1, 2, 2, 3, 4],
    'grupo2' => [5, 5, 5, 6],
    'grupo3' => [7, 8, 9, 10, 10, 10]
];

$estadistica = new EstadisticaBasica();
$informe = $estadistica->generarInforme($datos);
foreach ($informe as $nombre => $resultados) {
    echo "\nConjunto: $nombre\n";
    echo "Media: " . $resultados['media'] . "\n";
    echo "Mediana: " . $resultados['mediana'] . "\n";
    echo "Moda: " . implode(',', $resultados['moda']) . "\n";
}
?>