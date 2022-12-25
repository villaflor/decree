<?php

use Villaflor\Decree\Actions\TerminalLog;

it('can execute', function () {
    $action = new TerminalLog();

    $result = $action->execute([
        'test' => 'tester',
    ]);

    $this->expectOutputString('Executed'.PHP_EOL);

    expect($result['test'])->toBe('tester');

    expect($result['log'][0])->toBe('Action: Executed');
});
