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

use PostNL\Enum\RequestDeliveryOptions;
use PostNL\Enum\RetailNetworkID;
use PostNL\Model\Address;
use PostNL\Model\OpeningTime;

/**
 * Locations Service
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  4-6-2018
 */
class LocationsService extends AbstractService
{
    /**
     * Get the nearest locations, based on an address
     * @param Address $address
     * @param array $deliveryOptions
     * @param \DateTime|null $earliestDeliveryDate
     * @param OpeningTime|null $openingTime
     * @return array
     * @throws \Exception
     */
    public function getNearestLocations(
        Address $address,
        array $deliveryOptions = [RequestDeliveryOptions::PICKUP_POSTNL],
        \DateTime $earliestDeliveryDate = null,
        OpeningTime $openingTime = null
    ) {
        $requestData = [
            'CountryCode' => $address->getCountrycode(),
            'PostalCode' => $address->getZipcode(),
            'DeliveryOptions' => $deliveryOptions
        ];

        if ($earliestDeliveryDate !== null) {
            $requestData['DeliveryDate'] = $earliestDeliveryDate->format('d-m-Y');
        }

        if ($openingTime !== null) {
            $requestData['OpeningTime'] = (string)$openingTime;
        }

        if (($city = $address->getCity()) !== null) {
            $requestData['City'] = $city;
        }

        if (($street = $address->getStreet()) !== null) {
            $requestData['Street'] = $street;
        }

        if (($houseNr = $address->getHouseNr()) !== null) {
            $requestData['HouseNumber'] = $houseNr;
        }

        return $this->get('/nearest', $requestData);
    }

    /**
     * Get the nearest locations, based on a geocode
     * @param int $lat
     * @param int $lon
     * @param string $countryCode
     * @param array $deliveryOptions
     * @param \DateTime|null $earliestDeliveryDate
     * @param OpeningTime|null $openingTime
     * @return array
     */
    public function getNearestLocationsByGeocode(
        int $lat,
        int $lon,
        string $countryCode,
        array $deliveryOptions = [DeliveryOptions::DAYTIME],
        \DateTime $earliestDeliveryDate = null,
        OpeningTime $openingTime = null
    ) {
        return [];
    }

    /**
     * Lookup location information
     * @param string $locationCode
     * @param string $RetailNetworkID
     * @return array
     */
    public function getLocationInformation(string $locationCode, string $RetailNetworkID = RetailNetworkID::NETHERLANDS)
    {
        return [];
    }
}
