<?php

declare(strict_types=1);

namespace Boatrace\Ninja;

use DI\Container;
use DI\ContainerBuilder;

/**
 * @author shimomo
 */
class Crawler
{
    /**
     * @var \Boatrace\Ninja\Crawler
     */
    protected static $instance;

    /**
     * @var \DI\Container
     */
    protected static $container;

    /**
     * @param  \Boatrace\Ninja\MainCrawler  $crawler
     * @return void
     */
    public function __construct(protected MainCrawler $crawler){}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        return $this->crawler->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::getInstance()->$name(...$arguments);
    }

    /**
     * @return \Boatrace\Ninja\Crawler
     */
    public static function getInstance(): Crawler
    {
        return self::$instance ?? self::$instance = (
            self::$container ?? self::$container = self::getContainer()
        )->get('Crawler');
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
        return $builder->build();
    }
}
