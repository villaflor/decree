<?php

namespace Villaflor\Decree\Actions;

class TerminalLog implements ActionInterface
{

    public function execute(array $data): array
    {
        echo 'Executed' . PHP_EOL;

        $data['log'][] = 'Action: Executed';

        return $data;
    }
}