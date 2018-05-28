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

/**
 * Barcode Service
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  27-5-2018
 */
class BarcodeService extends AbstractService
{
    /**
     * Generate a barcode.
     * @param string $type
     * @param string $serie
     * @return string
     * @throws \Exception
     */
    public function GenerateBarcode($type = '3S', $serie = '000000000-999999999'): string
    {
        $result = $this->get(
            '/barcode',
            [
                'CustomerCode' => $this->customer->CustomerCode,
                'CustomerNumber' => $this->customer->CustomerNumber,
                'Type' => $type,
                'Serie' => $serie
            ]
        );

        if (is_array($result) && !empty($result['Barcode'])) {
            return (string)$result['Barcode'];
        }

        throw new \Exception('Could not generate barcode. Unknown exception.');
    }
}
