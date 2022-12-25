<?php

use Villaflor\Decree\Rules\GreaterThan;

it('can evaluate', function () {
    $rule = new GreaterThan(1, 1);

    expect($rule->evaluate())->toBeFalse();

    $rule = new GreaterThan(1, 2);

    expect($rule->evaluate())->toBeFalse();

    $rule = new GreaterThan(2, 1);

    expect($rule->evaluate())->toBeTrue();
});

it('can log', function () {
    $rule = new GreaterThan(1, 1);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 greater than 1');

    $rule = new GreaterThan(1, 2);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 greater than 2');

    $rule = new GreaterThan(2, 1);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 2 greater than 1');
});
