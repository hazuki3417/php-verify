<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Radixes\Test;

use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Radixes\Radix8;

/**
 * @coversDefaultClass \Selen\Verify\Str\Radixes\Radix8
 *
 * @group Selen/Verify/Str/Radixes
 * @group Selen/Verify/Str/Radixes/Radix8
 *
 * @see \Selen\Verify\Str\Radixes\Radix8
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Radixes/Radix8
 *
 * @internal
 */
class Radix8Test extends TestCase
{
    public function inspectionPatternVerify()
    {
        return [
            // 8進数で使える文字（数字）
            'pattern_01' => ['expVal' => true, 'testVal' => '0'],
            'pattern_02' => ['expVal' => true, 'testVal' => '1'],
            'pattern_03' => ['expVal' => true, 'testVal' => '2'],
            'pattern_04' => ['expVal' => true, 'testVal' => '3'],
            'pattern_05' => ['expVal' => true, 'testVal' => '4'],
            'pattern_06' => ['expVal' => true, 'testVal' => '5'],
            'pattern_07' => ['expVal' => true, 'testVal' => '6'],
            'pattern_08' => ['expVal' => true, 'testVal' => '7'],

            // 8進数で使えない文字（数字）
            'pattern_09' => ['expVal' => false, 'testVal' => '8'],
            'pattern_10' => ['expVal' => false, 'testVal' => '9'],

            // 8進数で使えない文字（アルファベット小文字）
            'pattern_11' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_12' => ['expVal' => false, 'testVal' => 'b'],
            'pattern_13' => ['expVal' => false, 'testVal' => 'c'],
            'pattern_14' => ['expVal' => false, 'testVal' => 'd'],
            'pattern_15' => ['expVal' => false, 'testVal' => 'e'],
            'pattern_16' => ['expVal' => false, 'testVal' => 'f'],
            'pattern_17' => ['expVal' => false, 'testVal' => 'g'],
            'pattern_18' => ['expVal' => false, 'testVal' => 'h'],
            'pattern_19' => ['expVal' => false, 'testVal' => 'i'],
            'pattern_20' => ['expVal' => false, 'testVal' => 'j'],
            'pattern_21' => ['expVal' => false, 'testVal' => 'k'],
            'pattern_22' => ['expVal' => false, 'testVal' => 'l'],
            'pattern_23' => ['expVal' => false, 'testVal' => 'm'],
            'pattern_24' => ['expVal' => false, 'testVal' => 'n'],
            'pattern_25' => ['expVal' => false, 'testVal' => 'o'],
            'pattern_26' => ['expVal' => false, 'testVal' => 'p'],
            'pattern_27' => ['expVal' => false, 'testVal' => 'q'],
            'pattern_28' => ['expVal' => false, 'testVal' => 'r'],
            'pattern_29' => ['expVal' => false, 'testVal' => 's'],
            'pattern_30' => ['expVal' => false, 'testVal' => 't'],
            'pattern_31' => ['expVal' => false, 'testVal' => 'u'],
            'pattern_32' => ['expVal' => false, 'testVal' => 'v'],
            'pattern_33' => ['expVal' => false, 'testVal' => 'w'],
            'pattern_34' => ['expVal' => false, 'testVal' => 'x'],
            'pattern_35' => ['expVal' => false, 'testVal' => 'y'],
            'pattern_36' => ['expVal' => false, 'testVal' => 'z'],

            // 8進数で使えない文字（アルファベット大文字）
            'pattern_37' => ['expVal' => false, 'testVal' => 'a'],
            'pattern_38' => ['expVal' => false, 'testVal' => 'b'],
            'pattern_39' => ['expVal' => false, 'testVal' => 'c'],
            'pattern_40' => ['expVal' => false, 'testVal' => 'd'],
            'pattern_41' => ['expVal' => false, 'testVal' => 'e'],
            'pattern_42' => ['expVal' => false, 'testVal' => 'f'],
            'pattern_43' => ['expVal' => false, 'testVal' => 'g'],
            'pattern_44' => ['expVal' => false, 'testVal' => 'h'],
            'pattern_45' => ['expVal' => false, 'testVal' => 'i'],
            'pattern_46' => ['expVal' => false, 'testVal' => 'j'],
            'pattern_47' => ['expVal' => false, 'testVal' => 'k'],
            'pattern_48' => ['expVal' => false, 'testVal' => 'l'],
            'pattern_49' => ['expVal' => false, 'testVal' => 'm'],
            'pattern_50' => ['expVal' => false, 'testVal' => 'n'],
            'pattern_51' => ['expVal' => false, 'testVal' => 'o'],
            'pattern_52' => ['expVal' => false, 'testVal' => 'p'],
            'pattern_53' => ['expVal' => false, 'testVal' => 'q'],
            'pattern_54' => ['expVal' => false, 'testVal' => 'r'],
            'pattern_55' => ['expVal' => false, 'testVal' => 's'],
            'pattern_56' => ['expVal' => false, 'testVal' => 't'],
            'pattern_57' => ['expVal' => false, 'testVal' => 'u'],
            'pattern_58' => ['expVal' => false, 'testVal' => 'v'],
            'pattern_59' => ['expVal' => false, 'testVal' => 'w'],
            'pattern_60' => ['expVal' => false, 'testVal' => 'x'],
            'pattern_61' => ['expVal' => false, 'testVal' => 'y'],
            'pattern_62' => ['expVal' => false, 'testVal' => 'z'],

            // 8進数で使えない文字（想定外の文字）
            'pattern_63' => ['expVal' => false, 'testVal' => ''],
            'pattern_64' => ['expVal' => false, 'testVal' => '-1'],
            'pattern_65' => ['expVal' => false, 'testVal' => '０'],
            'pattern_66' => ['expVal' => false, 'testVal' => '-'],
            'pattern_67' => ['expVal' => false, 'testVal' => '_'],
            'pattern_68' => ['expVal' => false, 'testVal' => 'あ'],
            'pattern_69' => ['expVal' => false, 'testVal' => 'ア'],
            'pattern_70' => ['expVal' => false, 'testVal' => 'ｱ'],
            'pattern_71' => ['expVal' => false, 'testVal' => '亜'],
            'pattern_72' => ['expVal' => false, 'testVal' => '亜'],

            // 8進数形式の文字列をチェックできるかテスト
            'pattern_73' => ['expVal' => true, 'testVal' => '01234567'],

            'pattern_74' => ['expVal' => false, 'testVal' => '012345678'],
            'pattern_75' => ['expVal' => false, 'testVal' => '01234567a'],
            'pattern_76' => ['expVal' => false, 'testVal' => '01234567A'],
        ];
    }

    /**
     * @dataProvider inspectionPatternVerify
     *
     * @param mixed $expVal
     * @param mixed $testVal
     */
    public function testVerify($expVal, $testVal)
    {
        $this->assertEquals($expVal, Radix8::verify($testVal));
    }
}
