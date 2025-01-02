# Boatrace Ninja Crawler

[![Latest Stable Version](https://poser.pugx.org/boatrace-ninja/crawler/v/stable)](https://packagist.org/packages/boatrace-ninja/crawler)
[![Latest Unstable Version](https://poser.pugx.org/boatrace-ninja/crawler/v/unstable)](https://packagist.org/packages/boatrace-ninja/crawler)
[![License](https://poser.pugx.org/boatrace-ninja/crawler/license)](https://packagist.org/packages/boatrace-ninja/crawler)

## Installation
```
$ composer require boatrace-ninja/crawler
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Ninja\Crawler;

var_dump(Crawler::crawlProgram('2017-03-31')); // 2017年03月31日, 出走表
var_dump(Crawler::crawlProgram('2017-03-31', 24)); // 2017年03月31日, 大村, 出走表
var_dump(Crawler::crawlProgram('2017-03-31', 24, 1)); // 2017年03月31日, 大村, 1R, 出走表

var_dump(Crawler::crawlNotice('2017-03-31')); // 2017年03月31日, 直前情報
var_dump(Crawler::crawlNotice('2017-03-31', 24)); // 2017年03月31日, 大村, 直前情報
var_dump(Crawler::crawlNotice('2017-03-31', 24, 1)); // 2017年03月31日, 大村, 1R, 直前情報

var_dump(Crawler::crawlResult('2017-03-31')); // 2017年03月31日, 結果
var_dump(Crawler::crawlResult('2017-03-31', 24)); // 2017年03月31日, 大村, 結果
var_dump(Crawler::crawlResult('2017-03-31', 24, 1)); // 2017年03月31日, 大村, 1R, 結果

var_dump(Crawler::crawlOdds('2017-03-31')); // 2017年03月31日, オッズ
var_dump(Crawler::crawlOdds('2017-03-31', 24)); // 2017年03月31日, 大村, オッズ
var_dump(Crawler::crawlOdds('2017-03-31', 24, 1)); // 2017年03月31日, 大村, 1R, オッズ
```

## License
The Boatrace Ninja Crawler is open source software licensed under the [MIT license](LICENSE).
