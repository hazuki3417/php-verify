<?php declare(strict_types=1);
/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Radixes\Test;

use LogicException;
use PHPUnit\Framework\TestCase;
use Selen\Verify\Str\Radixes\Radix;

/**
 * @coversDefaultClass \Selen\Verify\Str\Radixes\Radix
 *
 * @group Selen/Verify/Str/Radixes
 * @group Selen/Verify/Str/Radixes/Radix
 *
 * @see \Selen\Verify\Str\Radixes\Radix
 *
 * [command]
 * php ./vendor/bin/phpunit --group=Selen/Verify/Str/Radixes/Radix
 *
 * @internal
 */
class RadixTest extends TestCase
{
    public function inspectionPatternVerify()
    {
        return [
            'pattern_01' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 2]],
            'pattern_02' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 3]],
            'pattern_03' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 4]],
            'pattern_04' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 5]],
            'pattern_05' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 6]],
            'pattern_06' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 7]],
            'pattern_07' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 8]],
            'pattern_08' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 9]],
            'pattern_09' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 10]],
            'pattern_10' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 16]],
            'pattern_11' => ['expVal' => true, 'testVal' => ['num' => '0', 'base' => 26]],
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
        $this->assertEquals($expVal, Radix::verify($testVal['num'], $testVal['base']));
    }

    public function testVerifyException1()
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('Does not support validation of the specified radix');
        Radix::verify('0', 32);
    }
}
