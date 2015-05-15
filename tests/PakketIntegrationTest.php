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
 * Integratie tests voor PostNL\Data\Pakket
 *
 * @author Jordi Jolink
 * @since 15-5-2015
 */
class PakketIntegrationTest extends TestAbstract
{
    /**
     * Integratietest om het resultaat van de genereer() functie van het
     * PostNL\Data\Pakket object te controleren.  Vult alle mogelijkheden van
     * het Pakket object om een volledige integratie te kunnen controleren.
     */
    public function testGenereren()
    {
        $zendingcode = TestData::PAKKET_ZENDINGCODE;
        $referentietekst = TestData::PAKKET_REFERENTIETEKST;
        $productcode = TestData::PAKKET_PRODUCTCODE;
        $frankeeraanduiding = TestData::PAKKET_FRANKEERAANDUIDING;
        $emailadres = TestData::PAKKET_EMAILADRES;
        $mobiel = TestData::PAKKET_MOBIEL;
        $telefoon = TestData::PAKKET_TELEFOON;
        $volgnummerCollo = TestData::PAKKET_VOLGNUMMERCOLLO;
        $aantalColli = TestData::PAKKET_AANTALCOLLI;
        $remboursbedrag = TestData::PAKKET_REMBOURSBEDRAG;
        $verzekerdBedrag = TestData::PAKKET_VERZEKERDBEDRAG;
        $geadresseerdeBedrijfsnaam = TestData::PAKKET_GEADRESSEERDEBEDRIJFSNAAM;
        $geadresseerdeAfdeling = TestData::PAKKET_GEADRESSEERDEAFDELING;
        $geadresseerdeAchternaam = TestData::PAKKET_GEADRESSEERDEACHTERNAAM;
        $geadresseerdeVoornaam = TestData::PAKKET_GEADRESSEERDEVOORNAAM;
        $geadresseerdeGebouwnaam = TestData::PAKKET_GEADRESSEERDEGEBOUWNAAM;
        $geadresseerdeVerdieping = TestData::PAKKET_GEADRESSEERDEVERDIEPING;
        $geadresseerdeStraatnaam = TestData::PAKKET_GEADRESSEERDESTRAATNAAM;
        $geadresseerdeHuisnummerPostbusnummer = TestData::PAKKET_GEADRESSEERDEHUISNUMMERPOSTBUSNUMMER;
        $geadresseerdeHuisnummerToevoeging = TestData::PAKKET_GEADRESSEERDEHUISNUMMERTOEVOEGING;
        $geadresseerdePostcode = TestData::PAKKET_GEADRESSEERDEPOSTCODE;
        $geadresseerdeWoonplaats = TestData::PAKKET_GEADRESSEERDEWOONPLAATS;
        $geadresseerdeWijk = TestData::PAKKET_GEADRESSEERDEWIJK;
        $geadresseerdeRegio = TestData::PAKKET_GEADRESSEERDEREGIO;
        $geadresseerdeDeurcode = TestData::PAKKET_GEADRESSEERDEDEURCODE;
        $geadresseerdeOpmerking = TestData::PAKKET_GEADRESSEERDEOPMERKING;
        $geadresseerdeLandcode = TestData::PAKKET_GEADRESSEERDELANDCODE;
        $inhoud = TestData::PAKKET_INHOUD;
        $gewicht = TestData::PAKKET_GEWICHT;

        $resultGenerator = (new Pakket)
            ->setZendingcode($zendingcode)
            ->setReferentietekst($referentietekst)
            ->setProductcode($productcode)
            ->setFrankeeraanduiding($frankeeraanduiding)
            ->setEmailadres($emailadres)
            ->setMobiel($mobiel)
            ->setTelefoon($telefoon)
            ->setVolgnummerCollo($volgnummerCollo)
            ->setAantalColli($aantalColli)
            ->setRemboursbedrag($remboursbedrag)
            ->setVerzekerdBedrag($verzekerdBedrag)
            ->setGeadresseerdeBedrijfsnaam($geadresseerdeBedrijfsnaam)
            ->setGeadresseerdeAfdeling($geadresseerdeAfdeling)
            ->setGeadresseerdeAchternaam($geadresseerdeAchternaam)
            ->setGeadresseerdeVoornaam($geadresseerdeVoornaam)
            ->setGeadresseerdeGebouwnaam($geadresseerdeGebouwnaam)
            ->setGeadresseerdeVerdieping($geadresseerdeVerdieping)
            ->setGeadresseerdeStraatnaam($geadresseerdeStraatnaam)
            ->setGeadresseerdeHuisnummerPostbusnummer($geadresseerdeHuisnummerPostbusnummer)
            ->setGeadresseerdeHuisnummerToevoeging($geadresseerdeHuisnummerToevoeging)
            ->setGeadresseerdePostcode($geadresseerdePostcode)
            ->setGeadresseerdeWoonplaats($geadresseerdeWoonplaats)
            ->setGeadresseerdeWijk($geadresseerdeWijk)
            ->setGeadresseerdeRegio($geadresseerdeRegio)
            ->setGeadresseerdeDeurcode($geadresseerdeDeurcode)
            ->setGeadresseerdeOpmerking($geadresseerdeOpmerking)
            ->setGeadresseerdeLandcode($geadresseerdeLandcode)
            ->setGewicht($gewicht)
            ->setInhoud($inhoud)
            ->genereer();

        $result = [];
        foreach ($resultGenerator as $line) {
            $result[] = $line;
        }

        $expected = [
            "V010 V",
            "V020 $zendingcode",
            "V021 $zendingcode",
            "V025 $referentietekst",
            "V040 $productcode",
            "V051 $frankeeraanduiding",
            "V056 $emailadres",
            "V057 $mobiel",
            "V058 $telefoon",
            "V060 $volgnummerCollo",
            "V061 $aantalColli",
            "V070 $remboursbedrag",
            "V090 $verzekerdBedrag",
            "V170 $geadresseerdeBedrijfsnaam",
            "V171 $geadresseerdeAfdeling",
            "V172 $geadresseerdeAchternaam",
            "V173 $geadresseerdeVoornaam",
            "V177 $geadresseerdeGebouwnaam",
            "V178 $geadresseerdeVerdieping",
            "V179 $geadresseerdeStraatnaam",
            "V180 $geadresseerdeHuisnummerPostbusnummer",
            "V181 $geadresseerdeHuisnummerToevoeging",
            "V190 $geadresseerdePostcode",
            "V191 $geadresseerdeWoonplaats",
            "V192 $geadresseerdeWijk",
            "V193 $geadresseerdeRegio",
            "V194 $geadresseerdeDeurcode",
            "V195 $geadresseerdeOpmerking",
            "V200 $geadresseerdeLandcode",
            "V440 $inhoud",
            "V450 $gewicht",
            "V999"
        ];

        $this->assertEquals(implode("\n", $result), implode("\n", $expected));
    }
}
