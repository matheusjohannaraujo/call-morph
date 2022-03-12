# Serialize Unserialize Closure

### Composer:

```js

{
    "require": {
        "opis/closure": "^3.6",
        "laravel/serializable-closure": "^1.1"
    }
}

```

### Example:

```php
$closure = function() {
    return "My name is Johann";
};

// The `serialize_function` and `unserialize_function` functions can be used in PHP versions 7.x and 8.x

$serialized = serialize_function($closure);
$closure = unserialize_function($serialized);
echo $closure(); // My name is Johann
```
