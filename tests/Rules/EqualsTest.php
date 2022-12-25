<?php

use Villaflor\Decree\Rules\Equals;

it('can evaluate', function () {
    $rule = new Equals(1, '1');

    expect($rule->evaluate())->toBeTrue();

    $rule = new Equals(1, 1);

    expect($rule->evaluate())->toBeTrue();
});

it('can strict evaluate', function () {
    $rule = new Equals(1, '1', true);

    expect($rule->evaluate())->toBeFalse();

    $rule = new Equals(1, 1, true);

    expect($rule->evaluate())->toBeTrue();
});

it('can log', function () {
    $rule = new Equals(1, '1', true);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 equals 1 (strict)');

    $rule = new Equals(1, 1);
    $result = $rule->log([]);

    expect($result['log'][0])->toBe('Rule: 1 equals 1');
});
