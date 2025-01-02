<?php

declare(strict_types=1);

namespace Boatrace\Ninja;

use Carbon\CarbonImmutable as Carbon;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @author shimomo
 */
abstract class BaseCrawler
{
    /**
     * @var string
     */
    protected string $baseUrl = 'https://www.boatrace.jp';

    /**
     * @var int
     */
    protected int $seconds = 1;

    /**
     * @param  \Symfony\Component\BrowserKit\HttpBrowser  $httpBrowser
     * @return void
     */
    public function __construct(protected HttpBrowser $httpBrowser)
    {
        $this->httpBrowser->setServerParameters([
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36',
            'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
            'HTTP_ACCEPT_LANGUAGE' => 'ja;q=0.8',
            'HTTP_CACHE_CONTROL' => 'max-age=0',
        ]);
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $xpath
     * @return string|null
     */
    protected function filterXPath(Crawler $crawler, string $xpath): ?string
    {
        if (count($crawler->filterXPath($xpath))) {
            return Converter::convertToString(
                $crawler->filterXPath($xpath)->text()
            );
        }

        return null;
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $xpath
     * @return string|null
     */
    protected function filterXPathForWindDirection(Crawler $crawler, string $xpath): ?string
    {
        if (count($crawler->filterXPath($xpath))) {
            return Converter::convertToString(
                $crawler->filterXPath($xpath)->attr('class')
            );
        }

        return null;
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $xpath
     * @return float|null
     */
    protected function filterXPathForOdds(Crawler $crawler, string $xpath): ?float
    {
        if (count($crawler->filterXPath($xpath))) {
            return Converter::convertToFloat(
                $crawler->filterXPath($xpath)->text()
            );
        }

        return null;
    }

    /**
     * @param  \Symfony\Component\DomCrawler\Crawler  $crawler
     * @param  string                                 $xpath
     * @return array
     */
    protected function filterXPathForOddsWithLowerLimitAndUpperLimit(Crawler $crawler, string $xpath): array
    {
        $response = [];

        if (count($crawler->filterXPath($xpath))) {
            if (count($oddses = explode('-', $crawler->filterXPath($xpath)->text())) === 2) {
                $lowerLimit = Converter::convertToFloat(array_shift($oddses));
                $upperLimit = Converter::convertToFloat(array_shift($oddses));
            }
        }

        $response['lower_limit'] = $lowerLimit ?? null;
        $response['upper_limit'] = $upperLimit ?? null;

        return $response;
    }
}
