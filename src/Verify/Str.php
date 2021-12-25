<?php

/**
 * @license MIT
 * @author hazuki3417<hazuki3417@gmail.com>
 * @copyright 2021 hazuki3417 all rights reserved.
 */

namespace Selen\Verify;

use Selen\Verify\Str\Length;
use Selen\Verify\Str\Radixes\Radix;
use Selen\Verify\Str\Space;
use Selen\Verify\Str\Width;

class Str
{
    private $str;

    private function __construct(string $val)
    {
        $this->str = $val;
    }

    public static function set(string $val): Str
    {
        return new self($val);
    }

    public function length(): Length
    {
        return Length::set($this->str);
    }

    public function space(): Space
    {
        return Space::set($this->str);
    }

    public function width(): Width
    {
        return Width::set($this->str);
    }

    public function radix(int $base): bool
    {
        return Radix::verify($this->str, $base);
    }
}
