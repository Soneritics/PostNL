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

use PostNL\Data\Afzender;

/**
 * Unit tests voor PostNL\Data\Afzender
 *
 * @author Jordi Jolink
 * @since 15-5-2015
 */
class AfzenderTest extends TestAbstract
{
    /**
     * Test de validatiefunctie door een leeg remboursobject aan te maken.
     * @expectedException Exception
     */
    public function testValidationError()
    {
        $afzender = new Afzender;
        $result = $afzender->genereer();
        $this->assertEmpty($result);
    }

    /**
     * Test de specifieke business rule dat er een bedrijfsnaam óf achternaam
     * van de afzender moet zijn opgegeven.
     * @expectedException Exception
     */
    public function testMissingCompanyAndLastname()
    {
        $result = (new Afzender)
            ->setHuisnummerPostbusnummer(TestData::AFZENDER_HUISNUMMER)
            ->setPostcode(TestData::AFZENDER_POSTCODE)
            ->setLandcode(TestData::AFZENDER_LANDCODE)
            ->genereer();
        $this->assertEmpty($result);
    }

    /**
     * Test het opgeven van een te lange bedrijfsnaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testCompanyNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setBedrijfsnaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange afdeling (max 35 tekens).
     * @expectedException Exception
     */
    public function testAfdelingTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setAfdeling($tooLong);
    }

    /**
     * Test het opgeven van een te lange achternaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testLastNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setAchternaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange voornaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testFirstNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setVoornaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange gebouwnaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testBuildingNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setGebouwnaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange verdiepingnaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testFloorNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setVerdieping($tooLong);
    }

    /**
     * Test het opgeven van een te lange straatnaam (max 95 tekens).
     * @expectedException Exception
     */
    public function testStreetNameTooLong()
    {
        $tooLong = str_pad('x', 96);
        (new Afzender)
            ->setStraatnaamPostbus($tooLong);
    }

    /**
     * Test het opgeven van een te lang huisnummer (max 5 tekens).
     * @expectedException Exception
     */
    public function testHousenumberTooLong()
    {
        $tooLong = str_pad('x', 6);
        (new Afzender)
            ->setHuisnummerPostbusnummer($tooLong);
    }

    /**
     * Test het opgeven van een te lange postcode (max 6 tekens).
     * @expectedException Exception
     */
    public function testZipcodeTooLong()
    {
        $tooLong = str_pad('x', 7);
        (new Afzender)
            ->setPostcode($tooLong);
    }

    /**
     * Test het opgeven van een te lange woonplaats (max 35 tekens).
     * @expectedException Exception
     */
    public function testPlaceNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setWoonplaats($tooLong);
    }

    /**
     * Test het opgeven van een te lange wijknaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testWijkNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setWijk($tooLong);
    }

    /**
     * Test het opgeven van een te lange regionaam (max 35 tekens).
     * @expectedException Exception
     */
    public function testRegioNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setRegio($tooLong);
    }

    /**
     * Test het opgeven van een te lange deurcode (max 35 tekens).
     * @expectedException Exception
     */
    public function testDeurcodeTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setDeurcode($tooLong);
    }

    /**
     * Test het opgeven van te lange opmerkingen (max 35 tekens).
     * @expectedException Exception
     */
    public function testCommentsTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Afzender)
            ->setOpmerking($tooLong);
    }

    /**
     * Test het opgeven van te lange opmerkingen (max 35 tekens).
     * @expectedException Exception
     */
    public function testInvalidComment()
    {
        (new Afzender)
            ->setOpmerking("Opm. met\nnewline char.");
    }

    /**
     * Test het opgeven van te lange landcode (exact 2 tekens).
     * @expectedException Exception
     */
    public function testCountrycodeTooLong()
    {
        (new Afzender)
            ->setLandcode('xxx');
    }

    /**
     * Test het opgeven van te korte landcode (exact 2 tekens).
     * @expectedException Exception
     */
    public function testCountrycodeTooSmall()
    {
        (new Afzender)
            ->setLandcode('x');
    }
}
