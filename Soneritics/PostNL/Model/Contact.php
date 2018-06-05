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

use PostNL\Business\AutoJsonSerializer;

/**
 * Contact
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  3-6-2018
 */
class Contact extends AutoJsonSerializer
{
    /**
     * Mandatory
     *
     * @var string
     */
    protected $ContactType = '01';

    /**
     *
     * @var string
     */
    protected $Email;

    /**
     *
     * @var string
     */
    protected $SMSNr;

    /**
     *
     * @var string
     */
    protected $TelNr;

    /**
     *
     * @return string
     */
    public function getContactType(): string
    {
        return $this->ContactType;
    }

    /**
     *
     * @param  string $ContactType
     * @return Contact
     */
    public function setContactType(string $ContactType): Contact
    {
        $this->ContactType = $ContactType;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     *
     * @param  string $Email
     * @return Contact
     */
    public function setEmail(string $Email): Contact
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getSMSNr(): string
    {
        return $this->SMSNr;
    }

    /**
     *
     * @param  string $SMSNr
     * @return Contact
     */
    public function setSMSNr(string $SMSNr): Contact
    {
        $this->SMSNr = $SMSNr;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getTelNr(): string
    {
        return $this->TelNr;
    }

    /**
     *
     * @param  string $TelNr
     * @return Contact
     */
    public function setTelNr(string $TelNr): Contact
    {
        $this->TelNr = $TelNr;
        return $this;
    }
}
