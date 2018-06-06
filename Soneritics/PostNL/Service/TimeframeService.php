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

use PostNL\Enum\DeliveryOptions;
use PostNL\Model\Address;

/**
 * Timeframe Service
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  30-5-2018
 */
class TimeframeService extends AbstractService
{
    /**
     * Retrieve timeframes for delivery.
     *
     * @param  Address        $address
     * @param  array          $deliveryOptions
     * @param  \DateTime|null $startDate
     * @param  \DateTime|null $endDate
     * @param  bool           $AllowSundaySorting
     * @return string
     * @throws \Exception
     */
    public function calculateTimeframes(
        Address $address,
        array $deliveryOptions = [DeliveryOptions::DAYTIME],
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        bool $AllowSundaySorting = false
    ) {
        if ($startDate === null) {
            $startDate = new \DateTime();
        }

        if ($endDate === null) {
            $endDate = (clone $startDate)->add(new \DateInterval("P15D"));
        }

        if ($startDate > $endDate) {
            throw new \Exception('EndDate may not be before StartDate.');
        }

        return $this->get(
            '/calculate/timeframes',
            [
                'AllowSundaySorting' => $AllowSundaySorting,
                'StartDate' => $startDate->format('d-m-Y'),
                'EndDate' => $endDate->format('d-m-Y'),
                'PostalCode' => $address->getZipcode(),
                'HouseNumber' => $address->getHouseNr(),
                'CountryCode' => $address->getCountrycode(),
                'Options' => $deliveryOptions
            ]
        );
    }
}
