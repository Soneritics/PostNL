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
 * Shipment groups
 */
class ShipmentGroup extends AutoJsonSerializer
{
    /**
     * Total number of colli in the shipment (in case of multicolli shipments).
     * Mandatory for multicollo shipments.
     * @var int
     */
    public $GroupCount;

    /**
     * Sequence number of the collo within the complete shipment (e.g. collo 2 of 4).
     * Mandatory for multicollo shipments.
     * @var int
     */
    public $GroupSequence;

    /**
     * Group sort that determines the type of group that is indicated.
     * This is a code. Possible values:
     * 01 = Collection request
     * 03 = Multiple parcels in one shipment (multicolli)
     * 04 = Single parcel in one shipment
     * @var string
     */
    public $GroupType;

    /**
     * Main barcode for the shipment (in case of multicolli shipments).
     * Mandatory for multicollo shipments.
     * @var string
     */
    public $MainBarcode;

    /**
     * @return int
     */
    public function getGroupCount(): int
    {
        return $this->GroupCount;
    }

    /**
     * @param int $GroupCount
     * @return ShipmentGroup
     */
    public function setGroupCount(int $GroupCount): ShipmentGroup
    {
        $this->GroupCount = $GroupCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getGroupSequence(): int
    {
        return $this->GroupSequence;
    }

    /**
     * @param int $GroupSequence
     * @return ShipmentGroup
     */
    public function setGroupSequence(int $GroupSequence): ShipmentGroup
    {
        $this->GroupSequence = $GroupSequence;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupType(): string
    {
        return $this->GroupType;
    }

    /**
     * @param string $GroupType
     * @return ShipmentGroup
     */
    public function setGroupType(string $GroupType): ShipmentGroup
    {
        $this->GroupType = $GroupType;
        return $this;
    }

    /**
     * @return string
     */
    public function getMainBarcode(): string
    {
        return $this->MainBarcode;
    }

    /**
     * @param string $MainBarcode
     * @return ShipmentGroup
     */
    public function setMainBarcode(string $MainBarcode): ShipmentGroup
    {
        $this->MainBarcode = $MainBarcode;
        return $this;
    }
}
