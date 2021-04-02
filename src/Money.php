<?php

namespace App\Money;

use DomainException;
use Exception;

class Money
{
    private $value;

    function __construct($value)
    {
        if (!is_int($value)) throw new DomainException("money can only created from integer number");
        if ($value < 0) throw new DomainException("Il numero non può essere negativo");
        $this->value = $value;
    }

    function add(int $value): Money
    {
        return new Money($this->value + $value);
    }

    function subtract(int $value): Money
    {
        if ($this->value - $value >= 0) return new Money($this->value - $value);
        throw new Exception("negative money");
    }

    function getValue(): int
    {
        return $this->value;
    }

    function compareTo(Money $money): int
    {
        if ($this->value > $money->getValue()) return 1;
        if ($this->value < $money->getValue()) return -1;

        return 0;
    }
}
