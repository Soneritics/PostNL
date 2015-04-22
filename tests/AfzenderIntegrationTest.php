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
 * Integratie tests voor PostNL\Data\Afzender
 *
 * @author Jordi Jolink
 * @since 22-4-2015
 */
class AfzenderIntegrationTest extends TestAbstract
{
    /**
     * Integratietest om het resultaat van de genereer() functie van het
     * PostNL\Data\Afzender object te controleren.
     * Vult alle mogelijkheden van het Afzender object.
     */
    public function testGenereren()
    {
        $bedrijfsnaam = TestData::AFZENDER_BEDRIJFSNAAM;
        $afdeling = TestData::AFZENDER_AFDELING;
        $achternaam = TestData::AFZENDER_ACHTERNAAM;
        $voornaam = TestData::AFZENDER_VOORNAAM;
        $gebouwnaam = TestData::AFZENDER_GEBOUWNAAM;
        $verdieping = TestData::AFZENDER_VERDIEPING;
        $straatnaamPostbus = TestData::AFZENDER_STRAATNAAM;
        $huisnummerPostbusnummer = TestData::AFZENDER_HUISNUMMER;
        $huisnummerToevoeging = TestData::AFZENDER_HUISNUMMER_TOEVOEGING;
        $postcode = TestData::AFZENDER_POSTCODE;
        $woonplaats = TestData::AFZENDER_WOONPLAATS;
        $wijk = TestData::AFZENDER_WIJK;
        $regio = TestData::AFZENDER_REGIO;
        $deurcode = TestData::AFZENDER_DEURCODE;
        $opmerking = TestData::AFZENDER_OPMERKING;
        $landcode = TestData::AFZENDER_LANDCODE;

        $resultGenerator = (new Afzender)
            ->setBedrijfsnaam($bedrijfsnaam)
            ->setAfdeling($afdeling)
            ->setAchternaam($achternaam)
            ->setVoornaam($voornaam)
            ->setGebouwnaam($gebouwnaam)
            ->setVerdieping($verdieping)
            ->setStraatnaamPostbus($straatnaamPostbus)
            ->setHuisnummerPostbusnummer($huisnummerPostbusnummer)
            ->setHuisnummerToevoeging($huisnummerToevoeging)
            ->setPostcode($postcode)
            ->setWoonplaats($woonplaats)
            ->setWijk($wijk)
            ->setRegio($regio)
            ->setDeurcode($deurcode)
            ->setOpmerking($opmerking)
            ->setLandcode($landcode)
            ->genereer();

        $result = [];
        foreach ($resultGenerator as $line) {
            $result[] = $line;
        }

        $expected = [
            "A130 $bedrijfsnaam",
            "A131 $afdeling",
            "A132 $achternaam",
            "A133 $voornaam",
            "A137 $gebouwnaam",
            "A138 $verdieping",
            "A139 $straatnaamPostbus",
            "A140 $huisnummerPostbusnummer",
            "A141 $huisnummerToevoeging",
            "A150 $postcode",
            "A151 $woonplaats",
            "A152 $wijk",
            "A153 $regio",
            "A154 $deurcode",
            "A155 $opmerking",
            "A220 $landcode"
        ];

        $this->assertEquals(implode("\n", $result), implode("\n", $expected));
    }
}
