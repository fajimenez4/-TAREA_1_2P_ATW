<?php
require_once __DIR__ . '/EcuacionDiferencial.php';

class EulerNumerico extends EcuacionDiferencial {
    public function resolverEuler(callable $f, array $cond, array $param): array {
        $x = $cond['x0'];
        $y = $cond['y0'];
        $h = $param['h'];
        $n = $param['pasos'];
        $res = [];

        for ($i = 0; $i <= $n; $i++) {
            $res[] = ['x' => $x, 'y' => $y];
            $y += $h * $f($x, $y);
            $x += $h;
        }
        return $res;
    }
}

function aplicarMetodo(callable $f, array $cond, array $param): array {
    $solver = new EulerNumerico();
    return $solver->resolverEuler($f, $cond, $param);
}