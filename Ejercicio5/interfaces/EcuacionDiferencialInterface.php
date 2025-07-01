<?php
interface EcuacionDiferencialInterface
{
    public function resolverEuler(callable $f, array $cond, array $param): array;
}