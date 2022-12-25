<?php

use Villaflor\Decree\Rules\LessThan;

it('can evaluate', function () {
    $rule = new LessThan(1, 1);

    expect($rule->evaluate())->toBeFalse();

    $rule = new LessThan(1, 2);

    expect($rule->evaluate())->toBeTrue();

    $rule = new LessThan(2, 1);

    expect($rule->evaluate())->toBeFalse();
});

it('can log', function () {
    $rule = new LessThan(1, 1);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 less than 1');

    $rule = new LessThan(1, 2);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 less than 2');

    $rule = new LessThan(2, 1);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 2 less than 1');
});
