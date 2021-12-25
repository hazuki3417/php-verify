<?php

/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify\Str\Radixes;

abstract class AbstractRadix implements RadixInterface
{
    const CARDINALITY    = 0;
    const NUMBER_RANGE   = '';
    const ALPHABET_RANGE = '';

    /**
     * {@inheritdoc}
     */
    public static function verify(string $val): bool
    {
        return \preg_match(
            '/^[' . static::NUMBER_RANGE . static::ALPHABET_RANGE . ']+$/i',
            $val
        );
    }
}
