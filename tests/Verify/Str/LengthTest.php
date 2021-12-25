<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Test;

use LogicException;
use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Length;

/**
 * @coversDefaultClass \Selen\Verify\Str\Length
 *
 * @group Selen/Verify/Str
 * @group Selen/Verify/Str/Length
 *
 * @see \Selen\Verify\Str\Length
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Length
 *
 * @internal
 */
class LengthTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertInstanceOf(Length::class, Length::set(''));
    }

    public function inspectionPatternCount()
    {
        return [
            // 全角1字
            'pattern_01' => ['expVal' => 1, 'testVal' => 'あ'],
            'pattern_02' => ['expVal' => 1, 'testVal' => 'ａ'],
            'pattern_03' => ['expVal' => 1, 'testVal' => 'Ａ'],
            'pattern_04' => ['expVal' => 1, 'testVal' => '１'],
            // 半角1字
            'pattern_05' => ['expVal' => 1, 'testVal' => 'a'],
            'pattern_06' => ['expVal' => 1, 'testVal' => 'A'],
            'pattern_07' => ['expVal' => 1, 'testVal' => '1'],
            // 全角2字以上
            'pattern_08' => ['expVal' => 2, 'testVal' => 'あい'],
            'pattern_09' => ['expVal' => 2, 'testVal' => 'ａｉ'],
            'pattern_10' => ['expVal' => 2, 'testVal' => 'ＡＩ'],
            'pattern_11' => ['expVal' => 2, 'testVal' => '１２'],
            // 半角2字以上
            'pattern_12' => ['expVal' => 2, 'testVal' => 'ab'],
            'pattern_13' => ['expVal' => 2, 'testVal' => 'AB'],
            'pattern_14' => ['expVal' => 2, 'testVal' => '12'],
            // 全角半角混同
            'pattern_15' => ['expVal' => 2, 'testVal' => 'あa'],
            'pattern_16' => ['expVal' => 2, 'testVal' => 'ａa'],
            'pattern_17' => ['expVal' => 2, 'testVal' => 'Ａa'],
            'pattern_18' => ['expVal' => 2, 'testVal' => '１a'],
            // 空文字
            'pattern_19' => ['expVal' => 0, 'testVal' => ''],
        ];
    }

    /**
     * @dataProvider inspectionPatternCount
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testCount($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal))->count());
    }

    public function inspectionPatternGt()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'  => false,
                'testVal' => ['set' => '', 'gt' => 0],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'  => true,
                'testVal' => ['set' => 'a', 'gt' => 0],
            ],
            // 境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'gt' => 4],
            ],
            'pattern_04' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'gt' => 5],
            ],
            'pattern_05' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'gt' => 6],
            ],
            // 境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'gt' => 4],
            ],
            'pattern_07' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'gt' => 5],
            ],
            'pattern_08' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'gt' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternGt
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testGt($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal['set']))->gt($testVal['gt']));
    }

    public function testGtException()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->gt(-1);
    }

    public function inspectionPatternGe()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'  => true,
                'testVal' => ['set' => '', 'ge' => 0],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'  => true,
                'testVal' => ['set' => 'a', 'ge' => 0],
            ],
            // 境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'ge' => 4],
            ],
            'pattern_04' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'ge' => 5],
            ],
            'pattern_05' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'ge' => 6],
            ],
            // 境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'ge' => 4],
            ],
            'pattern_07' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'ge' => 5],
            ],
            'pattern_08' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'ge' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternGe
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testGe($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal['set']))->ge($testVal['ge']));
    }

    public function testGeException()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->ge(-1);
    }

    public function inspectionPatternLe()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'  => true,
                'testVal' => ['set' => '', 'le' => 0],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'  => false,
                'testVal' => ['set' => 'a', 'le' => 0],
            ],
            // 境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'le' => 4],
            ],
            'pattern_04' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'le' => 5],
            ],
            'pattern_05' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'le' => 6],
            ],
            // 境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'le' => 4],
            ],
            'pattern_07' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'le' => 5],
            ],
            'pattern_08' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'le' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternLe
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testLe($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal['set']))->le($testVal['le']));
    }

    public function testLeException()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->le(-1);
    }

    public function inspectionPatternLt()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'  => false,
                'testVal' => ['set' => '', 'lt' => 0],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'  => false,
                'testVal' => ['set' => 'a', 'lt' => 0],
            ],
            // 境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'lt' => 4],
            ],
            'pattern_04' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'lt' => 5],
            ],
            'pattern_05' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'lt' => 6],
            ],
            // 境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'lt' => 4],
            ],
            'pattern_07' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'lt' => 5],
            ],
            'pattern_08' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'lt' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternLt
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testLt($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal['set']))->lt($testVal['lt']));
    }

    public function testLtException()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->lt(-1);
    }

    public function inspectionPatternEqual()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'  => true,
                'testVal' => ['set' => '', 'equal' => 0],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'  => false,
                'testVal' => ['set' => '', 'equal' => 1],
            ],
            // 境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'equal' => 4],
            ],
            'pattern_04' => [
                'expVal'  => true,
                'testVal' => ['set' => 'abcde', 'equal' => 5],
            ],
            'pattern_05' => [
                'expVal'  => false,
                'testVal' => ['set' => 'abcde', 'equal' => 6],
            ],
            // 境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'equal' => 4],
            ],
            'pattern_07' => [
                'expVal'  => true,
                'testVal' => ['set' => 'あいうえお', 'equal' => 5],
            ],
            'pattern_08' => [
                'expVal'  => false,
                'testVal' => ['set' => 'あいうえお', 'equal' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternEqual
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testEqual($expVal, $testVal)
    {
        $this->assertEquals($expVal, (Length::set($testVal['set']))->equal($testVal['equal']));
    }

    public function testEqualException1()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->equal(-1);
    }

    public function inspectionPatternIn()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'     => true,
                'testVal'    => ['set' => '', 'min' => 0, 'max' => 1],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'a', 'min' => 0, 'max' => 1],
            ],
            // minの境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 7],
            ],
            'pattern_04' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 5, 'max' => 7],
            ],
            'pattern_05' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 6, 'max' => 7],
            ],
            // min境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 7],
            ],
            'pattern_07' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 5, 'max' => 7],
            ],
            'pattern_08' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 6, 'max' => 7],
            ],
            // maxの境界値テスト（半角文字）
            'pattern_09' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 4],
            ],
            'pattern_10' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 5],
            ],
            'pattern_11' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 6],
            ],
            // max境界値テスト（全角文字）
            'pattern_12' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 4],
            ],
            'pattern_13' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 5],
            ],
            'pattern_14' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternIn
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testIn($expVal, $testVal)
    {
        $this->assertEquals(
            $expVal,
            (Length::set($testVal['set']))->in($testVal['min'], $testVal['max'])
        );
    }

    public function testInException1()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->in(-1, 10);
    }

    public function testInException2()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->in(0, -1);
    }

    public function testInException3()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('A value greater than max cannot be specified for min');
        Length::set('')->in(10, 2);
    }

    public function inspectionPatternOut()
    {
        return [
            // 空白文字のときのテスト
            'pattern_01' => [
                'expVal'     => false,
                'testVal'    => ['set' => '', 'min' => 0, 'max' => 1],
            ],
            // 1文字のときのテスト
            'pattern_02' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'a', 'min' => 0, 'max' => 1],
            ],
            // minの境界値テスト（半角文字）
            'pattern_03' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 7],
            ],
            'pattern_04' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 5, 'max' => 7],
            ],
            'pattern_05' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 6, 'max' => 7],
            ],
            // min境界値テスト（全角文字）
            'pattern_06' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 7],
            ],
            'pattern_07' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 5, 'max' => 7],
            ],
            'pattern_08' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 6, 'max' => 7],
            ],
            // maxの境界値テスト（半角文字）
            'pattern_09' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 4],
            ],
            'pattern_10' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 5],
            ],
            'pattern_11' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'abcde', 'min' => 0, 'max' => 6],
            ],
            // max境界値テスト（全角文字）
            'pattern_12' => [
                'expVal'     => true,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 4],
            ],
            'pattern_13' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 5],
            ],
            'pattern_14' => [
                'expVal'     => false,
                'testVal'    => ['set' => 'あいうえお', 'min' => 0, 'max' => 6],
            ],
        ];
    }

    /**
     * @dataProvider inspectionPatternOut
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testOut($expVal, $testVal)
    {
        $this->assertEquals(
            $expVal,
            (Length::set($testVal['set']))->out($testVal['min'], $testVal['max'])
        );
    }

    public function testOutException1()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->out(-1, 10);
    }

    public function testOutException2()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Signed integers cannot be specified');
        Length::set('')->out(0, -1);
    }

    public function testOutException3()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('A value greater than max cannot be specified for min');
        Length::set('')->out(10, 2);
    }
}
