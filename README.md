# [Call Morph](https://github.com/matheusjohannaraujo/call-morph)

**CallMorph** is a PHP class that offers a clean and reusable abstraction for working with RabbitMQ. It simplifies the process of connecting to message queues and performing common operations like publishing messages, consuming queues, acknowledging deliveries, and managing exchanges and bindings — all without having to deal with the complexity of the underlying configuration.

## 📦 Installation

You can install the library via [Packagist/Composer](https://packagist.org/packages/mjohann/call-morph):

```bash
composer require mjohann/call-morph
```

## ⚙️ Requirements

- PHP 7.0 or higher

## 🚀 Features

- Supported:
    - __construct
    - getSecret
    - setSecret
    - serialize
    - unserialize

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
