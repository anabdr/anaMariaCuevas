<?php

namespace App\Services;

class OperationService
{
    public function executeOperation(string $operation, float $operatorA, float $operatorB)
    {
        switch ($operation) {
            case 'add':
                return $this->add($operatorA, $operatorB);
            case 'subtract':
                return $this->subtract($operatorA, $operatorB);
            case 'multiply':
                return $this->multiply($operatorA, $operatorB);
            case 'divide':
                if ($operatorB == 0) {
                    throw new \InvalidArgumentException('Division entre 0.');
                }
                return $this->divide($operatorA, $operatorB);
            default:
               return ('La operacion no existe');
        }
    }

    private function add(int $a, int $b): int
    {
        return $a + $b;
    }

    private function subtract(int $a, int $b): int
    {
        return $a - $b;
    }

    private function multiply(int $a, int $b): int
    {
        return $a * $b;
    }

    private function divide(int $a, int $b): int
    {
        return $a / $b;
    }
}
