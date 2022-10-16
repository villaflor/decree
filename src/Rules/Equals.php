<?php

namespace Villaflor\Decree\Rules;

class Equals implements RuleInterface
{
    private $value1;
    private $value2;
    private bool $strict;

    public function __construct($value1, $value2, bool $strict = false)
    {
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->strict = $strict;
    }

    public function evaluate(): bool
    {
        if ($this->strict) {
            return $this->value1 === $this->value2;
        }

        return $this->value1 == $this->value2;
    }

    public function log(array $data): array
    {
        $data['log'][] = "Rule: $this->value1 equals $this->value2" . ($this->strict ? ' (strict)' : '');

        return $data;
    }
}