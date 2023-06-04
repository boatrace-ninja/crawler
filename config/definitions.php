<?php

return [
    'Crawler' => \DI\create('\Boatrace\Ninja\Crawler')->constructor(
        \DI\get('MainCrawler')
    ),
    'MainCrawler' => function ($container) {
        return $container->get('\Boatrace\Ninja\MainCrawler');
    },
    'NoticeCrawler' => \DI\create('\Boatrace\Ninja\Crawlers\NoticeCrawler')->constructor(
        \DI\get('HttpBrowser')
    ),
    'OddsCrawler' => \DI\create('\Boatrace\Ninja\Crawlers\OddsCrawler')->constructor(
        \DI\get('HttpBrowser')
    ),
    'ProgramCrawler' => \DI\create('\Boatrace\Ninja\Crawlers\ProgramCrawler')->constructor(
        \DI\get('HttpBrowser')
    ),
    'ResultCrawler' => \DI\create('\Boatrace\Ninja\Crawlers\ResultCrawler')->constructor(
        \DI\get('HttpBrowser')
    ),
    'StadiumCrawler' => \DI\create('\Boatrace\Ninja\Crawlers\StadiumCrawler')->constructor(
        \DI\get('HttpBrowser')
    ),
    'HttpBrowser' => function ($container) {
        return $container->get('\Symfony\Component\BrowserKit\HttpBrowser');
    },
];
