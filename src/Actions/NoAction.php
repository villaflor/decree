<?php

namespace Villaflor\Decree\Actions;

class NoAction implements ActionInterface
{
    public function execute(array $data): array
    {
        $data['log'][] = 'Action: No Action';

        return $data;
    }
}
