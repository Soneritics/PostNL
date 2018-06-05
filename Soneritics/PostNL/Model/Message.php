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
use PostNL\Enum\PrinterType;

/**
 * Message
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  28-5-2018
 */
class Message extends AutoJsonSerializer
{
    /**
     *
     * @var int
     */
    protected $MessageID;

    /**
     *
     * @var string
     */
    protected $Printertype;

    /**
     *
     * @var string
     */
    protected $MessageTimeStamp;

    /**
     * Message constructor.
     *
     * @param int            $MessageID
     * @param string         $Printertype
     * @param \DateTime|null $MessageTimeStamp
     */
    public function __construct(int $MessageID, string $Printertype = PrinterType::PDF, \DateTime $MessageTimeStamp = null)
    {
        $this->setMessageID($MessageID);
        $this->setPrintertype($Printertype);
        $this->setMessageTimeStamp($MessageTimeStamp ?? new \DateTime());
    }

    /**
     *
     * @return int
     */
    public function getMessageID(): int
    {
        return $this->MessageID;
    }

    /**
     *
     * @param  int $MessageID
     * @return Message
     */
    public function setMessageID(int $MessageID): Message
    {
        $this->MessageID = $MessageID;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getMessageTimeStamp(): string
    {
        return $this->MessageTimeStamp;
    }

    /**
     *
     * @param  \DateTime $MessageTimeStamp
     * @return Message
     */
    public function setMessageTimeStamp(\DateTime $MessageTimeStamp): Message
    {
        $this->MessageTimeStamp = $MessageTimeStamp->format('d-m-Y H:i:s');
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getPrintertype(): string
    {
        return $this->Printertype;
    }

    /**
     *
     * @param  string $Printertype
     * @return Message
     */
    public function setPrintertype(string $Printertype): Message
    {
        $this->Printertype = $Printertype;
        return $this;
    }
}
