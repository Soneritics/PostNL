<?php
/*
 * The MIT License
 *
 * Copyright 2015 Soneritics Webdevelopment.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
namespace PostNL\Model;

/**
 * OpeningTime
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  4-6-2018
 */
class OpeningTime
{
    /**
     *
     * @var int
     */
    protected $hour;

    /**
     *
     * @var int
     */
    protected $minute;

    /**
     * OpeningTime constructor.
     *
     * @param int $hour
     * @param int $minute
     */
    public function __construct(int $hour = 0, int $minute = 0)
    {
        $this->hour = $hour;
        $this->minute = $minute;
    }

    /**
     * Get the opening time as a string
     *
     * @return string
     */
    public function __toString()
    {
        return implode(
            ':', [
            str_pad((string)$this->hour, '0', STR_PAD_LEFT),
            str_pad((string)$this->minute, '0', STR_PAD_LEFT),
            '00'
            ]
        );
    }

    /**
     *
     * @return int
     */
    public function getHour(): int
    {
        return $this->hour;
    }

    /**
     *
     * @param  int $hour
     * @return OpeningTime
     */
    public function setHour(int $hour): OpeningTime
    {
        $this->hour = $hour;
        return $this;
    }

    /**
     *
     * @return int
     */
    public function getMinute(): int
    {
        return $this->minute;
    }

    /**
     *
     * @param  int $minute
     * @return OpeningTime
     */
    public function setMinute(int $minute): OpeningTime
    {
        $this->minute = $minute;
        return $this;
    }
}
