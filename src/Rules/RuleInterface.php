<?php

namespace Villaflor\Decree\Rules;

interface RuleInterface
{
    public function evaluate(): bool;

    public function log(array $data): array;
}
