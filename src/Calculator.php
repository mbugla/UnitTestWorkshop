<?php

declare(strict_types=1);

namespace App;


class Calculator
{
    public const ADD = 'add';

    public function calculate($a, $b, $operation): mixed
    {
        $result = 0;
        
        switch ($operation) {
            case self::ADD:
                $result = $a + $b;
                break;
            default:
                throw new \InvalidArgumentException("Operation not supported");
        }

        return $result;
    }
}