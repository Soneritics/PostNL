<?php
/*
 * The MIT License
 *
 * Copyright 2020 Soneritics.
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

/**
 * Shipping Status Service.
 */
class ShippingStatusService extends AbstractService
{
    /**
     * Get the status by a barcode.
     *
     * @param string $barcode
     * @param string $detail
     * @param string $language
     *
     * @throws \Exception
     *
     * @return string
     */
    public function getByBarcode(string $barcode, string $detail = 'true', string $language = 'NL')
    {
        return $this->get("/barcode/{$barcode}", [
            'detail'   => $detail,
            'language' => $language,
        ]);
    }

    /**
     * Only from period supported for now
     * @period = YYYY-MM-DDTHH:MM:SS
     *
     * @param string $customerNumber
     * @param string|null $fromPeriod
     * @return string
     * @throws \Exception
     */
    public function getByCustomerNumber(string $customerNumber, string $fromPeriod = null)
    {
        $params = [];
        if ($fromPeriod) {
            $params['period'] = $fromPeriod;
        }

        return $this->get("{$customerNumber}/updatedshipments", $params);
    }
}
