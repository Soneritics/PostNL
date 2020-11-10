<?php
/*
 * The MIT License
 *
 * Copyright 2020 Soneritics.
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

use PostNL\Business\AutoJsonSerializer;

/**
 * Amount
 */
class Amount extends AutoJsonSerializer
{
    /**
     * Mandatory
     *
     * @var string
     */
    protected $AmountType;

    /**
     * Mandatory
     *
     * @var string
     */
    protected $Currency;

    /**
     * Mandatory
     *
     * @var string
     */
    protected $Value;

    /**
     *
     * @return string
     */
    public function getAmountType(): string
    {
        return $this->AmountType;
    }

    /**
     *
     * @param string $AmountType
     * @return Amount
     */
    public function setAmountType(string $AmountType): Amount
    {
        $this->AmountType = $AmountType;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->Currency;
    }

    /**
     *
     * @param string $Currency
     * @return Amount
     */
    public function setCurrency(string $Currency): Amount
    {
        $this->Currency = $Currency;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->Value;
    }

    /**
     *
     * @param string $Value
     * @return Amount
     */
    public function setValue(string $Value): Amount
    {
        $this->Value = $Value;
        return $this;
    }
}
