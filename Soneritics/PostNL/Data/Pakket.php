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
 * Pakket object.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  14-4-2015
 */
class Pakket extends MappingGenerator
{
    /**
     * Mapping array waarin wordt aangegeven welke getter overeenkomt
     * met welke veldcode. Definieert tevens de volgorde.
     * @var array
     */
    protected $mapping = [
        'V010' => 'OpenRecord',
        'V020' => 'Zendingcode',
        'V021' => 'Zendingcode',
        'V025' => 'Referentietekst',
        'V040' => 'Productcode',
        'V051' => 'Frankeeraanduiding',
        'V056' => 'Emailadres',
        'V057' => 'Mobiel',
        'V058' => 'Telefoon',
        'V060' => 'VolgnummerCollo',
        'V061' => 'AantalColli',
        'V070' => 'Remboursbedrag',
        'V090' => 'VerzekerdBedrag',
        'V170' => 'GeadresseerdeBedrijfsnaam',
        'V171' => 'GeadresseerdeAfdeling',
        'V172' => 'GeadresseerdeAchternaam',
        'V173' => 'GeadresseerdeVoornaam',
        'V177' => 'GeadresseerdeGebouwnaam',
        'V178' => 'GeadresseerdeVerdieping',
        'V179' => 'GeadresseerdeStraatnaam',
        'V180' => 'GeadresseerdeHuisnummerPostbusnummer',
        'V181' => 'GeadresseerdeHuisnummerToevoeging',
        'V190' => 'GeadresseerdePostcode',
        'V191' => 'GeadresseerdeWoonplaats',
        'V192' => 'GeadresseerdeWijk',
        'V193' => 'GeadresseerdeRegio',
        'V194' => 'GeadresseerdeDeurcode',
        'V195' => 'GeadresseerdeOpmerking',
        'V200' => 'GeadresseerdeLandcode',
        'V440' => 'Inhoud',
        'V450' => 'Gewicht',
        'V999' => 'V999'
    ];

    /**
     *
     * @var type
     */
    protected $zendingcode;

    /**
     *
     * @var type
     */
    protected $referentietekst;

    /**
     *
     * @var type
     */
    protected $productcode;

    /**
     *
     * @var type
     */
    protected $frankeeraanduiding = 15;

    /**
     *
     * @var type
     */
    protected $emailadres;

    /**
     *
     * @var type
     */
    protected $mobiel;

    /**
     *
     * @var type
     */
    protected $telefoon;

    /**
     *
     * @var type
     */
    protected $volgnummerCollo = 1;

    /**
     *
     * @var type
     */
    protected $aantalColli = 1;

    /**
     *
     * @var type
     */
    protected $remboursbedrag = 0;

    /**
     *
     * @var type
     */
    protected $verzekerdBedrag = 0;

    /**
     *
     * @var type
     */
    protected $geadresseerdeBedrijfsnaam;

    /**
     *
     * @var type
     */
    protected $geadresseerdeAfdeling;

    /**
     *
     * @var type
     */
    protected $geadresseerdeAchternaam;

    /**
     *
     * @var type
     */
    protected $geadresseerdeVoornaam;

    /**
     *
     * @var type
     */
    protected $geadresseerdeGebouwnaam;

    /**
     *
     * @var type
     */
    protected $geadresseerdeVerdieping;

    /**
     *
     * @var type
     */
    protected $geadresseerdeStraatnaam;

    /**
     *
     * @var type
     */
    protected $geadresseerdeHuisnummerPostbusnummer;

    /**
     *
     * @var type
     */
    protected $geadresseerdeHuisnummerToevoeging;

    /**
     *
     * @var type
     */
    protected $geadresseerdePostcode;

    /**
     *
     * @var type
     */
    protected $geadresseerdeWoonplaats;

    /**
     *
     * @var type
     */
    protected $geadresseerdeWijk;

    /**
     *
     * @var type
     */
    protected $geadresseerdeRegio;

    /**
     *
     * @var type
     */
    protected $geadresseerdeDeurcode;

    /**
     *
     * @var type
     */
    protected $geadresseerdeOpmerking;

