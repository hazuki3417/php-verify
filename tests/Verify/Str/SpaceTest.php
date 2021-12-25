<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Space\Test;

use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Space;

/**
 * @coversDefaultClass \Selen\Verify\Str\Space
 *
 * @group Selen/Verify/Str
 * @group Selen/Verify/Str/Space
 *
 * @see \Selen\Verify\Str\Space
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Space
 *
 * @internal
 */
class SpaceTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(Space::class, Space::set(''));
    }

    public function inspectionPatternExist()
    {
        return [
            'pattern_01' => ['expVal' => false, 'testVal' => ''],
            'pattern_02' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_03' => ['expVal' => false, 'testVal' => '\r'],
            'pattern_04' => ['expVal' => true, 'testVal' => "\r"],
            'pattern_05' => ['expVal' => false, 'testVal' => '\n'],
            'pattern_06' => ['expVal' => true, 'testVal' => "\n"],
            'pattern_07' => ['expVal' => false, 'testVal' => '\t'],
            'pattern_08' => ['expVal' => true, 'testVal' => "\t"],

            // 全角1字
            'pattern_09' => ['expVal' => true, 'testVal' => '　'],
            'pattern_10' => ['expVal' => true, 'testVal' => 'あ　'],
            'pattern_11' => ['expVal' => true, 'testVal' => '　あ'],
            'pattern_12' => ['expVal' => true, 'testVal' => 'あ　い'],
            // 半角1字
            'pattern_13' => ['expVal' => true, 'testVal' => ' '],
            'pattern_14' => ['expVal' => true, 'testVal' => 'a '],
            'pattern_15' => ['expVal' => true, 'testVal' => ' a'],
            'pattern_16' => ['expVal' => true, 'testVal' => 'a a'],
            // 全角2字以上
            'pattern_17' => ['expVal' => true, 'testVal' => '　　'],
            'pattern_18' => ['expVal' => true, 'testVal' => 'あ　　'],
            'pattern_19' => ['expVal' => true, 'testVal' => '　　あ'],
            'pattern_20' => ['expVal' => true, 'testVal' => 'あ　　い'],
            // 半角2字以上
            'pattern_21' => ['expVal' => true, 'testVal' => '  '],
            'pattern_22' => ['expVal' => true, 'testVal' => 'a  '],
            'pattern_23' => ['expVal' => true, 'testVal' => '  a'],
            'pattern_24' => ['expVal' => true, 'testVal' => 'a  a'],
            // 全角半角混同
            'pattern_25' => ['expVal' => true, 'testVal' => ' 　'],
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
        $this->assertEquals($expVal, (Space::set($testVal))->exist());
    }

    public function inspectionPatternNotExist()
    {
        return [
            'pattern_01' => ['expVal' => true, 'testVal' => ''],
            'pattern_02' => ['expVal' => true, 'testVal' => 'a'],
            'pattern_03' => ['expVal' => true, 'testVal' => '\r'],
            'pattern_04' => ['expVal' => false, 'testVal' => "\r"],
            'pattern_05' => ['expVal' => true, 'testVal' => '\n'],
            'pattern_06' => ['expVal' => false, 'testVal' => "\n"],
            'pattern_07' => ['expVal' => true, 'testVal' => '\t'],
            'pattern_08' => ['expVal' => false, 'testVal' => "\t"],

            // 全角1字
            'pattern_09' => ['expVal' => false, 'testVal' => '　'],
            'pattern_10' => ['expVal' => false, 'testVal' => 'あ　'],
            'pattern_11' => ['expVal' => false, 'testVal' => '　あ'],
            'pattern_12' => ['expVal' => false, 'testVal' => 'あ　い'],
            // 半角1字
            'pattern_13' => ['expVal' => false, 'testVal' => ' '],
            'pattern_14' => ['expVal' => false, 'testVal' => 'a '],
            'pattern_15' => ['expVal' => false, 'testVal' => ' a'],
            'pattern_16' => ['expVal' => false, 'testVal' => 'a a'],
            // 全角2字以上
            'pattern_17' => ['expVal' => false, 'testVal' => '　　'],
            'pattern_18' => ['expVal' => false, 'testVal' => 'あ　　'],
            'pattern_19' => ['expVal' => false, 'testVal' => '　　あ'],
            'pattern_20' => ['expVal' => false, 'testVal' => 'あ　　い'],
            // 半角2字以上
            'pattern_21' => ['expVal' => false, 'testVal' => '  '],
            'pattern_22' => ['expVal' => false, 'testVal' => 'a  '],
            'pattern_23' => ['expVal' => false, 'testVal' => '  a'],
            'pattern_24' => ['expVal' => false, 'testVal' => 'a  a'],
            // 全角半角混同
            'pattern_25' => ['expVal' => false, 'testVal' => ' 　'],
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
        $this->assertEquals($expVal, (Space::set($testVal))->notExist());
    }

    public function inspectionPatternOnly()
    {
        return [
            'pattern_01' => ['expVal' => false, 'testVal' => ''],
            'pattern_02' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_03' => ['expVal' => false, 'testVal' => '\r'],
            'pattern_04' => ['expVal' => true, 'testVal' => "\r"],
            'pattern_05' => ['expVal' => false, 'testVal' => '\n'],
            'pattern_06' => ['expVal' => true, 'testVal' => "\n"],
            'pattern_07' => ['expVal' => false, 'testVal' => '\t'],
            'pattern_08' => ['expVal' => true, 'testVal' => "\t"],

            // 全角1字
            'pattern_09' => ['expVal' => true, 'testVal' => '　'],
            'pattern_10' => ['expVal' => false, 'testVal' => 'あ　'],
            'pattern_11' => ['expVal' => false, 'testVal' => '　あ'],
            'pattern_12' => ['expVal' => false, 'testVal' => 'あ　い'],
            // 半角1字
            'pattern_13' => ['expVal' => true, 'testVal' => ' '],
            'pattern_14' => ['expVal' => false, 'testVal' => 'a '],
            'pattern_15' => ['expVal' => false, 'testVal' => ' a'],
            'pattern_16' => ['expVal' => false, 'testVal' => 'a a'],
            // 全角2字以上
            'pattern_17' => ['expVal' => true, 'testVal' => '　　'],
            'pattern_18' => ['expVal' => false, 'testVal' => 'あ　　'],
            'pattern_19' => ['expVal' => false, 'testVal' => '　　あ'],
            'pattern_20' => ['expVal' => false, 'testVal' => 'あ　　い'],
            // 半角2字以上
            'pattern_21' => ['expVal' => true, 'testVal' => '  '],
            'pattern_22' => ['expVal' => false, 'testVal' => 'a  '],
            'pattern_23' => ['expVal' => false, 'testVal' => '  a'],
            'pattern_24' => ['expVal' => false, 'testVal' => 'a  a'],
            // 全角半角混同
            'pattern_25' => ['expVal' => true, 'testVal' => ' 　'],
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
        $this->assertEquals($expVal, (Space::set($testVal))->only());
    }

    public function inspectionPatternNotOnly()
    {
        return [
            'pattern_01' => ['expVal' => true, 'testVal' => ''],
            'pattern_02' => ['expVal' => true, 'testVal' => 'a'],
            'pattern_03' => ['expVal' => true, 'testVal' => '\r'],
            'pattern_04' => ['expVal' => false, 'testVal' => "\r"],
            'pattern_05' => ['expVal' => true, 'testVal' => '\n'],
            'pattern_06' => ['expVal' => false, 'testVal' => "\n"],
            'pattern_07' => ['expVal' => true, 'testVal' => '\t'],
            'pattern_08' => ['expVal' => false, 'testVal' => "\t"],

            // 全角1字
            'pattern_09' => ['expVal' => false, 'testVal' => '　'],
            'pattern_10' => ['expVal' => true, 'testVal' => 'あ　'],
            'pattern_11' => ['expVal' => true, 'testVal' => '　あ'],
            'pattern_12' => ['expVal' => true, 'testVal' => 'あ　い'],
            // 半角1字
            'pattern_13' => ['expVal' => false, 'testVal' => ' '],
            'pattern_14' => ['expVal' => true, 'testVal' => 'a '],
            'pattern_15' => ['expVal' => true, 'testVal' => ' a'],
            'pattern_16' => ['expVal' => true, 'testVal' => 'a a'],
            // 全角2字以上
            'pattern_17' => ['expVal' => false, 'testVal' => '　　'],
            'pattern_18' => ['expVal' => true, 'testVal' => 'あ　　'],
            'pattern_19' => ['expVal' => true, 'testVal' => '　　あ'],
            'pattern_20' => ['expVal' => true, 'testVal' => 'あ　　い'],
            // 半角2字以上
            'pattern_21' => ['expVal' => false, 'testVal' => '  '],
            'pattern_22' => ['expVal' => true, 'testVal' => 'a  '],
            'pattern_23' => ['expVal' => true, 'testVal' => '  a'],
            'pattern_24' => ['expVal' => true, 'testVal' => 'a  a'],
            // 全角半角混同
            'pattern_25' => ['expVal' => false, 'testVal' => ' 　'],
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
        $this->assertEquals($expVal, (Space::set($testVal))->notOnly());
    }
}
