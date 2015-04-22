<?php
/*
 * The MIT License
 *
 * Copyright 2014 Soneritics Webdevelopment.
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
require_once __DIR__ . '/TestAbstract/TestAbstract.php';

use PostNL\Data\Rembours;

/**
 * Integratie tests voor PostNL\Data\Rembours
 *
 * @author Jordi Jolink
 * @since 22-4-2015
 */
class RemboursIntegrationTest extends TestAbstract
{
    private $validBIC = 'RABONL2U';
    private $validIBAN = 'NLRABO12345678'; // @todo

    /**
     * Integratietest om het resultaat van de genereer() functie van het
     * PostNL\Data\Rembours object te controleren.
     * Het Rembours-object bevat twee waarden die beide verplicht zijn, daarom
     * slechts één testcase in deze unit test.
     */
    public function testGenereren()
    {
        $resultGenerator = (new Rembours)
            ->setBIC($this->validBIC)
            ->setIBAN($this->validIBAN)
            ->genereer();

        $result = [];
        foreach ($resultGenerator as $line) {
            $result[] = $line;
        }

        $this->assertEquals(
            implode("\n", $result),
            "A228 {$this->validIBAN}\nA229 {$this->validBIC}"
        );
    }
}
