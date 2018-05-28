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
 * Customer data
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  27-5-2018
 */
class Customer
{
    /**
     * Mandatory
     * @var Address
     */
    private $Address;

    /**
     * Mandatory
     * @var string
     */
    private $CollectionLocation;

    /**
     * Mandatory
     * @var string
     */
    private $CustomerCode;

    /**
     * Mandatory
     * @var string
     */
    private $CustomerNumber;

    /**
     * @var string
     */
    private $ContactPerson;

    /**
     * @var string
     */
    private $Email;

    /**
     * @var string
     */
    private $Name;

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->Address;
    }

    /**
     * @param Address $Address
     * @return Customer
     */
    public function setAddress(Address $Address): Customer
    {
        $this->Address = $Address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionLocation(): string
    {
        return $this->CollectionLocation;
    }

    /**
     * Code of delivery location at PostNL Pakketten
     * @param string $CollectionLocation
     * @return Customer
     */
    public function setCollectionLocation(string $CollectionLocation): Customer
    {
        $this->CollectionLocation = $CollectionLocation;
        return $this;
    }

    /**
     * Customer code as known at PostNL Pakketten
     * @return string
     */
    public function getCustomerCode(): string
    {
        return $this->CustomerCode;
    }

    /**
     * Customer code as known at PostNL Pakketten
     * @param string $CustomerCode
     * @return Customer
     */
    public function setCustomerCode(string $CustomerCode): Customer
    {
        $this->CustomerCode = $CustomerCode;
        return $this;
    }

    /**
     * Name of customer contact person
     * @return string
     */
    public function getCustomerNumber(): string
    {
        return $this->CustomerNumber;
    }

    /**
     * Name of customer contact person
     * @param string $CustomerNumber
     * @return Customer
     */
    public function setCustomerNumber(string $CustomerNumber): Customer
    {
        $this->CustomerNumber = $CustomerNumber;
        return $this;
    }

    /**
     * Name of customer contact person
     * @return string
     */
    public function getContactPerson(): string
    {
        return $this->ContactPerson;
    }

    /**
     * Name of customer contact person
     * @param string $ContactPerson
     * @return Customer
     */
    public function setContactPerson(string $ContactPerson): Customer
    {
        $this->ContactPerson = $ContactPerson;
        return $this;
    }

    /**
     * E-mail address of the customer
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * E-mail address of the customer
     * @param string $Email
     * @return Customer
     */
    public function setEmail(string $Email): Customer
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * Customer name
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * Customer name
     * @param string $Name
     * @return Customer
     */
    public function setName(string $Name): Customer
    {
        $this->Name = $Name;
        return $this;
    }
}
