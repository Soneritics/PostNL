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
namespace PostNL;

use Mapping\MappingTrait;
use Data\Afzender;
use Data\Pakket;
use Data\Rembours;

/**
 * Voormelding voor verzendingen.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  14-4-2015
 */
class Voormelding
{
    /**
     * Trait om mapping mogelijk te maken.
     */
    use MappingTrait;

    /**
     * Mapping array waarin wordt aangegeven welke getter overeenkomt
     * met welke veldcode. Definieert tevens de volgorde.
     * @var array
     */
    protected $mapping = [
        'A010' => 'DatumAanmaakBestand',
        'A011' => 'TijdAanmaakBestand',
        'A020' => 'BerichtVersie',
        'A021' => 'SoftwareVersie',
        'A022' => 'ProductVersie',
        'A030' => 'KlantCode',
        'A040' => 'VoormeldingId',
        'A060' => 'AanleverdatumZendingen'
    ];

    /**
     * Collectie met de pakketten die via dit voormeldbestand aangemeld worden.
     * @var array
     */
    protected $pakketten = [];

    /**
     * Remboursinformatie. Niet verplicht wanneer geen rembourszending.
     * @var \PostNL\Data\Afzender
     */
    protected $afzender;

    /**
     * Remboursinformatie. Niet verplicht wanneer geen rembourszending.
     * @var \PostNL\Data\Rembours
     */
    protected $rembours;

    /**
     * Berichtversie. Standaardwaarde die niet gewijzigd kan worden.
     * @var int
     */
    protected $berichtVersie = 811;

    /**
     * Softwareversie. Standaardwaarde die niet gewijzigd kan worden.
     * @var int
     */
    protected $softwareVersie = 811;

    /**
     * Productversie. Standaardwaarde die niet gewijzigd kan worden.
     * @var int
     */
    protected $productVersie = 130;

    /**
     * Datum van aanmaken van dit bestand, in formaat: jjjjmmdd
     * @var string
     */
    protected $datumAanmaakBestand;

    /**
     * Tijd van aanmaken van dit bestand, in formaat: uummss
     * @var string
     */
    protected $tijdAanmaakBestand;

    /**
     * Datum van aanleveren zendingen, in formaat: jjjjmmdd
     * @var string
     */
    protected $aanleverdatumZendingen;

    /**
     * String van 4 karakters met de klantcode/partycode.
     * @var string
     */
    protected $klantCode;

    /**
     * Voormelding ID (klantcode + volgnummer)
     * @var string
     */
    protected $voormeldingId;

    /**
     * Aanleverlocatie.
     * @var string
     */
    protected $aanleverLocatie;

    /**
     * Constructor. Roept functies aan om de voormelding te starten.
     */
    public function __construct()
    {
        $this->setDefaults();
    }

    /**
     * Genereert het voormeldbestand en returnt de inhoud van dit bestand.
     * @return string
     */
    public function genereer()
    {
        // Valideer invoer
        $this->validate();

        // Genereer A-segment
        $result = $this->getMappedValues();
        $result += $this->afzender->genereer();

        if (!empty($this->rembours)) {
            $result += $this->rembours->genereer();
        }

        $result[] = "A230 " . $this->getAanleverLocatie();
        $result[] = "A999";

        // Genereer V-segment
        foreach ($this->pakketten as $pakket) {
            $result[] = $pakket->genereer();
        }

        // Genereer Z-segment
        $result[] = 'Z001 ' . count($this->pakketten);
        $result[] = 'Z002 0'; // @todo: Som remboursbedragen
        $result[] = 'Z999';

        // Totaalresultaat returnen
        return implode("\n", $result);
    }

    /**
     * Pakket toevoegen aan de zending.
     * @param \PostNL\Pakket $pakket
     * @return \PostNL\Voormelding
     */
    public function addPakket(Pakket $pakket)
    {
        $this->pakketten[] = $pakket;
        return $this;
    }

    /**
     * Afzender toevoegen aan de vooraanmelding.
     * @param Afzender $afzender
     * @return \PostNL\Voormelding
     */
    public function setAfzender(Afzender $afzender)
    {
        $this->afzender = $afzender;
        return $this;
    }

    /**
     * Remboursinformatie toevoegen aan de vooraanmelding.
     * @param \PostNL\Rembours $info
     * @return \PostNL\Voormelding
     */
    public function setRemboursInfo(Rembours $info)
    {
        $this->rembours = $info;
        return $this;
    }

    /**
     * Stel de datum en tijd in van het aanmaken van het bestand. Wordt
     * standaard ingesteld dus is optioneel.
     * Wanneer setDatumTijdAanmaakBestand() wordt aangeroepen en de datum is na
     * de aanleverdatum, wordt de aanleverdatum ingesteld op deze datum.
     * @param int $timestamp
     * @return \PostNL\Voormelding
     * @throws \Exception
     */
    public function setDatumTijdAanmaakBestand($timestamp)
    {
        // Simpele controle op timestamp
        if (!is_numeric($timestamp)) {
            throw new \Exception('Ongeldige timestamp: ' . $timestamp);
        }

        // Zet datum en tijd op basis van timestamp
        $datum = date('Ymd', $timestamp);
        $this->datumAanmaakBestand($datum);
        $this->tijdAanmaakBestand(date('His', $timestamp));

        // Kijk of datum na aanleverdatum is
        if (empty($this->aanleverdatumZendingen) ||
            $datum > $this->aanleverdatumZendingen
        ) {
            $this->setAanleverdatumZendingen($timestamp);
        }

        // Chainable
        return $this;
    }

