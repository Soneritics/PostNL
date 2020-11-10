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
 * Shipment
 */
class Shipment extends AutoJsonSerializer
{
    /**
     * Mandatory
     *
     * @var Addresses
     */
    protected $Addresses;

    /**
     * Used for example in label: 3087 Extra Cover
     * @var
     */
    protected $Amounts;

    /**
     * Mandatory
     *
     * @var string
     */
    protected $Barcode;

    /**
     * Mandatory when using Timeframes
     *
     * @var Contacts
     */
    protected $Contacts;

    /**
     * Mandatory
     *
     * @var string
     */
    protected $DeliveryAddress;

    /**
     * Mandatory
     *
     * @var Dimension
     */
    protected $Dimension;

    /**
     * Mandatory
     *
     * @var string
     */
    protected $ProductCodeDelivery = '3085';

    /**
     *
     * @var string
     */
    protected $CollectionTimeStampStart;

    /**
     *
     * @var string
     */
    protected $CollectionTimeStampEnd;

    /**
     *
     * @var string
     */
    protected $Content;

    /**
     *
     * @var string
     */
    protected $CostCenter;

    /**
     *
     * @var string
     */
    protected $CustomerOrderNumber;

    /**
     *
     * @var string
     */
    protected $DeliveryDate;

    /**
     *
     * @var string
     */
    protected $DeliveryTimeStampStart;

    /**
     *
     * @var string
     */
    protected $DeliveryTimeStampEnd;

    /**
     *
     * @var string
     */
    protected $DownPartnerBarcode;

    /**
     *
     * @var string
     */
    protected $DownPartnerID;

    /**
     *
     * @var string
     */
    protected $DownPartnerLocation;

    /**
     *
     * @var int
     */
    protected $IDType;

    /**
     *
     * @var string
     */
    protected $IDNumber;

    /**
     *
     * @var string
     */
    protected $IDExpiration;

    /**
     *
     * @var int
     */
    protected $ProductCodeCollect;

    /**
     *
     * @var string
     */
    protected $ReceiverDateOfBirth;

    /**
     *
     * @var string
     */
    protected $Reference;

    /**
     *
     * @var string
     */
    protected $ReferenceCollect;

    /**
     *
     * @var string
     */
    protected $Remark;

    /**
     *
     * @var string
     */
    protected $ReturnBarcode;

    /**
     *
     * @var string
     */
    protected $ReturnReference;

    /**
     *
     * @var string
     */
    protected $TimeslotID;

    /**
     *
     * @var ShipmentGroups
     */
    protected $Groups;

    /**
     *
     * @return Addresses
     */
    public function getAddresses(): Addresses
    {
        return $this->Addresses;
    }

    /**
     *
     * @param  Addresses $Addresses
     * @return Shipment
     */
    public function setAddresses(Addresses $Addresses): Shipment
    {
        $this->Addresses = $Addresses;
        return $this;
    }

    /**
     * @return Amounts
     */
    public function getAmounts() : Amounts
    {
        return $this->Amounts;
    }

    /**
     * @param Amounts $Amounts
     * @return $this
     */
    public function setAmounts(Amounts $Amounts) : Shipment
    {
        $this->Amounts = $Amounts;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->Barcode;
    }

    /**
     *
     * @param  string $Barcode
     * @return Shipment
     */
    public function setBarcode(string $Barcode): Shipment
    {
        $this->Barcode = $Barcode;
        return $this;
    }

    /**
     *
     * @return Contacts
     */
    public function getContacts(): Contacts
    {
        return $this->Contacts;
    }

