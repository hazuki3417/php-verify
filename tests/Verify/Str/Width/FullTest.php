<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Width\Test;

use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Width\Full;

/**
 * @coversDefaultClass \Selen\Verify\Str\Width\Full
 *
 * @group Selen/Verify/Str
 * @group Selen/Verify/Str/Width
 * @group Selen/Verify/Str/Width/Full
 *
 * @see \Selen\Verify\Str\Width\Full
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Width/Full
 *
 * @internal
 */
class FullTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(Full::class, Full::set(''));
    }

    public function inspectionPatternExist()
    {
        return [
            // 全角1字
            'pattern_01' => ['expVal' => true, 'testVal' => 'あ'],
            'pattern_02' => ['expVal' => true, 'testVal' => 'ａ'],
            'pattern_03' => ['expVal' => true, 'testVal' => 'Ａ'],
            'pattern_04' => ['expVal' => true, 'testVal' => '１'],
            // 半角1字
            'pattern_05' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_06' => ['expVal' => false, 'testVal' => 'A'],
            'pattern_07' => ['expVal' => false, 'testVal' => '1'],
            // 全角2字以上
            'pattern_08' => ['expVal' => true, 'testVal' => 'あい'],
            'pattern_09' => ['expVal' => true, 'testVal' => 'ａｉ'],
            'pattern_10' => ['expVal' => true, 'testVal' => 'ＡＩ'],
            'pattern_11' => ['expVal' => true, 'testVal' => '１２'],
            // 半角2字以上
            'pattern_12' => ['expVal' => false, 'testVal' => 'ab'],
            'pattern_13' => ['expVal' => false, 'testVal' => 'AB'],
            'pattern_14' => ['expVal' => false, 'testVal' => '12'],
            // 全角半角混同
            'pattern_15' => ['expVal' => true, 'testVal' => 'あa'],
            'pattern_16' => ['expVal' => true, 'testVal' => 'ａa'],
            'pattern_17' => ['expVal' => true, 'testVal' => 'Ａa'],
            'pattern_18' => ['expVal' => true, 'testVal' => '１a'],

            'pattern_19' => ['expVal' => true, 'testVal' => 'あA'],
            'pattern_20' => ['expVal' => true, 'testVal' => 'ａA'],
            'pattern_21' => ['expVal' => true, 'testVal' => 'ＡA'],
            'pattern_22' => ['expVal' => true, 'testVal' => '１A'],

            'pattern_23' => ['expVal' => true, 'testVal' => 'あ1'],
            'pattern_24' => ['expVal' => true, 'testVal' => 'ａ1'],
            'pattern_25' => ['expVal' => true, 'testVal' => 'Ａ1'],
            'pattern_26' => ['expVal' => true, 'testVal' => '１1'],

            // 例外パターン
            'pattern_27' => ['expVal' => false, 'testVal' => ''],
        ];
    }

    /**
     * @dataProvider inspectionPatternExist
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testExist($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Full::set($testVal))->exist());
    }

    public function inspectionPatternNotExist()
    {
        return [
            // 全角1字
            'pattern_01' => ['expVal' => false, 'testVal' => 'あ'],
            'pattern_02' => ['expVal' => false, 'testVal' => 'ａ'],
            'pattern_03' => ['expVal' => false, 'testVal' => 'Ａ'],
            'pattern_04' => ['expVal' => false, 'testVal' => '１'],
            // 半角1字
            'pattern_05' => ['expVal' => true, 'testVal' => 'a'],
            'pattern_06' => ['expVal' => true, 'testVal' => 'A'],
            'pattern_07' => ['expVal' => true, 'testVal' => '1'],
            // 全角2字以上
            'pattern_08' => ['expVal' => false, 'testVal' => 'あい'],
            'pattern_09' => ['expVal' => false, 'testVal' => 'ａｉ'],
            'pattern_10' => ['expVal' => false, 'testVal' => 'ＡＩ'],
            'pattern_11' => ['expVal' => false, 'testVal' => '１２'],
            // 半角2字以上
            'pattern_12' => ['expVal' => true, 'testVal' => 'ab'],
            'pattern_13' => ['expVal' => true, 'testVal' => 'AB'],
            'pattern_14' => ['expVal' => true, 'testVal' => '12'],
            // 全角半角混同
            'pattern_15' => ['expVal' => false, 'testVal' => 'あa'],
            'pattern_16' => ['expVal' => false, 'testVal' => 'ａa'],
            'pattern_17' => ['expVal' => false, 'testVal' => 'Ａa'],
            'pattern_18' => ['expVal' => false, 'testVal' => '１a'],

            'pattern_19' => ['expVal' => false, 'testVal' => 'あA'],
            'pattern_20' => ['expVal' => false, 'testVal' => 'ａA'],
            'pattern_21' => ['expVal' => false, 'testVal' => 'ＡA'],
            'pattern_22' => ['expVal' => false, 'testVal' => '１A'],

            'pattern_23' => ['expVal' => false, 'testVal' => 'あ1'],
            'pattern_24' => ['expVal' => false, 'testVal' => 'ａ1'],
            'pattern_25' => ['expVal' => false, 'testVal' => 'Ａ1'],
            'pattern_26' => ['expVal' => false, 'testVal' => '１1'],

            // 例外パターン
            'pattern_27' => ['expVal' => false, 'testVal' => ''],
        ];
    }

    /**
     * @dataProvider inspectionPatternNotExist
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testNotExist($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Full::set($testVal))->notExist());
    }

    public function inspectionPatternOnly()
    {
        return [
            // 全角1字
            'pattern_01' => ['expVal' => true, 'testVal' => 'あ'],
            'pattern_02' => ['expVal' => true, 'testVal' => 'ａ'],
            'pattern_03' => ['expVal' => true, 'testVal' => 'Ａ'],
            'pattern_04' => ['expVal' => true, 'testVal' => '１'],
            // 半角1字
            'pattern_05' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_06' => ['expVal' => false, 'testVal' => 'A'],
            'pattern_07' => ['expVal' => false, 'testVal' => '1'],
            // 全角2字以上
            'pattern_08' => ['expVal' => true, 'testVal' => 'あい'],
            'pattern_09' => ['expVal' => true, 'testVal' => 'ａｉ'],
            'pattern_10' => ['expVal' => true, 'testVal' => 'ＡＩ'],
            'pattern_11' => ['expVal' => true, 'testVal' => '１２'],
            // 半角2字以上
            'pattern_12' => ['expVal' => false, 'testVal' => 'ab'],
            'pattern_13' => ['expVal' => false, 'testVal' => 'AB'],
            'pattern_14' => ['expVal' => false, 'testVal' => '12'],
            // 全角半角混同
            'pattern_15' => ['expVal' => false, 'testVal' => 'あa'],
            'pattern_16' => ['expVal' => false, 'testVal' => 'ａa'],
            'pattern_17' => ['expVal' => false, 'testVal' => 'Ａa'],
            'pattern_18' => ['expVal' => false, 'testVal' => '１a'],

            'pattern_19' => ['expVal' => false, 'testVal' => 'あA'],
            'pattern_20' => ['expVal' => false, 'testVal' => 'ａA'],
            'pattern_21' => ['expVal' => false, 'testVal' => 'ＡA'],
            'pattern_22' => ['expVal' => false, 'testVal' => '１A'],

            'pattern_23' => ['expVal' => false, 'testVal' => 'あ1'],
            'pattern_24' => ['expVal' => false, 'testVal' => 'ａ1'],
            'pattern_25' => ['expVal' => false, 'testVal' => 'Ａ1'],
            'pattern_26' => ['expVal' => false, 'testVal' => '１1'],

            // 例外パターン
            'pattern_27' => ['expVal' => false, 'testVal' => ''],
        ];
    }

    /**
     * @dataProvider inspectionPatternOnly
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testOnly($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Full::set($testVal))->only());
    }

    public function inspectionPatternNotOnly()
    {
        return [
            // 全角1字
            'pattern_01' => ['expVal' => false, 'testVal' => 'あ'],
            'pattern_02' => ['expVal' => false, 'testVal' => 'ａ'],
            'pattern_03' => ['expVal' => false, 'testVal' => 'Ａ'],
            'pattern_04' => ['expVal' => false, 'testVal' => '１'],
            // 半角1字
            'pattern_05' => ['expVal' => true, 'testVal' => 'a'],
            'pattern_06' => ['expVal' => true, 'testVal' => 'A'],
            'pattern_07' => ['expVal' => true, 'testVal' => '1'],
            // 全角2字以上
            'pattern_08' => ['expVal' => false, 'testVal' => 'あい'],
            'pattern_09' => ['expVal' => false, 'testVal' => 'ａｉ'],
            'pattern_10' => ['expVal' => false, 'testVal' => 'ＡＩ'],
            'pattern_11' => ['expVal' => false, 'testVal' => '１２'],
            // 半角2字以上
            'pattern_12' => ['expVal' => true, 'testVal' => 'ab'],
            'pattern_13' => ['expVal' => true, 'testVal' => 'AB'],
            'pattern_14' => ['expVal' => true, 'testVal' => '12'],
            // 全角半角混同
            'pattern_15' => ['expVal' => true, 'testVal' => 'あa'],
            'pattern_16' => ['expVal' => true, 'testVal' => 'ａa'],
            'pattern_17' => ['expVal' => true, 'testVal' => 'Ａa'],
            'pattern_18' => ['expVal' => true, 'testVal' => '１a'],

            'pattern_19' => ['expVal' => true, 'testVal' => 'あA'],
            'pattern_20' => ['expVal' => true, 'testVal' => 'ａA'],
            'pattern_21' => ['expVal' => true, 'testVal' => 'ＡA'],
            'pattern_22' => ['expVal' => true, 'testVal' => '１A'],

            'pattern_23' => ['expVal' => true, 'testVal' => 'あ1'],
            'pattern_24' => ['expVal' => true, 'testVal' => 'ａ1'],
            'pattern_25' => ['expVal' => true, 'testVal' => 'Ａ1'],
            'pattern_26' => ['expVal' => true, 'testVal' => '１1'],

            // 例外パターン
            'pattern_27' => ['expVal' => false, 'testVal' => ''],
        ];
    }

    /**
     * @dataProvider inspectionPatternNotOnly
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testNotOnly($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Full::set($testVal))->notOnly());
    }
}
