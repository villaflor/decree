<?php

namespace Villaflor\Decree\Rules;

class GreaterThan implements RuleInterface
{
    private $value1;

    private $value2;

    public function __construct($value1, $value2)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
    }

    public function evaluate(): bool
    {
        return $this->value1 > $this->value2;
    }

    public function log(array $data): array
    {
        $data['log'][] = "Rule: $this->value1 greater than $this->value2";

        return $data;
    }
}
