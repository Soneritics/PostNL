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

/**
 * Testdata voor de unit tests.
 *
 * @author Jordi Jolink
 * @since 22-4-2015
 */
class TestData
{
    const VALID_BIC = 'RABONL2U';
    const VALID_IBAN = 'NLRABO12345678';

    const AFZENDER_BEDRIJFSNAAM = 'Bedrijfsnaam';
    const AFZENDER_AFDELING = 'Afdeling';
    const AFZENDER_ACHTERNAAM = 'Achternaam';
    const AFZENDER_VOORNAAM = 'Voornaam';
    const AFZENDER_GEBOUWNAAM = 'Gebouw';
    const AFZENDER_VERDIEPING = '1e verdieping';
    const AFZENDER_STRAATNAAM = 'Straat';
    const AFZENDER_HUISNUMMER = '15';
    const AFZENDER_HUISNUMMER_TOEVOEGING = 'a';
    const AFZENDER_POSTCODE = '1234AB';
    const AFZENDER_WOONPLAATS = 'Woonplaats';
    const AFZENDER_WIJK = 'Wijk';
    const AFZENDER_REGIO = 'Regio';
    const AFZENDER_DEURCODE = '12345';
    const AFZENDER_OPMERKING = 'Dit is een test';
    const AFZENDER_LANDCODE = 'NL';

    const PAKKET_ZENDINGCODE = '3S1234567891234';
    const PAKKET_REFERENTIETEKST = 'Referentietekstje';
    const PAKKET_PRODUCTCODE = \PostNL\Data\Productcode::REMBOURS;
    const PAKKET_FRANKEERAANDUIDING = 15;
    const PAKKET_EMAILADRES = 'no-mail@forme.com';
    const PAKKET_MOBIEL = '0612345678';
    const PAKKET_TELEFOON = '0102659874';
    const PAKKET_VOLGNUMMERCOLLO = 1;
    const PAKKET_AANTALCOLLI = 1;
    const PAKKET_REMBOURSBEDRAG = 2085;
    const PAKKET_VERZEKERDBEDRAG = 27595;
    const PAKKET_GEADRESSEERDEBEDRIJFSNAAM = 'Bedrijfsnaam';
    const PAKKET_GEADRESSEERDEAFDELING = 'Afdeling';
    const PAKKET_GEADRESSEERDEACHTERNAAM = 'Achternaam';
    const PAKKET_GEADRESSEERDEVOORNAAM = 'Voornaam';
    const PAKKET_GEADRESSEERDEGEBOUWNAAM = 'Groot gebouw';
    const PAKKET_GEADRESSEERDEVERDIEPING = '2e';
    const PAKKET_GEADRESSEERDESTRAATNAAM = 'Straat';
    const PAKKET_GEADRESSEERDEHUISNUMMERPOSTBUSNUMMER = '153';
    const PAKKET_GEADRESSEERDEHUISNUMMERTOEVOEGING = 'a';
    const PAKKET_GEADRESSEERDEPOSTCODE = '1234AA';
    const PAKKET_GEADRESSEERDEWOONPLAATS = 'Amsterdam';
    const PAKKET_GEADRESSEERDEWIJK = 'Groene wijk';
    const PAKKET_GEADRESSEERDEREGIO = 'Noord';
    const PAKKET_GEADRESSEERDEDEURCODE = '1734';
    const PAKKET_GEADRESSEERDEOPMERKING = 'Controleer inhoud';
    const PAKKET_GEADRESSEERDELANDCODE = 'NL';
    const PAKKET_INHOUD = 'Inhoud';
    const PAKKET_GEWICHT = 250;
}
