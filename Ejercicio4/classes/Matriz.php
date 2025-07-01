<?php
require_once __DIR__ . '/MatrizAbstracta.php';

class Matriz extends MatrizAbstracta
{
    private $datos; // asociativo: ['fila1'=>['col1'=>v,'col2'=>v], 'fila2'=>...]

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    public function multiplicar(array $otra): array
    {
        $resultado = [];
        // Suponemos matrices cuadradas 2x2 con claves 'fila1','fila2' y 'col1','col2'
        $n = count($this->datos); // número de filas
        for ($i = 1; $i <= $n; $i++) {
            $filaKey = 'fila' . $i;
            for ($j = 1; $j <= $n; $j++) {
                $colKey = 'col' . $j;
                $sum = 0;
                for ($k = 1; $k <= $n; $k++) {
                    $sum += $this->datos[$filaKey]['col' . $k] * ($otra['fila' . $k][$colKey] ?? 0);
                }
                $resultado[$filaKey][$colKey] = $sum;
            }
        }
        return $resultado;
    }

    public function inversa(): array
    {
        $a = $this->datos['fila1']['col1'];
        $b = $this->datos['fila1']['col2'];
        $c = $this->datos['fila2']['col1'];
        $d = $this->datos['fila2']['col2'];
        $det = $a * $d - $b * $c;
        if ($det == 0)
            return ['error' => 'No tiene inversa'];

        return [
            'fila1' => ['col1' => $d / $det, 'col2' => -$b / $det],
            'fila2' => ['col1' => -$c / $det, 'col2' => $a / $det]
        ];
    }

    public function getDatos(): array
    {
        return $this->datos;
    }
}

function determinante(array $matriz): float
{
    return $matriz['fila1']['col1'] * $matriz['fila2']['col2'] -
        $matriz['fila1']['col2'] * $matriz['fila2']['col1'];
}