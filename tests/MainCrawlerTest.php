<?php

declare(strict_types=1);

namespace Boatrace\Ninja\Tests;

use Boatrace\Ninja\MainCrawler;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class MainCrawlerTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Ninja\MainCrawler
     */
    protected MainCrawler $crawler;

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
        $this->crawler = new MainCrawler;
    }

    /**
     * @return void
     */
    public function testCrawlProgramByDate(): void
    {
        $response = $this->crawler->crawlProgram('2017-03-31', null, null);
        $this->assertSame('2017-03-31', $response->get('stadiums')->get(24)->get('races')->get(1)->get('date'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('stadium_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('race_number'));
        $this->assertSame('2017-03-31 12:00:00', $response->get('stadiums')->get(24)->get('races')->get(1)->get('closed_at'));
        $this->assertSame('おおむら桜祭り競走', $response->get('stadiums')->get(24)->get('races')->get(1)->get('title'));
        $this->assertSame('めざまし戦一般', $response->get('stadiums')->get(24)->get('races')->get(1)->get('subtitle'));
        $this->assertSame(1800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('distance'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('bracket'));
        $this->assertSame(2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('bracket'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('bracket'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('bracket'));
        $this->assertSame(5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('bracket'));
        $this->assertSame(6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('bracket'));
        $this->assertSame(3833, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('number'));
        $this->assertSame(3773, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('number'));
        $this->assertSame(3471, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('number'));
        $this->assertSame(4574, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('number'));
        $this->assertSame(3800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('number'));
        $this->assertSame(4924, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('number'));
        $this->assertSame('中辻 博訓', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('name'));
        $this->assertSame('津留 浩一郎', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('name'));
        $this->assertSame('赤峰 和也', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('name'));
        $this->assertSame('東 潤樹', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('name'));
        $this->assertSame('牧 宏次', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('name'));
        $this->assertSame('中北 涼', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('name'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('age'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('age'));
        $this->assertSame(47, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('age'));
        $this->assertSame(28, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('age'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('age'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('age'));
        $this->assertSame(54.0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('weight'));
        $this->assertSame(54.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('weight'));
        $this->assertSame(52.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('weight'));
        $this->assertSame(51.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('weight'));
        $this->assertSame(51.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('weight'));
        $this->assertSame(47.5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('weight'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('class_id'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('class_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('branch_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('branch_id'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('branch_id'));
        $this->assertSame(13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('branch_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('birthplace_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('birthplace_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('birthplace_id'));
        $this->assertSame(38, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('birthplace_id'));
        $this->assertSame(14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('birthplace_id'));
        $this->assertSame(23, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('birthplace_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('late_count'));
        $this->assertSame(0.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('start_timing'));
        $this->assertSame(0.21, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('start_timing'));
        $this->assertSame(0.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('start_timing'));
        $this->assertSame(0.20, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('start_timing'));
        $this->assertSame(6.45, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_1_percent'));
        $this->assertSame(5.70, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_1_percent'));
        $this->assertSame(4.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_1_percent'));
        $this->assertSame(4.88, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_1_percent'));
        $this->assertSame(5.05, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_1_percent'));
        $this->assertSame(1.76, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_1_percent'));
        $this->assertSame(45.36, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_2_percent'));
        $this->assertSame(35.85, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_2_percent'));
        $this->assertSame(16.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_2_percent'));
        $this->assertSame(33.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_2_percent'));
        $this->assertSame(34.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_2_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_2_percent'));
        $this->assertSame(65.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_3_percent'));
        $this->assertSame(61.32, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_3_percent'));
        $this->assertSame(33.01, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_3_percent'));
        $this->assertSame(41.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_3_percent'));
        $this->assertSame(45.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_3_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_3_percent'));
        $this->assertSame(7.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_1_percent'));
        $this->assertSame(6.40, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_1_percent'));
        $this->assertSame(3.95, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_1_percent'));
        $this->assertSame(4.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_1_percent'));
        $this->assertSame(5.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_1_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_1_percent'));
        $this->assertSame(55.56, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_2_percent'));
        $this->assertSame(52.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_2_percent'));
        $this->assertSame(14.29, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_2_percent'));
        $this->assertSame(13.04, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_2_percent'));
        $this->assertSame(77.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_3_percent'));
        $this->assertSame(65.35, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_3_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_3_percent'));
        $this->assertSame(30.43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_3_percent'));
        $this->assertSame(66, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_number'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_number'));
        $this->assertSame(59, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_number'));
        $this->assertSame(73, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_number'));
        $this->assertSame(52, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_number'));
        $this->assertSame(64, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_number'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_2_percent'));
        $this->assertSame(25.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_2_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_2_percent'));
        $this->assertSame(66.67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_2_percent'));
        $this->assertSame(100.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_3_percent'));
        $this->assertSame(44.44, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_3_percent'));
        $this->assertSame(50.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_3_percent'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_3_percent'));
        $this->assertSame(71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_number'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_number'));
        $this->assertSame(67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_number'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_number'));
        $this->assertSame(65, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_number'));
        $this->assertSame(46, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_number'));
        $this->assertSame(37.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_2_percent'));
        $this->assertSame(28.87, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_2_percent'));
        $this->assertSame(30.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_2_percent'));
        $this->assertSame(27.86, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_2_percent'));
        $this->assertSame(39.57, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_2_percent'));
        $this->assertSame(24.82, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_2_percent'));
        $this->assertSame(55.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_3_percent'));
        $this->assertSame(40.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_3_percent'));
        $this->assertSame(50.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_3_percent'));
        $this->assertSame(42.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_3_percent'));
        $this->assertSame(56.83, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_3_percent'));
        $this->assertSame(42.55, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_3_percent'));
    }

    /**
     * @return void
     */
    public function testCrawlProgramByDateStadiumId(): void
    {
        $response = $this->crawler->crawlProgram('2017-03-31', 24, null);
        $this->assertSame('2017-03-31', $response->get('stadiums')->get(24)->get('races')->get(1)->get('date'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('stadium_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('race_number'));
        $this->assertSame('2017-03-31 12:00:00', $response->get('stadiums')->get(24)->get('races')->get(1)->get('closed_at'));
        $this->assertSame('おおむら桜祭り競走', $response->get('stadiums')->get(24)->get('races')->get(1)->get('title'));
        $this->assertSame('めざまし戦一般', $response->get('stadiums')->get(24)->get('races')->get(1)->get('subtitle'));
        $this->assertSame(1800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('distance'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('bracket'));
        $this->assertSame(2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('bracket'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('bracket'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('bracket'));
        $this->assertSame(5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('bracket'));
        $this->assertSame(6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('bracket'));
        $this->assertSame(3833, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('number'));
        $this->assertSame(3773, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('number'));
        $this->assertSame(3471, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('number'));
        $this->assertSame(4574, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('number'));
        $this->assertSame(3800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('number'));
        $this->assertSame(4924, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('number'));
        $this->assertSame('中辻 博訓', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('name'));
        $this->assertSame('津留 浩一郎', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('name'));
        $this->assertSame('赤峰 和也', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('name'));
        $this->assertSame('東 潤樹', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('name'));
        $this->assertSame('牧 宏次', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('name'));
        $this->assertSame('中北 涼', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('name'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('age'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('age'));
        $this->assertSame(47, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('age'));
        $this->assertSame(28, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('age'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('age'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('age'));
        $this->assertSame(54.0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('weight'));
        $this->assertSame(54.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('weight'));
        $this->assertSame(52.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('weight'));
        $this->assertSame(51.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('weight'));
        $this->assertSame(51.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('weight'));
        $this->assertSame(47.5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('weight'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('class_id'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('class_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('branch_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('branch_id'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('branch_id'));
        $this->assertSame(13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('branch_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('birthplace_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('birthplace_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('birthplace_id'));
        $this->assertSame(38, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('birthplace_id'));
        $this->assertSame(14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('birthplace_id'));
        $this->assertSame(23, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('birthplace_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('late_count'));
        $this->assertSame(0.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('start_timing'));
        $this->assertSame(0.21, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('start_timing'));
        $this->assertSame(0.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('start_timing'));
        $this->assertSame(0.20, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('start_timing'));
        $this->assertSame(6.45, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_1_percent'));
        $this->assertSame(5.70, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_1_percent'));
        $this->assertSame(4.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_1_percent'));
        $this->assertSame(4.88, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_1_percent'));
        $this->assertSame(5.05, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_1_percent'));
        $this->assertSame(1.76, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_1_percent'));
        $this->assertSame(45.36, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_2_percent'));
        $this->assertSame(35.85, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_2_percent'));
        $this->assertSame(16.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_2_percent'));
        $this->assertSame(33.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_2_percent'));
        $this->assertSame(34.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_2_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_2_percent'));
        $this->assertSame(65.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_3_percent'));
        $this->assertSame(61.32, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_3_percent'));
        $this->assertSame(33.01, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_3_percent'));
        $this->assertSame(41.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_3_percent'));
        $this->assertSame(45.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_3_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_3_percent'));
        $this->assertSame(7.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_1_percent'));
        $this->assertSame(6.40, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_1_percent'));
        $this->assertSame(3.95, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_1_percent'));
        $this->assertSame(4.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_1_percent'));
        $this->assertSame(5.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_1_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_1_percent'));
        $this->assertSame(55.56, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_2_percent'));
        $this->assertSame(52.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_2_percent'));
        $this->assertSame(14.29, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_2_percent'));
        $this->assertSame(13.04, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_2_percent'));
        $this->assertSame(77.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_3_percent'));
        $this->assertSame(65.35, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_3_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_3_percent'));
        $this->assertSame(30.43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_3_percent'));
        $this->assertSame(66, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_number'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_number'));
        $this->assertSame(59, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_number'));
        $this->assertSame(73, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_number'));
        $this->assertSame(52, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_number'));
        $this->assertSame(64, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_number'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_2_percent'));
        $this->assertSame(25.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_2_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_2_percent'));
        $this->assertSame(66.67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_2_percent'));
        $this->assertSame(100.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_3_percent'));
        $this->assertSame(44.44, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_3_percent'));
        $this->assertSame(50.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_3_percent'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_3_percent'));
        $this->assertSame(71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_number'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_number'));
        $this->assertSame(67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_number'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_number'));
        $this->assertSame(65, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_number'));
        $this->assertSame(46, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_number'));
        $this->assertSame(37.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_2_percent'));
        $this->assertSame(28.87, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_2_percent'));
        $this->assertSame(30.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_2_percent'));
        $this->assertSame(27.86, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_2_percent'));
        $this->assertSame(39.57, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_2_percent'));
        $this->assertSame(24.82, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_2_percent'));
        $this->assertSame(55.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_3_percent'));
        $this->assertSame(40.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_3_percent'));
        $this->assertSame(50.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_3_percent'));
        $this->assertSame(42.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_3_percent'));
        $this->assertSame(56.83, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_3_percent'));
        $this->assertSame(42.55, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_3_percent'));
    }

    /**
     * @return void
     */
    public function testCrawlProgramByDateRaceNumber(): void
    {
        $response = $this->crawler->crawlProgram('2017-03-31', null, 1);
        $this->assertSame('2017-03-31', $response->get('stadiums')->get(24)->get('races')->get(1)->get('date'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('stadium_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('race_number'));
        $this->assertSame('2017-03-31 12:00:00', $response->get('stadiums')->get(24)->get('races')->get(1)->get('closed_at'));
        $this->assertSame('おおむら桜祭り競走', $response->get('stadiums')->get(24)->get('races')->get(1)->get('title'));
        $this->assertSame('めざまし戦一般', $response->get('stadiums')->get(24)->get('races')->get(1)->get('subtitle'));
        $this->assertSame(1800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('distance'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('bracket'));
        $this->assertSame(2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('bracket'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('bracket'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('bracket'));
        $this->assertSame(5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('bracket'));
        $this->assertSame(6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('bracket'));
        $this->assertSame(3833, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('number'));
        $this->assertSame(3773, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('number'));
        $this->assertSame(3471, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('number'));
        $this->assertSame(4574, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('number'));
        $this->assertSame(3800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('number'));
        $this->assertSame(4924, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('number'));
        $this->assertSame('中辻 博訓', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('name'));
        $this->assertSame('津留 浩一郎', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('name'));
        $this->assertSame('赤峰 和也', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('name'));
        $this->assertSame('東 潤樹', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('name'));
        $this->assertSame('牧 宏次', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('name'));
        $this->assertSame('中北 涼', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('name'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('age'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('age'));
        $this->assertSame(47, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('age'));
        $this->assertSame(28, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('age'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('age'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('age'));
        $this->assertSame(54.0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('weight'));
        $this->assertSame(54.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('weight'));
        $this->assertSame(52.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('weight'));
        $this->assertSame(51.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('weight'));
        $this->assertSame(51.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('weight'));
        $this->assertSame(47.5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('weight'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('class_id'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('class_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('branch_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('branch_id'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('branch_id'));
        $this->assertSame(13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('branch_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('birthplace_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('birthplace_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('birthplace_id'));
        $this->assertSame(38, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('birthplace_id'));
        $this->assertSame(14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('birthplace_id'));
        $this->assertSame(23, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('birthplace_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('late_count'));
        $this->assertSame(0.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('start_timing'));
        $this->assertSame(0.21, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('start_timing'));
        $this->assertSame(0.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('start_timing'));
        $this->assertSame(0.20, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('start_timing'));
        $this->assertSame(6.45, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_1_percent'));
        $this->assertSame(5.70, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_1_percent'));
        $this->assertSame(4.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_1_percent'));
        $this->assertSame(4.88, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_1_percent'));
        $this->assertSame(5.05, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_1_percent'));
        $this->assertSame(1.76, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_1_percent'));
        $this->assertSame(45.36, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_2_percent'));
        $this->assertSame(35.85, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_2_percent'));
        $this->assertSame(16.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_2_percent'));
        $this->assertSame(33.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_2_percent'));
        $this->assertSame(34.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_2_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_2_percent'));
        $this->assertSame(65.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_3_percent'));
        $this->assertSame(61.32, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_3_percent'));
        $this->assertSame(33.01, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_3_percent'));
        $this->assertSame(41.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_3_percent'));
        $this->assertSame(45.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_3_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_3_percent'));
        $this->assertSame(7.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_1_percent'));
        $this->assertSame(6.40, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_1_percent'));
        $this->assertSame(3.95, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_1_percent'));
        $this->assertSame(4.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_1_percent'));
        $this->assertSame(5.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_1_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_1_percent'));
        $this->assertSame(55.56, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_2_percent'));
        $this->assertSame(52.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_2_percent'));
        $this->assertSame(14.29, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_2_percent'));
        $this->assertSame(13.04, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_2_percent'));
        $this->assertSame(77.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_3_percent'));
        $this->assertSame(65.35, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_3_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_3_percent'));
        $this->assertSame(30.43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_3_percent'));
        $this->assertSame(66, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_number'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_number'));
        $this->assertSame(59, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_number'));
        $this->assertSame(73, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_number'));
        $this->assertSame(52, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_number'));
        $this->assertSame(64, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_number'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_2_percent'));
        $this->assertSame(25.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_2_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_2_percent'));
        $this->assertSame(66.67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_2_percent'));
        $this->assertSame(100.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_3_percent'));
        $this->assertSame(44.44, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_3_percent'));
        $this->assertSame(50.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_3_percent'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_3_percent'));
        $this->assertSame(71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_number'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_number'));
        $this->assertSame(67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_number'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_number'));
        $this->assertSame(65, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_number'));
        $this->assertSame(46, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_number'));
        $this->assertSame(37.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_2_percent'));
        $this->assertSame(28.87, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_2_percent'));
        $this->assertSame(30.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_2_percent'));
        $this->assertSame(27.86, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_2_percent'));
        $this->assertSame(39.57, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_2_percent'));
        $this->assertSame(24.82, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_2_percent'));
        $this->assertSame(55.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_3_percent'));
        $this->assertSame(40.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_3_percent'));
        $this->assertSame(50.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_3_percent'));
        $this->assertSame(42.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_3_percent'));
        $this->assertSame(56.83, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_3_percent'));
        $this->assertSame(42.55, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_3_percent'));
    }

    /**
     * @return void
     */
    public function testCrawlProgramByDateStadiumIdRaceNumber(): void
    {
        $response = $this->crawler->crawlProgram('2017-03-31', 24, 1);
        $this->assertSame('2017-03-31', $response->get('stadiums')->get(24)->get('races')->get(1)->get('date'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('stadium_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('race_number'));
        $this->assertSame('2017-03-31 12:00:00', $response->get('stadiums')->get(24)->get('races')->get(1)->get('closed_at'));
        $this->assertSame('おおむら桜祭り競走', $response->get('stadiums')->get(24)->get('races')->get(1)->get('title'));
        $this->assertSame('めざまし戦一般', $response->get('stadiums')->get(24)->get('races')->get(1)->get('subtitle'));
        $this->assertSame(1800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('distance'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('bracket'));
        $this->assertSame(2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('bracket'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('bracket'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('bracket'));
        $this->assertSame(5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('bracket'));
        $this->assertSame(6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('bracket'));
        $this->assertSame(3833, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('number'));
        $this->assertSame(3773, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('number'));
        $this->assertSame(3471, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('number'));
        $this->assertSame(4574, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('number'));
        $this->assertSame(3800, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('number'));
        $this->assertSame(4924, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('number'));
        $this->assertSame('中辻 博訓', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('name'));
        $this->assertSame('津留 浩一郎', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('name'));
        $this->assertSame('赤峰 和也', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('name'));
        $this->assertSame('東 潤樹', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('name'));
        $this->assertSame('牧 宏次', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('name'));
        $this->assertSame('中北 涼', $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('name'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('age'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('age'));
        $this->assertSame(47, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('age'));
        $this->assertSame(28, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('age'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('age'));
        $this->assertSame(24, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('age'));
        $this->assertSame(54.0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('weight'));
        $this->assertSame(54.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('weight'));
        $this->assertSame(52.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('weight'));
        $this->assertSame(51.2, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('weight'));
        $this->assertSame(51.6, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('weight'));
        $this->assertSame(47.5, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('weight'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('class_id'));
        $this->assertSame(3, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('class_id'));
        $this->assertSame(4, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('class_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('branch_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('branch_id'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('branch_id'));
        $this->assertSame(13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('branch_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('branch_id'));
        $this->assertSame(18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('birthplace_id'));
        $this->assertSame(42, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('birthplace_id'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('birthplace_id'));
        $this->assertSame(38, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('birthplace_id'));
        $this->assertSame(14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('birthplace_id'));
        $this->assertSame(23, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('birthplace_id'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('flying_count'));
        $this->assertSame(1, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('flying_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('late_count'));
        $this->assertSame(0, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('late_count'));
        $this->assertSame(0.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('start_timing'));
        $this->assertSame(0.21, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('start_timing'));
        $this->assertSame(0.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('start_timing'));
        $this->assertSame(0.20, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('start_timing'));
        $this->assertSame(0.18, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('start_timing'));
        $this->assertSame(6.45, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_1_percent'));
        $this->assertSame(5.70, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_1_percent'));
        $this->assertSame(4.13, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_1_percent'));
        $this->assertSame(4.88, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_1_percent'));
        $this->assertSame(5.05, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_1_percent'));
        $this->assertSame(1.76, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_1_percent'));
        $this->assertSame(45.36, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_2_percent'));
        $this->assertSame(35.85, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_2_percent'));
        $this->assertSame(16.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_2_percent'));
        $this->assertSame(33.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_2_percent'));
        $this->assertSame(34.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_2_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_2_percent'));
        $this->assertSame(65.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('national_3_percent'));
        $this->assertSame(61.32, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('national_3_percent'));
        $this->assertSame(33.01, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('national_3_percent'));
        $this->assertSame(41.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('national_3_percent'));
        $this->assertSame(45.98, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('national_3_percent'));
        $this->assertSame(1.96, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('national_3_percent'));
        $this->assertSame(7.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_1_percent'));
        $this->assertSame(6.40, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_1_percent'));
        $this->assertSame(3.95, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_1_percent'));
        $this->assertSame(4.17, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_1_percent'));
        $this->assertSame(5.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_1_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_1_percent'));
        $this->assertSame(55.56, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_2_percent'));
        $this->assertSame(52.48, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_2_percent'));
        $this->assertSame(14.29, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_2_percent'));
        $this->assertSame(13.04, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_2_percent'));
        $this->assertSame(77.78, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('local_3_percent'));
        $this->assertSame(65.35, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('local_3_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('local_3_percent'));
        $this->assertSame(30.43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('local_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('local_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('local_3_percent'));
        $this->assertSame(66, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_number'));
        $this->assertSame(43, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_number'));
        $this->assertSame(59, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_number'));
        $this->assertSame(73, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_number'));
        $this->assertSame(52, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_number'));
        $this->assertSame(64, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_number'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_2_percent'));
        $this->assertSame(25.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_2_percent'));
        $this->assertSame(33.33, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_2_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_2_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_2_percent'));
        $this->assertSame(66.67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_2_percent'));
        $this->assertSame(100.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('motor_3_percent'));
        $this->assertSame(37.50, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('motor_3_percent'));
        $this->assertSame(44.44, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('motor_3_percent'));
        $this->assertSame(50.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('motor_3_percent'));
        $this->assertSame(0.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('motor_3_percent'));
        $this->assertSame(88.89, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('motor_3_percent'));
        $this->assertSame(71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_number'));
        $this->assertSame(41, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_number'));
        $this->assertSame(67, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_number'));
        $this->assertSame(34, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_number'));
        $this->assertSame(65, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_number'));
        $this->assertSame(46, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_number'));
        $this->assertSame(37.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_2_percent'));
        $this->assertSame(28.87, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_2_percent'));
        $this->assertSame(30.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_2_percent'));
        $this->assertSame(27.86, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_2_percent'));
        $this->assertSame(39.57, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_2_percent'));
        $this->assertSame(24.82, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_2_percent'));
        $this->assertSame(55.00, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(1)->get('boat_3_percent'));
        $this->assertSame(40.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(2)->get('boat_3_percent'));
        $this->assertSame(50.71, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(3)->get('boat_3_percent'));
        $this->assertSame(42.14, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(4)->get('boat_3_percent'));
        $this->assertSame(56.83, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(5)->get('boat_3_percent'));
        $this->assertSame(42.55, $response->get('stadiums')->get(24)->get('races')->get(1)->get('racers')->get(6)->get('boat_3_percent'));
    }

    /**
     * @return void
     */
    public function testCrawlStadium(): void
    {
        $this->assertSame($this->stadiums, $this->crawler->crawlStadium('2017-03-31')->all());
    }

    /**
     * @return void
     */
    public function testCrawlStadiumId(): void
    {
        $this->assertSame(array_keys($this->stadiums), $this->crawler->crawlStadiumId('2017-03-31')->all());
    }

    /**
     * @return void
     */
    public function testCrawlStadiumName(): void
    {
        $this->assertSame(array_values($this->stadiums), $this->crawler->crawlStadiumName('2017-03-31')->all());
    }
}
