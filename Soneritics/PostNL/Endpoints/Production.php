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
namespace PostNL\Endpoints;

/**
 * Production endpoints
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  27-5-2018
 */
class Production extends Endpoints
{
    public $Barcode = 'https://api.postnl.nl/shipment/v1_1';
    public $Confirm = 'https://api.postnl.nl/shipment/v1_10';
    public $Labelling = 'https://api.postnl.nl/shipment/v2_2';
    public $Timeframe = 'https://api.postnl.nl/shipment/v2_1';
    public $Locations = 'https://api.postnl.nl/shipment/v2_1/locations';
    public $PostalCode = 'https://api.postnl.nl/shipment/checkout/v1';
    public $ShippingStatus = 'https://api.postnl.nl/shipment/v2/status';
}
