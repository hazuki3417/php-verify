<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Radixes\Test;

use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Radixes\Radix26;

/**
 * @coversDefaultClass \Selen\Verify\Str\Radixes\Radix26
 *
 * @group Selen/Verify/Str/Radixes
 * @group Selen/Verify/Str/Radixes/Radix26
 *
 * @see \Selen\Verify\Str\Radixes\Radix26
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Radixes/Radix26
 *
 * @internal
 */
class Radix26Test extends TestCase
{
    public function inspectionPatternVerify()
    {
        return [
            // 26進数で使える文字（数字）
            'pattern_01' => ['expVal' => true, 'testVal' => '0'],
            'pattern_02' => ['expVal' => true, 'testVal' => '1'],
            'pattern_03' => ['expVal' => true, 'testVal' => '2'],
            'pattern_04' => ['expVal' => true, 'testVal' => '3'],
            'pattern_05' => ['expVal' => true, 'testVal' => '4'],
            'pattern_06' => ['expVal' => true, 'testVal' => '5'],
            'pattern_07' => ['expVal' => true, 'testVal' => '6'],
            'pattern_08' => ['expVal' => true, 'testVal' => '7'],
            'pattern_09' => ['expVal' => true, 'testVal' => '8'],
            'pattern_10' => ['expVal' => true, 'testVal' => '9'],

            // 26進数で使える文字（アルファベット小文字）
            'pattern_11' => ['expVal' => true, 'testVal' => 'a'],
            'pattern_12' => ['expVal' => true, 'testVal' => 'b'],
            'pattern_13' => ['expVal' => true, 'testVal' => 'c'],
            'pattern_14' => ['expVal' => true, 'testVal' => 'd'],
            'pattern_15' => ['expVal' => true, 'testVal' => 'e'],
            'pattern_16' => ['expVal' => true, 'testVal' => 'f'],
            'pattern_17' => ['expVal' => true, 'testVal' => 'g'],
            'pattern_18' => ['expVal' => true, 'testVal' => 'h'],
            'pattern_19' => ['expVal' => true, 'testVal' => 'i'],
            'pattern_20' => ['expVal' => true, 'testVal' => 'j'],
            'pattern_21' => ['expVal' => true, 'testVal' => 'k'],
            'pattern_22' => ['expVal' => true, 'testVal' => 'l'],
            'pattern_23' => ['expVal' => true, 'testVal' => 'm'],
            'pattern_24' => ['expVal' => true, 'testVal' => 'n'],
            'pattern_25' => ['expVal' => true, 'testVal' => 'o'],
            'pattern_26' => ['expVal' => true, 'testVal' => 'p'],

            // 26進数で使えない文字（アルファベット小文字）
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

            // 26進数で使える文字（アルファベット大文字）
            'pattern_37' => ['expVal' => true, 'testVal' => 'A'],
            'pattern_38' => ['expVal' => true, 'testVal' => 'B'],
            'pattern_39' => ['expVal' => true, 'testVal' => 'C'],
            'pattern_40' => ['expVal' => true, 'testVal' => 'D'],
            'pattern_41' => ['expVal' => true, 'testVal' => 'E'],
            'pattern_42' => ['expVal' => true, 'testVal' => 'F'],
            'pattern_43' => ['expVal' => true, 'testVal' => 'G'],
            'pattern_44' => ['expVal' => true, 'testVal' => 'H'],
            'pattern_45' => ['expVal' => true, 'testVal' => 'I'],
            'pattern_46' => ['expVal' => true, 'testVal' => 'J'],
            'pattern_47' => ['expVal' => true, 'testVal' => 'K'],
            'pattern_48' => ['expVal' => true, 'testVal' => 'L'],
            'pattern_49' => ['expVal' => true, 'testVal' => 'M'],
            'pattern_50' => ['expVal' => true, 'testVal' => 'N'],
            'pattern_51' => ['expVal' => true, 'testVal' => 'O'],
            'pattern_52' => ['expVal' => true, 'testVal' => 'P'],

            // 26進数で使えない文字（アルファベット大文字）
            'pattern_53' => ['expVal' => false, 'testVal' => 'Q'],
            'pattern_54' => ['expVal' => false, 'testVal' => 'R'],
            'pattern_55' => ['expVal' => false, 'testVal' => 'S'],
            'pattern_56' => ['expVal' => false, 'testVal' => 'T'],
            'pattern_57' => ['expVal' => false, 'testVal' => 'U'],
            'pattern_58' => ['expVal' => false, 'testVal' => 'V'],
            'pattern_59' => ['expVal' => false, 'testVal' => 'W'],
            'pattern_60' => ['expVal' => false, 'testVal' => 'X'],
            'pattern_61' => ['expVal' => false, 'testVal' => 'Y'],
            'pattern_62' => ['expVal' => false, 'testVal' => 'Z'],

            // 26進数で使えない文字（想定外の文字）
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

            // 26進数形式の文字列をチェックできるかテスト
            'pattern_73' => ['expVal' => true, 'testVal' => '0123456789abcdefghijklmnop'],
            'pattern_74' => ['expVal' => true, 'testVal' => '0123456789ABCDEFGHIJKLMNOP'],

            'pattern_75' => ['expVal' => false, 'testVal' => '0123456789abcdefghijklmnopq'],
            'pattern_76' => ['expVal' => false, 'testVal' => '0123456789ABCDEFGHIJKLMNOPQ'],
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
        $this->assertEquals($expVal, Radix26::verify($testVal));
    }
}
