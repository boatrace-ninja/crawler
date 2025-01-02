<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Tests;

use Boatrace\Ninja\StadiumCrawler;
use Carbon\CarbonImmutable as Carbon;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Symfony\Component\BrowserKit\HttpBrowser;

/**
 * @author shimomo
 */
class StadiumCrawlerTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Ninja\StadiumCrawler
     */
    protected StadiumCrawler $crawler;

    /**
     * @var array
     */
    protected array $stadiums = [
        4 => '平和島',
        5 => '多摩川',
        6 => '浜名湖',
        10 => '三国',
        15 => '丸亀',
        18 => '徳山',
        23 => '唐津',
        24 => '大村',
    ];

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->crawler = new StadiumCrawler(
            new HttpBrowser
        );
    }

    /**
     * @return void
     */
    public function testCrawl(): void
    {
        $this->assertSame($this->stadiums, $this->crawler->crawl(
            Carbon::parse('2017-03-31')
        ));
    }
}
