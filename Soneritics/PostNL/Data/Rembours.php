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
namespace PostNL\Data;

use PostNL\Mapping\MappingGenerator;

/**
 * Rembours object.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  14-4-2015
 */
class Rembours extends MappingGenerator
{
    /**
     * Mapping array waarin wordt aangegeven welke getter overeenkomt
     * met welke veldcode. Definieert tevens de volgorde.
     * @var array
     */
    protected $mapping = [
        'A228' => 'IBAN',
        'A229' => 'BIC'
    ];

    /**
     * IBAN rekeningnummer van de verzender.
     * @var string
     */
    protected $IBAN;

    /**
     * BIC code van de verzender.
     * @var string
     */
    protected $BIC;

    /**
     * Getter voor het IBAN rekeningnummer.
     * @return string
     */
    protected function getIBAN()
    {
        return $this->IBAN;
    }

    /**
     * Getter voor de BIC code.
     * @return string
     */
    protected function getBIC()
    {
        return $this->BIC;
    }

    /**
     * Stel het IBAN rekeningnummer in van de verzender.
     * @param string $IBAN
     * @return \PostNL\Data\Rembours
     */
    public function setIBAN($IBAN)
    {
        // @todo check op geldige IBAN code
        $this->IBAN = $IBAN;
        return $this;
    }

    /**
     * Stel het BIC nummer in van de verzender.
     * @param string $BIC
     * @return \PostNL\Data\Rembours
     */
    public function setBIC($BIC)
    {
        if (strlen($BIC) < 8 || strlen($BIC) > 11) {
            throw new \Exception('Ongeldige BIC-code.');
        }

        $this->BIC = $BIC;
        return $this;
    }

        /**
     * Valideer de ingevoerde gegevens voordat de mapping wordt toegepast om
     * output te genereren.
     * @throws \Exception
     */
    protected function validate()
    {
        $mandatory = ['IBAN', 'BIC'];
        foreach ($mandatory as $property) {
            if (empty($this->$property)) {
                throw new \Exception(
                    'Verplichte property niet gevuld: ' . $property
                );
            }
        }
    }
}
