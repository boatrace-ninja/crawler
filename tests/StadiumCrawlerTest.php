<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Tests;

use Boatrace\Ninja\StadiumCrawler;
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
    protected $crawler;

    /**
     * @var array
     */
    protected $stadiums = [
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
        $this->crawler = new StadiumCrawler(new HttpBrowser);
    }

    /**
     * @return void
     */
    public function testCrawl(): void
    {
        $this->assertSame(
            $this->stadiums,
            $this->crawler->crawl('2017-03-31')
        );
    }

    /**
     * @return void
     */
    public function testCrawlStadiumId(): void
    {
        $this->assertSame(
            array_keys($this->stadiums),
            $this->crawler->crawlStadiumId('2017-03-31')
        );
    }

    /**
     * @return void
     */
    public function testCrawlStadiumName(): void
    {
        $this->assertSame(
            array_values($this->stadiums),
            $this->crawler->crawlStadiumName('2017-03-31')
        );
    }
}
