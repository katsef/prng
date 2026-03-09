
# prng

#### KISS-PRNG | Простой алгоритм шифрования на основе генератора псевдослучайных чисел.

------

## Установка

Можно установить используя менеджер пакетов [Composer](https://getcomposer.org)

```php
$ composer require webazon/prng
```

или скачать пакет с [GitHub](https://github.com/katsef/prngl)

------

## Инициализация

```php
require __DIR__ . '/vendor/autoload.php';
$prng = new Webazon\Prng\Prng();
```

## Шифрование 

```php
$res = $prng -> KissEncrypt($data [string], [ $password [string], $isBase64 [bool]]);
```

- ***$data*** - данные для шифрования;
- ***$password*** - пароль ( до 16 символов);
- ***$isBase64*** - флаг кодирования результата в формат Base64;

При успехе на выходе зашифрованные данные. Иначе - **`false`**;

------

## Расшифровка 

```php
$res = $prng -> KissDecrypt($data [string],[ $password,[string] ]);
```

- ***$data*** - входные зашифрованные данные;
- ***$password*** - пароль ( до 16 символов);

При успехе на выходе расшифрованные данные. Иначе - **`false`**;

------

