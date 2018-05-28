<?php
/*
 * The MIT License
 *
 * Copyright 2018 Soneritics Webdevelopment.
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
 * Dimension
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  28-5-2018
 */
class Dimension
{
    /**
     * Mandatory
     * Weight of the shipment in grams. Approximate weight suffices
     * @var int
     */
    private $Weight;

    /**
     * Height of the shipment in milimeters (mm).
     * @var int
     */
    private $Height;

    /**
     * Length of the shipment in milimeters (mm).
     * @var int
     */
    private $Length;

    /**
     * Volume of the shipment in centimeters (cm3). Mandatory for E@H-products
     * @var int
     */
    private $Volume;

    /**
     * Width of the shipment in milimeters (mm).
     * @var int
     */
    private $Width;

    /**
     * Weight of the shipment in grams. Approximate weight suffices
     * @return int
     */
    public function getWeight(): int
    {
        return $this->Weight;
    }

    /**
     * Weight of the shipment in grams. Approximate weight suffices
     * @param int $Weight
     * @return Dimension
     */
    public function setWeight(int $Weight): Dimension
    {
        $this->Weight = $Weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->Height;
    }

    /**
     * @param int $Height
     * @return Dimension
     */
    public function setHeight(int $Height): Dimension
    {
        $this->Height = $Height;
        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->Length;
    }

    /**
     * @param int $Length
     * @return Dimension
     */
    public function setLength(int $Length): Dimension
    {
        $this->Length = $Length;
        return $this;
    }

    /**
     * @return int
     */
    public function getVolume(): int
    {
        return $this->Volume;
    }

    /**
     * @param int $Volume
     * @return Dimension
     */
    public function setVolume(int $Volume): Dimension
    {
        $this->Volume = $Volume;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->Width;
    }

    /**
     * @param int $Width
     * @return Dimension
     */
    public function setWidth(int $Width): Dimension
    {
        $this->Width = $Width;
        return $this;
    }
}
