# decree
Rule Engine

`code`

        $data = [
            'roi' => 1
        ];

        // action list
        $noAction = new NoAction();
        $terminalLog = new TerminalLog();

        //rule list
        $isRoiGreaterThan1 = new GreaterThan($data['roi'], 1);
        $isRoiLessThan1 = new GreaterThan($data['roi'], 1);
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
                'rule' =>$isRoiEquals1Strict,
                'next' => $secondNode,
            ],
            [
                'rule' => $isRoiGreaterThan1,
                'next' => $terminalLog,
            ],
            [
                'rule' => $isRoiLessThan1,
                'next' => $terminalLog,
            ]
        ]);

        $x = $firstNode->handle($data);

        var_dump($x);