    /**
     *
     * @var type
     */
    protected $geadresseerdeLandcode;

    /**
     *
     * @var type
     */
    protected $inhoud;

    /**
     *
     * @var type
     */
    protected $gewicht;

    /**
     * Valideer de ingevoerde gegevens voordat de mapping wordt toegepast om output te genereren.
     * @throws \Exception
     */
    protected function validate()
    {
        
    }

    /**
     * Getter voor het open record. Is niet instelbaar maar altijd een vaste waarde.
     * @return string
     */
    protected function getOpenRecord()
    {
        return 'V';
    }

    /**
     *
     * @return type
     */
    protected function getZendingcode()
    {
        return $this->zendingcode;
    }

    /**
     *
     * @return type
     */
    protected function getReferentietekst()
    {
        return $this->referentietekst;
    }

    /**
     *
     * @return type
     */
    protected function getProductcode()
    {
        return $this->productcode;
    }

    /**
     *
     * @return type
     */
    protected function getFrankeeraanduiding()
    {
        return $this->frankeeraanduiding;
    }

    /**
     *
     * @return type
     */
    protected function getEmailadres()
    {
        return $this->emailadres;
    }

    /**
     *
     * @return type
     */
    protected function getMobiel()
    {
        return $this->mobiel;
    }

    /**
     *
     * @return type
     */
    protected function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     *
     * @return type
     */
    protected function getVolgnummerCollo()
    {
        return $this->volgnummerCollo;
    }

    /**
     *
     * @return type
     */
    protected function getAantalColli()
    {
        return $this->aantalColli;
    }

    /**
     *
     * @return type
     */
    public function getRemboursbedrag()
    {
        return $this->remboursbedrag;
    }

