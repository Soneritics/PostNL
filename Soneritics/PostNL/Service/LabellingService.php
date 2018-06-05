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
namespace PostNL\Service;

use PostNL\Model\Message;
use PostNL\Model\Shipments;

/**
 * Labelling Service
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  28-5-2018
 */
class LabellingService extends AbstractService
{
    /**
     * Generate a label for a shipment.
     *
     * @param  Shipments $shipments
     * @param  Message   $message
     * @param  bool      $confirm
     * @return string
     * @throws \Exception
     */
    public function GenerateLabel(Shipments $shipments, Message $message, bool $confirm = true)
    {
        $serviceResult = $this->post(
            '/label?confirm=' . ($confirm ? 'true' : 'false'),
            [
                'Customer' => $this->customer,
                'Message' => $message,
                'Shipments' => $shipments
            ]
        );

        // Directly return the serviceResult - @todo
        return $serviceResult;
    }
}
