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

use PostNL\Model\Customer;

/**
 * Abstract Service
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  27-5-2018
 */
abstract class AbstractService
{
    /**
     *
     * @var string
     */
    private $apiKey;

    /**
     *
     * @var string
     */
    private $endpoint;

    /**
     *
     * @var Customer
     */
    protected $customer;

    /**
     * API constructor.
     *
     * @param string   $apiKey
     * @param Customer $customer
     * @param string   $endpoint
     */
    public function __construct(string $apiKey, Customer $customer, string $endpoint)
    {
        $this->apiKey = $apiKey;
        $this->endpoint = $endpoint;
        $this->customer = $customer;
    }

    /**
     * Get data from a REST call.
     *
     * @param  $url
     * @param  $data
     * @return string
     * @throws \Exception
     */
    protected function get($url, $data)
    {
        return (new \PestJSON($this->endpoint))->get($url, $data, $this->getHeaders());
    }

    /**
     * POST data to a REST endpoint.
     *
     * @param  $url
     * @param  $data
     * @return string
     * @throws \Exception
     */
    protected function post($url, $data)
    {
        return (new \PestJSON($this->endpoint))->post($url, $data, $this->getHeaders());
    }

    /**
     * Fetch the security headers.
     *
     * @return array
     */
    private function getHeaders()
    {
        return ['apikey' => $this->apiKey];
    }
}