    /**
     *
     * @return type
     */
    protected function getVerzekerdBedrag()
    {
        return $this->verzekerdBedrag;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeBedrijfsnaam()
    {
        return $this->geadresseerdeBedrijfsnaam;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeAfdeling()
    {
        return $this->geadresseerdeAfdeling;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeAchternaam()
    {
        return $this->geadresseerdeAchternaam;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeVoornaam()
    {
        return $this->geadresseerdeVoornaam;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeGebouwnaam()
    {
        return $this->geadresseerdeGebouwnaam;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeVerdieping()
    {
        return $this->geadresseerdeVerdieping;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeStraatnaam()
    {
        return $this->geadresseerdeStraatnaam;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeHuisnummerPostbusnummer()
    {
        return $this->geadresseerdeHuisnummerPostbusnummer;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeHuisnummerToevoeging()
    {
        return $this->geadresseerdeHuisnummerToevoeging;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdePostcode()
    {
        return $this->geadresseerdePostcode;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeWoonplaats()
    {
        return $this->geadresseerdeWoonplaats;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeWijk()
    {
        return $this->geadresseerdeWijk;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeRegio()
    {
        return $this->geadresseerdeRegio;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeDeurcode()
    {
        return $this->geadresseerdeDeurcode;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeOpmerking()
    {
        return $this->geadresseerdeOpmerking;
    }

    /**
     *
     * @return type
     */
    protected function getGeadresseerdeLandcode()
    {
        return $this->geadresseerdeLandcode;
    }

    /**
     *
     * @return type
     */
    protected function getInhoud()
    {
        return $this->inhoud;
    }

    /**
     *
     * @return type
     */
    protected function getGewicht()
    {
        return $this->gewicht;
    }

    public function setZendingcode($zendingcode)
    {
        $this->zendingcode = $zendingcode;
        return $this;
    }

    public function setReferentietekst($referentietekst)
    {
        $this->referentietekst = $referentietekst;
        return $this;
    }

    public function setProductcode($productcode)
    {
        $this->productcode = $productcode;
        return $this;
    }

    public function setFrankeeraanduiding($frankeeraanduiding)
    {
        $this->frankeeraanduiding = $frankeeraanduiding;
        return $this;
    }

    public function setEmailadres($emailadres)
    {
        $this->emailadres = $emailadres;
        return $this;
    }

    public function setMobiel($mobiel)
    {
        $this->mobiel = $mobiel;
        return $this;
    }

    public function setTelefoon($telefoon)
    {
        $this->telefoon = $telefoon;
        return $this;
    }

    public function setVolgnummerCollo($volgnummerCollo)
    {
        $this->volgnummerCollo = $volgnummerCollo;
        return $this;
    }

    public function setAantalColli($aantalColli)
    {
        $this->aantalColli = $aantalColli;
        return $this;
    }

    public function setRemboursbedrag($remboursbedrag)
    {
        $this->remboursbedrag = $remboursbedrag;
        return $this;
    }

    public function setVerzekerdBedrag($verzekerdBedrag)
    {
        $this->verzekerdBedrag = $verzekerdBedrag;
        return $this;
    }

    public function setGeadresseerdeBedrijfsnaam($geadresseerdeBedrijfsnaam)
    {
        $this->geadresseerdeBedrijfsnaam = $geadresseerdeBedrijfsnaam;
        return $this;
    }

    public function setGeadresseerdeAfdeling($geadresseerdeAfdeling)
    {
        $this->geadresseerdeAfdeling = $geadresseerdeAfdeling;
        return $this;
    }

    public function setGeadresseerdeAchternaam($geadresseerdeAchternaam)
    {
        $this->geadresseerdeAchternaam = $geadresseerdeAchternaam;
        return $this;
    }

    public function setGeadresseerdeVoornaam($geadresseerdeVoornaam)
    {
        $this->geadresseerdeVoornaam = $geadresseerdeVoornaam;
        return $this;
    }

    public function setGeadresseerdeGebouwnaam($geadresseerdeGebouwnaam)
    {
        $this->geadresseerdeGebouwnaam = $geadresseerdeGebouwnaam;
        return $this;
    }

    public function setGeadresseerdeVerdieping($geadresseerdeVerdieping)
    {
        $this->geadresseerdeVerdieping = $geadresseerdeVerdieping;
        return $this;
    }

    public function setGeadresseerdeStraatnaam($geadresseerdeStraatnaam)
    {
        $this->geadresseerdeStraatnaam = $geadresseerdeStraatnaam;
        return $this;
    }

    public function setGeadresseerdeHuisnummerPostbusnummer($geadresseerdeHuisnummerPostbusnummer)
    {
        $this->geadresseerdeHuisnummerPostbusnummer = $geadresseerdeHuisnummerPostbusnummer;
        return $this;
    }

    public function setGeadresseerdeHuisnummerToevoeging($geadresseerdeHuisnummerToevoeging)
    {
        $this->geadresseerdeHuisnummerToevoeging = $geadresseerdeHuisnummerToevoeging;
        return $this;
    }

    public function setGeadresseerdePostcode($geadresseerdePostcode)
    {
        $this->geadresseerdePostcode = $geadresseerdePostcode;
        return $this;
    }

    public function setGeadresseerdeWoonplaats($geadresseerdeWoonplaats)
    {
        $this->geadresseerdeWoonplaats = $geadresseerdeWoonplaats;
        return $this;
    }

    public function setGeadresseerdeWijk($geadresseerdeWijk)
    {
        $this->geadresseerdeWijk = $geadresseerdeWijk;
        return $this;
    }

    public function setGeadresseerdeRegio($geadresseerdeRegio)
    {
        $this->geadresseerdeRegio = $geadresseerdeRegio;
        return $this;
    }

    public function setGeadresseerdeDeurcode($geadresseerdeDeurcode)
    {
        $this->geadresseerdeDeurcode = $geadresseerdeDeurcode;
        return $this;
    }

    public function setGeadresseerdeOpmerking($geadresseerdeOpmerking)
    {
        $this->geadresseerdeOpmerking = $geadresseerdeOpmerking;
        return $this;
    }

    public function setGeadresseerdeLandcode($geadresseerdeLandcode)
    {
        $this->geadresseerdeLandcode = $geadresseerdeLandcode;
        return $this;
    }

    public function setInhoud($inhoud)
    {
        $this->inhoud = $inhoud;
        return $this;
    }

    public function setGewicht($gewicht)
    {
        $this->gewicht = $gewicht;
        return $this;
    }
}
