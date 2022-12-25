<?php

use Villaflor\Decree\Actions\NoAction;
use Villaflor\Decree\Actions\TerminalLog;
use Villaflor\Decree\Node;
use Villaflor\Decree\Rules\Equals;
use Villaflor\Decree\Rules\GreaterThan;
use Villaflor\Decree\Rules\LessThan;

it('can run', function () {
    $data = [
        'roi' => 1,
    ];

    // action list
    $noAction = new NoAction();
    $terminalLog = new TerminalLog();

    //rule list
    $isRoiGreaterThan1 = new GreaterThan($data['roi'], 1);
    $isRoiLessThan1 = new LessThan($data['roi'], 1);
    $isRoiEquals1 = new Equals($data['roi'], 1);
    $isRoiEquals1Strict = new Equals($data['roi'], 1, true);

    $secondNode = new Node([
        [
            'rule' => $isRoiEquals1,
            'next' => $noAction,
        ],
        [
            'rule' => $isRoiEquals1,
            'next' => $terminalLog,
        ],
    ]);
    $firstNode = new Node([
        [
            'rule' => $isRoiEquals1Strict,
            'next' => $secondNode,
        ],
        [
            'rule' => $isRoiGreaterThan1,
            'next' => $terminalLog,
        ],
        [
            'rule' => $isRoiLessThan1,
            'next' => $terminalLog,
        ],
    ]);

    $x = $firstNode->handle($data);

    $this->expectOutputString('Executed'.PHP_EOL);

    expect($x)->toBe(
        [
            'roi' => 1,
            'log' => [
                'Rule: 1 equals 1 (strict)',
                'Rule: 1 equals 1',
                'Action: No Action',
                'Rule: 1 equals 1',
                'Action: Executed',
            ],
        ]
    );
});

it('throws exception', function () {
    $data = [
        'roi' => 1,
    ];

    $isRoiLessThan1 = new LessThan($data['roi'], 1);

    $terminalLog = new TerminalLog();

    $firstNode = new Node([
        [
            'rule' => $isRoiLessThan1,
            'next' => $terminalLog,
        ],
    ]);

    $x = $firstNode->handle($data);
})->throws(Exception::class, 'Directions must contains more than 1 direction');