    /**
     *
     * @param  Contacts $Contacts
     * @return Shipment
     */
    public function setContacts(Contacts $Contacts): Shipment
    {
        $this->Contacts = $Contacts;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDeliveryAddress(): string
    {
        return $this->DeliveryAddress;
    }

    /**
     *
     * @param  string $DeliveryAddress
     * @return Shipment
     */
    public function setDeliveryAddress(string $DeliveryAddress): Shipment
    {
        $this->DeliveryAddress = $DeliveryAddress;
        return $this;
    }

    /**
     *
     * @return Dimension
     */
    public function getDimension(): Dimension
    {
        return $this->Dimension;
    }

    /**
     *
     * @param  Dimension $Dimension
     * @return Shipment
     */
    public function setDimension(Dimension $Dimension): Shipment
    {
        $this->Dimension = $Dimension;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getProductCodeDelivery(): string
    {
        return $this->ProductCodeDelivery;
    }

    /**
     *
     * @param  string $ProductCodeDelivery
     * @return Shipment
     */
    public function setProductCodeDelivery(string $ProductCodeDelivery): Shipment
    {
        $this->ProductCodeDelivery = $ProductCodeDelivery;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCollectionTimeStampStart(): string
    {
        return $this->CollectionTimeStampStart;
    }

    /**
     *
     * @param  \DateTime $CollectionTimeStampStart
     * @return Shipment
     */
    public function setCollectionTimeStampStart(\DateTime $CollectionTimeStampStart): Shipment
    {
        $this->CollectionTimeStampStart = $CollectionTimeStampStart->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCollectionTimeStampEnd(): string
    {
        return $this->CollectionTimeStampEnd;
    }

    /**
     *
     * @param  \DateTime $CollectionTimeStampEnd
     * @return Shipment
     */
    public function setCollectionTimeStampEnd(\DateTime $CollectionTimeStampEnd): Shipment
    {
        $this->CollectionTimeStampEnd = $CollectionTimeStampEnd->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->Content;
    }

    /**
     *
     * @param  string $Content
     * @return Shipment
     */
    public function setContent(string $Content): Shipment
    {
        $this->Content = $Content;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCostCenter(): string
    {
        return $this->CostCenter;
    }

    /**
     *
     * @param  string $CostCenter
     * @return Shipment
     */
    public function setCostCenter(string $CostCenter): Shipment
    {
        $this->CostCenter = $CostCenter;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getCustomerOrderNumber(): string
    {
        return $this->CustomerOrderNumber;
    }

    /**
     *
     * @param  string $CustomerOrderNumber
     * @return Shipment
     */
    public function setCustomerOrderNumber(string $CustomerOrderNumber): Shipment
    {
        $this->CustomerOrderNumber = $CustomerOrderNumber;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDeliveryDate(): string
    {
        return $this->DeliveryDate;
    }

    /**
     *
     * @param  \DateTime $DeliveryDate
     * @return Shipment
     */
    public function setDeliveryDate(\DateTime $DeliveryDate): Shipment
    {
        $this->DeliveryDate = $DeliveryDate->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDeliveryTimeStampStart(): string
    {
        return $this->DeliveryTimeStampStart;
    }

    /**
     *
     * @param  \DateTime $DeliveryTimeStampStart
     * @return Shipment
     */
    public function setDeliveryTimeStampStart(\DateTime $DeliveryTimeStampStart): Shipment
    {
        $this->DeliveryTimeStampStart = $DeliveryTimeStampStart->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDeliveryTimeStampEnd(): string
    {
        return $this->DeliveryTimeStampEnd;
    }

    /**
     *
     * @param  \DateTime $DeliveryTimeStampEnd
     * @return Shipment
     */
    public function setDeliveryTimeStampEnd(\DateTime $DeliveryTimeStampEnd): Shipment
    {
        $this->DeliveryTimeStampEnd = $DeliveryTimeStampEnd->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDownPartnerBarcode(): string
    {
        return $this->DownPartnerBarcode;
    }

    /**
     *
     * @param  string $DownPartnerBarcode
     * @return Shipment
     */
    public function setDownPartnerBarcode(string $DownPartnerBarcode): Shipment
    {
        $this->DownPartnerBarcode = $DownPartnerBarcode;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDownPartnerID(): string
    {
        return $this->DownPartnerID;
    }

    /**
     *
     * @param  string $DownPartnerID
     * @return Shipment
     */
    public function setDownPartnerID(string $DownPartnerID): Shipment
    {
        $this->DownPartnerID = $DownPartnerID;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDownPartnerLocation(): string
    {
        return $this->DownPartnerLocation;
    }

    /**
     *
     * @param  string $DownPartnerLocation
     * @return Shipment
     */
    public function setDownPartnerLocation(string $DownPartnerLocation): Shipment
    {
        $this->DownPartnerLocation = $DownPartnerLocation;
        return $this;
    }

    /**
     *
     * @return int
     */
    public function getIDType(): int
    {
        return $this->IDType;
    }

    /**
     *
     * @param  int $IDType
     * @return Shipment
     */
    public function setIDType(int $IDType): Shipment
    {
        $this->IDType = $IDType;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getIDNumber(): string
    {
        return $this->IDNumber;
    }

    /**
     *
     * @param  string $IDNumber
     * @return Shipment
     */
    public function setIDNumber(string $IDNumber): Shipment
    {
        $this->IDNumber = $IDNumber;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getIDExpiration(): string
    {
        return $this->IDExpiration;
    }

    /**
     *
     * @param  \DateTime $IDExpiration
     * @return Shipment
     */
    public function setIDExpiration(\DateTime $IDExpiration): Shipment
    {
        $this->IDExpiration = $IDExpiration->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return int
     */
    public function getProductCodeCollect(): int
    {
        return $this->ProductCodeCollect;
    }

    /**
     *
     * @param  int $ProductCodeCollect
     * @return Shipment
     */
    public function setProductCodeCollect(int $ProductCodeCollect): Shipment
    {
        $this->ProductCodeCollect = $ProductCodeCollect;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getReceiverDateOfBirth(): string
    {
        return $this->ReceiverDateOfBirth;
    }

    /**
     *
     * @param  \DateTime $ReceiverDateOfBirth
     * @return Shipment
     */
    public function setReceiverDateOfBirth(\DateTime $ReceiverDateOfBirth): Shipment
    {
        $this->ReceiverDateOfBirth = $ReceiverDateOfBirth->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getReference(): string
    {
        return $this->Reference;
    }

    /**
     *
     * @param  string $Reference
     * @return Shipment
     */
    public function setReference(string $Reference): Shipment
    {
        $this->Reference = $Reference;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getReferenceCollect(): string
    {
        return $this->ReferenceCollect;
    }

    /**
     *
     * @param  string $ReferenceCollect
     * @return Shipment
     */
    public function setReferenceCollect(string $ReferenceCollect): Shipment
    {
        $this->ReferenceCollect = $ReferenceCollect;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getRemark(): string
    {
        return $this->Remark;
    }

    /**
     *
     * @param  string $Remark
     * @return Shipment
     */
    public function setRemark(string $Remark): Shipment
    {
        $this->Remark = $Remark;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getReturnBarcode(): string
    {
        return $this->ReturnBarcode;
    }

    /**
     *
     * @param  string $ReturnBarcode
     * @return Shipment
     */
    public function setReturnBarcode(string $ReturnBarcode): Shipment
    {
        $this->ReturnBarcode = $ReturnBarcode;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getReturnReference(): string
    {
        return $this->ReturnReference;
    }

    /**
     *
     * @param  string $ReturnReference
     * @return Shipment
     */
    public function setReturnReference(string $ReturnReference): Shipment
    {
        $this->ReturnReference = $ReturnReference;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTimeslotID(): string
    {
        return $this->TimeslotID;
    }

    /**
     *
     * @param  string $TimeslotID
     * @return Shipment
     */
    public function setTimeslotID(string $TimeslotID): Shipment
    {
        $this->TimeslotID = $TimeslotID;
        return $this;
    }

    /**
     * @return ShipmentGroups
     */
    public function Groups(): ShipmentGroups
    {
        return $this->Groups;
    }

    /**
     * @param ShipmentGroups $ShipmentGroups
     * @return Shipment
     */
    public function setGroups(ShipmentGroups $ShipmentGroups): Shipment
    {
        $this->Groups = $ShipmentGroups;
        return $this;
    }
}