    /**
     * Stel de datum en tijd in van het aanmaken van het bestand. Wordt
     * standaard ingesteld op vandaag dus is optioneel.
     * Wanneer setDatumTijdAanmaakBestand() wordt aangeroepen en de datum is na
     * de aanleverdatum, wordt de aanleverdatum ingesteld op deze datum.
     * @param int $timestamp
     * @return \PostNL\Voormelding
     * @throws \Exception
     */
    public function setAanleverdatumZendingen($timestamp)
    {
        // Simpele controle op timestamp
        if (!is_numeric($timestamp)) {
            throw new \Exception('Ongeldige timestamp: ' . $timestamp);
        }

        // Zet datum op basis van timestamp
        $this->aanleverdatumZendingen = date('Ymd', $timestamp);

        // Chainable
        return $this;
    }

    /**
     * Setter voor de klantcode.
     * @param string $klantCode String van maximaal 4 karakters.
     */
    public function setKlantCode($klantCode)
    {
        // Controle op maximum lengte
        if (strlen($klantCode) !== 4) {
            throw new \Exception('Klantcode moet exact 4 karakters bevatten.');
        }

        $this->klantCode = $klantCode;
        return $this;
    }

    /**
     * Setter voor het volgnummer. Genereert een PostNL voormeld ID.
     * Het is belangrijk dat het klantnummer reeds geset is.
     * @param int $volgnummer
     * @return \PostNL\Voormelding
     * @throws \Exception
     */
    public function setVolgnummer($volgnummer)
    {
        // Controle op maximum lengte
        if (strlen($volgnummer) > 8) {
            throw new \Exception('Volgnummer kan maximaal 8 tekens bevatten.');
        }

        // Volgnummer moet numeriek zijn
        if (!is_numeric($volgnummer)) {
            throw new \Exception('Volgnummer moet een getal zijn.');
        }

        // Klantcode moet geset zijn
        if (empty($this->klantCode)) {
            throw new \Exception('Stel eerst de klantcode in.');
        }

        // Voormelding ID samenstellen
        $this->voormeldingId = $this->getKlantCode() .
            str_pad($volgnummer, 8, ' 0', STR_PAD_LEFT);

        // Chainable
        return $this;
    }

    /**
     * Setter voor de aanleverlocatie.
     * @param int $locatie
     * @return \PostNL\Voormelding
     * @throws \Exception
     */
    public function setAanleverLocatie($locatie)
    {
        // Controle op maximum lengte
        if (strlen($locatie) !== 6) {
            throw new \Exception('Aanleverlocatie moet 6 tekens bevatten.');
        }

        // Volgnummer moet numeriek zijn
        if (!is_numeric($locatie)) {
            throw new \Exception('Locatie moet een getal zijn.');
        }

        $this->aanleverLocatie = $locatie;
        return $this;
    }

    /**
     * Zet de default waarden voor de vooraanmelding.
     */
    protected function setDefaults()
    {
        $this->setDatumTijdAanmaakBestand(time());
    }

    /**
     * Valideer de gesette waarden.
     * Aangezien de setters al zorgen dat waarden op de juiste manier
     * geformatteerd worden, hoeft hier uitsluitend gecontroleerd te worden of
     * de waarden gezet zijn.
     * @throws \Exception Wanneer niet alle validaties succesvol zijn.
     */
    protected function validate()
    {
        $mandatory = [
            'pakketten',
            'afzender',
            'datumAanmaakBestand',
            'tijdAanmaakBestand',
            'aanleverdatumZendingen',
            'klantCode',
            'voormeldingId',
            'aanleverLocatie'
        ];

        foreach ($mandatory as $property) {
            if (empty($property)) {
                throw new \Exception(
                    'Verplichte property niet gevuld: ' . $property
                );
            }
        }
    }

    /**
     * Getter voor de aanmaakdatum van het bestand.
     * @return string
     */
    final protected function getDatumAanmaakBestand()
    {
        return $this->datumAanmaakBestand;
    }

    /**
     * Getter voor de tijd van het aanmaakbestand.
     * @return string
     */
    final protected function getTijdAanmaakBestand()
    {
        return $this->tijdAanmaakBestand;
    }

    /**
     * Getter voor de berichtversie.
     * @return int
     */
    final protected function getBerichtVersie()
    {
        return $this->berichtVersie;
    }

    /**
     * Getter voor de softwareversie.
     * @return int
     */
    final protected function getSoftwareVersie()
    {
        return $this->softwareVersie;
    }

    /**
     * Getter voor de productversie.
     * @return int
     */
    final protected function getProductVersie()
    {
        return $this->productVersie;
    }

    /**
     * Getter voor de klantcode.
     * @return string
     */
    final protected function getKlantCode()
    {
        return $this->klantCode;
    }

    /**
     * Getter voor het voormelding-id.
     * @return int
     */
    final protected function getVoormeldingId()
    {
        return $this->voormeldingId;
    }

    /**
     * Getter voor de aanleverdatum van de zending(en).
     * @return string
     */
    final protected function getAanleverdatumZendingen()
    {
        return $this->aanleverdatumZendingen;
    }
}
