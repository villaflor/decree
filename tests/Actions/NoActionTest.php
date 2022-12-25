<?php

use Villaflor\Decree\Actions\NoAction;

it('can execute', function () {
    $action = new NoAction();

    $result = $action->execute([
        'test' => 'tester',
    ]);

    expect($result['test'])->toBe('tester');

    expect($result['log'][0])->toBe('Action: No Action');
});
