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
 * Address
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  28-5-2018
 */
class Address
{
    /**
     * Mandatory
     * @var string
     */
    private $AddressType = '02';

    /**
     * Mandatory
     * @var string
     */
    private $City;

    /**
     * Mandatory; This field has a dependency with the field Name.
     * One of both fields must be filled mandatory; using both fields is also allowed. Mandatory when AddressType is 09.
     * @var string
     */
    private $CompanyName;

    /**
     * Mandatory
     * @var string
     */
    private $Countrycode;

    /**
     * Mandatory for shipments to Benelux. Max. length is 5 characters (only for Benelux addresses).
     * For Benelux addresses,this field should always be numeric.
     * @var string
     */
    private $HouseNr;

    /**
     * @var string
     */
    private $HouseNrExt;

    /**
     * Last name of person. This field has a dependency with the field CompanyName.
     * One of both fields must be filled mandatory; using both fields is also allowed.
     * Remark: please add FirstName and Name (lastname) of the receiver to improve the parcel tracking experience
     * of your customer.
     * @var string
     */
    private $Name;

    /**
     * This field has a dependency with the field StreetHouseNrExt.
     * One of both fields must be filled mandatory; using both fields is also allowed.
     * @var string
     */
    private $Street;

    /**
     * Combination of Street, HouseNr and HouseNrExt.
     * @var string
     */
    private $StreetHouseNrExt;

    /**
     * Zipcode of the address. Mandatory for shipments to Benelux.
     * Max length (NL) 6 characters,(BE;LU) 4 numeric characters
     * @var string
     */
    private $Zipcode;

    /**
     * @var string
     */
    private $Area;

    /**
     * @var string
     */
    private $Buildingname;

    /**
     * @var string
     */
    private $Department;

    /**
     * @var string
     */
    private $Doorcode;

    /**
     * @var string
     */
    private $FirstName;

    /**
     * @var string
     */
    private $Floor;

    /**
     * @var string
     */
    private $Region;

    /**
     * @return string
     */
    public function getAddressType(): string
    {
        return $this->AddressType;
    }

    /**
     * @param string $AddressType
     * @return Address
     */
    public function setAddressType(string $AddressType): Address
    {
        $this->AddressType = $AddressType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->City;
    }

    /**
     * @param string $City
     * @return Address
     */
    public function setCity(string $City): Address
    {
        $this->City = $City;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->CompanyName;
    }

    /**
     * @param string $CompanyName
     * @return Address
     */
    public function setCompanyName(string $CompanyName): Address
    {
        $this->CompanyName = $CompanyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountrycode(): string
    {
        return $this->Countrycode;
    }

    /**
     * @param string $Countrycode
     * @return Address
     */
    public function setCountrycode(string $Countrycode): Address
    {
        $this->Countrycode = $Countrycode;
        return $this;
    }

    /**
     * @return string
     */
    public function getHouseNr(): string
    {
        return $this->HouseNr;
    }

    /**
     * @param string $HouseNr
     * @return Address
     */
    public function setHouseNr(string $HouseNr): Address
    {
        $this->HouseNr = $HouseNr;
        return $this;
    }

    /**
     * @return string
     */
    public function getHouseNrExt(): string
    {
        return $this->HouseNrExt;
    }

    /**
     * @param string $HouseNrExt
     * @return Address
     */
    public function setHouseNrExt(string $HouseNrExt): Address
    {
        $this->HouseNrExt = $HouseNrExt;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return Address
     */
    public function setName(string $Name): Address
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->Street;
    }

    /**
     * @param string $Street
     * @return Address
     */
    public function setStreet(string $Street): Address
    {
        $this->Street = $Street;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetHouseNrExt(): string
    {
        return $this->StreetHouseNrExt;
    }

    /**
     * @param string $StreetHouseNrExt
     * @return Address
     */
    public function setStreetHouseNrExt(string $StreetHouseNrExt): Address
    {
        $this->StreetHouseNrExt = $StreetHouseNrExt;
        return $this;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->Zipcode;
    }

    /**
     * @param string $Zipcode
     * @return Address
     */
    public function setZipcode(string $Zipcode): Address
    {
        $this->Zipcode = $Zipcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getArea(): string
    {
        return $this->Area;
    }

    /**
     * @param string $Area
     * @return Address
     */
    public function setArea(string $Area): Address
    {
        $this->Area = $Area;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingname(): string
    {
        return $this->Buildingname;
    }

    /**
     * @param string $Buildingname
     * @return Address
     */
    public function setBuildingname(string $Buildingname): Address
    {
        $this->Buildingname = $Buildingname;
        return $this;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->Department;
    }

    /**
     * @param string $Department
     * @return Address
     */
    public function setDepartment(string $Department): Address
    {
        $this->Department = $Department;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoorcode(): string
    {
        return $this->Doorcode;
    }

    /**
     * @param string $Doorcode
     * @return Address
     */
    public function setDoorcode(string $Doorcode): Address
    {
        $this->Doorcode = $Doorcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->FirstName;
    }

    /**
     * @param string $FirstName
     * @return Address
     */
    public function setFirstName(string $FirstName): Address
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->Floor;
    }

    /**
     * @param string $Floor
     * @return Address
     */
    public function setFloor(string $Floor): Address
    {
        $this->Floor = $Floor;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->Region;
    }

    /**
     * @param string $Region
     * @return Address
     */
    public function setRegion(string $Region): Address
    {
        $this->Region = $Region;
        return $this;
    }
}
