# Let's Automate

---

[![Latest Version on Packagist](https://img.shields.io/packagist/v/villaflor/decree.svg?style=flat-square)](https://packagist.org/packages/villaflor/decree)
[![PHP Version Supported](https://img.shields.io/packagist/php-v/villaflor/decree?style=flat-square)](https://packagist.org/packages/villaflor/decree)
[![License](https://img.shields.io/github/license/villaflor/decree.svg?style=flat-square)](https://github.com/villaflor/decree/blob/main/LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/villaflor/decree.svg?style=flat-square)](https://packagist.org/packages/villaflor/decree)
[![Tests](https://github.com/villaflor/decree/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/villaflor/decree/actions/workflows/run-tests.yml)


Chain Command.

## Installation

You can install the package via composer:

```bash
composer require villaflor/decree
```

## Usage

```php
$data = [
    'roi' => 1
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
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mark Anthony Villaflor](https://github.com/villaflor)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
