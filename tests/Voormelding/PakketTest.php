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

use PostNL\Data\Pakket;

/**
 * Unit tests voor PostNL\Data\Pakket
 *
 * @author Jordi Jolink
 * @since 15-5-2015
 */
class PakketTest extends TestAbstract
{
    /**
     * Test de validatiefunctie door een leeg pakketobject aan te maken.
     * @expectedException Exception
     */
    public function testValidationError()
    {
        (new Pakket)->genereer();
    }

    /**
     * Test de specifieke business rule dat er een bedrijfsnaam óf achternaam
     * van de ontvanger moet zijn opgegeven.
     * @expectedException Exception
     */
    public function testMissingCompanyAndLastname()
    {
        (new Pakket)
            ->setZendingcode(TestData::PAKKET_ZENDINGCODE)
            ->genereer();
    }

    /**
     * Test het opgeven van een verkeerde zendingcode, niet beginnent met 3S.
     * @expectedException Exception
     */
    public function testInvalidZendingcode()
    {
        (new Pakket)
            ->setZendingcode('DezeIsInvalid');
    }

    /**
     * Test het opgeven van een te korte zendingcode (exact 15 tekens).
     * @expectedException Exception
     */
    public function testZendingcodeTooShort()
    {
        (new Pakket)
            ->setZendingcode('3S12345678910');
    }

    /**
     * Test het opgeven van een te lange referentietekst (max 35 tekens).
     * @expectedException Exception
     */
    public function testReferenceTextTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setReferentietekst($tooLong);
    }

    /**
     * Test het opgeven van een te verkeerde productcode.
     * @expectedException Exception
     */
    public function testInvalidProductCode()
    {
        (new Pakket)
            ->setProductcode('123');
    }

    /**
     * Test het opgeven van een te lang e-mailadres (max 50 tekens).
     * @expectedException Exception
     */
    public function testEmailTooLong()
    {
        $tooLong = str_pad('x', 51);
        (new Pakket)
            ->setEmailadres($tooLong);
    }

    /**
     * Test het opgeven van een te lang mobiel telefoonnummer (max 12 tekens).
     * @expectedException Exception
     */
    public function testMobileNrTooLong()
    {
        $tooLong = str_pad('x', 13);
        (new Pakket)
            ->setMobiel($tooLong);
    }

    /**
     * Test het opgeven van een te lang telefoonnummer (max 12 tekens).
     * @expectedException Exception
     */
    public function testPhoneNrLong()
    {
        $tooLong = str_pad('x', 13);
        (new Pakket)
            ->setTelefoon($tooLong);
    }

    /**
     * Test het opgeven van een te verkeerd remboursbedrag (int).
     * @expectedException Exception
     */
    public function testInvalidRemboursAmount()
    {
        (new Pakket)
            ->setRemboursbedrag(12.95);
    }

    /**
     * Test het opgeven van een te verkeerd verzekerd bedrag (int).
     * @expectedException Exception
     */
    public function testInvalidInsuredAmount()
    {
        (new Pakket)
            ->setVerzekerdBedrag(12.95);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) bedrijfsnaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingCompanyNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeBedrijfsnaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) afdeling.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingdivisionNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeAfdeling($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) achternaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingLastNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeAchternaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) voornaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingFirstNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeVoornaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) gebouwnaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingBuildingNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeGebouwnaam($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) verdiepingnaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingFloorNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeVerdieping($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) straatnaam.
     * (max 95 tekens)
     * @expectedException Exception
     */
    public function testAddressingStreetNameTooLong()
    {
        $tooLong = str_pad('x', 96);
        (new Pakket)
            ->setGeadresseerdeStraatnaam($tooLong);
    }

    /**
     * Test het opgeven van een te lang (geadresseerde) huisnummer.
     * (max 5 tekens)
     * @expectedException Exception
     */
    public function testAddressingHousenumberTooLong()
    {
        $tooLong = str_pad('x', 6);
        (new Pakket)
            ->setGeadresseerdeHuisnummerPostbusnummer($tooLong);
    }

    /**
     * Test het opgeven van een ongeldig (geadresseerde) huisnummer.
     * @expectedException Exception
     */
    public function testInvalidHousenumber()
    {
        (new Pakket)
            ->setGeadresseerdeHuisnummerPostbusnummer('1a');
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) huisnummer-toevoeging.
     * (max 6 tekens)
     * @expectedException Exception
     */
    public function testAddressingHousenumberExtensionTooLong()
    {
        $tooLong = str_pad('x', 7);
        (new Pakket)
            ->setGeadresseerdeHuisnummerToevoeging($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) postcode.
     * (exact 6 tekens)
     * @expectedException Exception
     */
    public function testAddressingZipcodeTooLong()
    {
        $tooLong = str_pad('x', 7);
        (new Pakket)
            ->setGeadresseerdePostcode($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) woonplaats.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingPlaceTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeWoonplaats($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) wijknaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingWijkTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeWijk($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) regionaam.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingRegionNameTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeRegio($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) deurcode.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingDoorCodeTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeDeurcode($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) opmerking.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testAddressingCommentTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setGeadresseerdeOpmerking($tooLong);
    }

    /**
     * Test het opgeven van een te lange (geadresseerde) landcode.
     * (exact 2 tekens)
     * @expectedException Exception
     */
    public function testAddressingCountryCodeTooLong()
    {
        $tooLong = str_pad('x', 3);
        (new Pakket)
            ->setGeadresseerdeLandcode($tooLong);
    }

    /**
     * Test het opgeven van een te korte (geadresseerde) landcode.
     * (exact 2 tekens)
     * @expectedException Exception
     */
    public function testAddressingCountryCodeTooShort()
    {
        (new Pakket)
            ->setGeadresseerdeLandcode('x');
    }

    /**
     * Test het opgeven van een te lange inhoud.
     * (max 35 tekens)
     * @expectedException Exception
     */
    public function testContentsCommentTooLong()
    {
        $tooLong = str_pad('x', 36);
        (new Pakket)
            ->setInhoud($tooLong);
    }

    /**
     * Test het opgeven van een te groot gewicht.
     * (max 6 tekens)
     * @expectedException Exception
     */
    public function testWeightTooBig()
    {
        (new Pakket)
            ->setGewicht(1000000);
    }

    /**
     * Test een verkeerd ingevoerd gewicht (zonder decimalen).
     * @expectedException Exception
     */
    public function testInvalidWeight()
    {
        (new Pakket)
            ->setGewicht(2.5);
    }
}
