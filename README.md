# [Call Morph](https://github.com/matheusjohannaraujo/call-morph)

**CallMorph** is a PHP class that provides a simple and secure interface for serializing and unserializing anonymous functions (Closures). It automatically detects the PHP version and uses the appropriate library for maximum compatibility and security, including support for a secret key when using Laravel's Serializable Closures.

## 📦 Installation

You can install the library via [Packagist/Composer](https://packagist.org/packages/mjohann/call-morph):

```bash
composer require mjohann/call-morph
```

## ⚙️ Requirements

- PHP 7.0 or higher
- For PHP >= 8.1: [laravel/serializable-closure](https://packagist.org/packages/laravel/serializable-closure) must be installed.
- For PHP < 8.1: [opis/closure](https://packagist.org/packages/opis/closure) is required.

## 🚀 Features

- Serialize and unserialize Closures with automatic compatibility based on PHP version
- Supports secret key configuration for secure serialization in Laravel
- Simple and clean API

### Available Methods

- `__construct(string $secret)`
- `getSecret(): string`
- `setSecret(string $secret): void`
- `serialize(Closure $callback): string`
- `unserialize(string $callback): Closure`

## 🧪 Usage Example

### Publisher
```php
<?php

use MJohann\Packlib\CallMorph;

require_once "vendor/autoload.php";

$name = "Johann";
$closure = function () use ($name) {
    sleep(1);
    return "My name is " . $name . " - Rand: " . rand(0, 999);
};

$cm = new CallMorph("secret");
$serialized = $cm->serialize($closure);
echo "CallMorph->serialize", PHP_EOL;
var_dump($serialized);
echo PHP_EOL, PHP_EOL;

echo "CallMorph->unserialize", PHP_EOL;
$closure = $cm->unserialize($serialized);
echo $closure();
```

For more examples, see the [`example/`](example/) file in the repository.

## 📁 Project Structure

```
call-morph/
├── src/
│   └── CallMorph.php
│   └── Facades/
│       └── CallMorph.php
├── example/
│   └── script.php
├── composer.json
├── .gitignore
├── LICENSE
└── README.md
```

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.

## 👨‍💻 Author

Developed by [Matheus Johann Araújo](https://github.com/matheusjohannaraujo) – Pernambuco, Brazil.
