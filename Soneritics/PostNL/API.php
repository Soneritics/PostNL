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
namespace PostNL;

use PostNL\Endpoints\Endpoints;
use PostNL\Model\Customer;
use PostNL\Service\AddressService;
use PostNL\Service\BarcodeService;
use PostNL\Service\ConfirmService;
use PostNL\Service\LabellingService;
use PostNL\Service\LocationsService;
use PostNL\Service\PostalcodeService;
use PostNL\Service\ShippingStatusService;
use PostNL\Service\TimeframeService;

/**
 * PostNL API
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  27-5-2018
 */
class API
{
    /**
     *
     * @var string
     */
    private $apiKey;

    /**
     *
     * @var Customer
     */
    private $customer;

    /**
     *
     * @var Endpoints
     */
    private $endpoints;

    /**
     * API constructor.
     *
     * @param string    $apiKey
     * @param Customer  $customer
     * @param Endpoints $endpoints
     */
    public function __construct(string $apiKey, Customer $customer, Endpoints $endpoints)
    {
        $this->apiKey = $apiKey;
        $this->customer = $customer;
        $this->endpoints = $endpoints;
    }

    /**
     * Get a barcode service instance.
     *
     * @return BarcodeService
     */
    public function getBarcodeService(): BarcodeService
    {
        return new BarcodeService($this->apiKey, $this->customer, $this->endpoints->Barcode);
    }

    /**
     * Get a confirm service instance.
     *
     * @return ConfirmService
     */
    public function getConfirmService(): ConfirmService
    {
        return new ConfirmService($this->apiKey, $this->customer, $this->endpoints->Confirm);
    }

    /**
     * Get a labelling service instance.
     *
     * @return LabellingService
     */
    public function getLabellingService(): LabellingService
    {
        return new LabellingService($this->apiKey, $this->customer, $this->endpoints->Labelling);
    }

    /**
     * Get a timeframe service instance.
     *
     * @return TimeframeService
     */
    public function getTimeframeService(): TimeframeService
    {
        return new TimeframeService($this->apiKey, $this->customer, $this->endpoints->Timeframe);
    }

    /**
     * Get a locations service instance
     *
     * @return LocationsService
     */
    public function getLocationsService(): LocationsService
    {
        return new LocationsService($this->apiKey, $this->customer, $this->endpoints->Locations);
    }

    /**
     * Get a PostalcodeService instance
     * @return PostalcodeService
     */
    public function getPostalcodeService(): PostalcodeService
    {
        return new PostalcodeService($this->apiKey, $this->customer, $this->endpoints->PostalCode);
    }

    public function getShippingStatusService(): ShippingStatusService
    {
        return new ShippingStatusService($this->apiKey, $this->customer, $this->endpoints->ShippingStatus);
    }

	/**
	 * Get the address service
	 *
	 * @return AddressService
	 */
	public function getAddressService(): AddressService
	{
		return new AddressService($this->apiKey, $this->customer, $this->endpoints->Address);
	}
}
