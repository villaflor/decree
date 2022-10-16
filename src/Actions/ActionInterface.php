<?php

namespace Villaflor\Decree\Actions;

interface ActionInterface
{
    public function execute(array $data): array;
}