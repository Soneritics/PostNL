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
 * Message
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  28-5-2018
 */
class Message
{
    /**
     * @var int
     */
    private $MessageID;

    /**
     * @var string
     */
    private $MessageTimeStamp;

    /**
     * Message constructor.
     * @param int $MessageID
     * @param \DateTime $MessageTimeStamp
     */
    public function __construct(int $MessageID, \DateTime $MessageTimeStamp = null)
    {
        $this->setMessageID($MessageID);
        $this->setMessageTimeStamp($MessageTimeStamp ?? new \DateTime());
    }

    /**
     * @return int
     */
    public function getMessageID(): int
    {
        return $this->MessageID;
    }

    /**
     * @param int $MessageID
     * @return Message
     */
    public function setMessageID(int $MessageID): Message
    {
        $this->MessageID = $MessageID;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageTimeStamp(): string
    {
        return $this->MessageTimeStamp;
    }

    /**
     * @param \DateTime $MessageTimeStamp
     * @return Message
     */
    public function setMessageTimeStamp(\DateTime $MessageTimeStamp): Message
    {
        $this->MessageTimeStamp = $MessageTimeStamp->format('d-m-Y H:i:s');
        return $this;
    }
}
