<?php
/*
 * The MIT License
 *
 * Copyright 2020 Soneritics.
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
 */
class Pakket extends MappingGenerator
{
    /**
     * Mapping array waarin wordt aangegeven welke getter overeenkomt
     * met welke veldcode. Definieert tevens de volgorde.
     *
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
     * Zendingcode (3S code).
     *
     * @var string
     */
    protected $zendingcode;

    /**
     * Referentietekst (optioneel).
     *
     * @var string
     */
    protected $referentietekst;

    /**
     * Productcode. Gedefinieerd in de Productcode class.
     *
     * @var string
     */
    protected $productcode = Productcode::STANDAARD_VERZENDING;

    /**
     * Frankeeraanduiding. Vaste waarde.
     *
     * @var int
     */
    protected $frankeeraanduiding = 15;

    /**
     * Emailadres (optioneel).
     *
     * @var string
     */
    protected $emailadres;

    /**
     * Mobiele telefoonnummer (optioneel).
     *
     * @var string
     */
    protected $mobiel;

    /**
     * Telefoonnummer (optioneel).
     *
     * @var string
     */
    protected $telefoon;

    /**
     * Volgnummer van de collo, indien er meer colli in de zending zijn.
     *
     * @var int
     */
    protected $volgnummerCollo = 1;

    /**
     * Aantal colli waaruit de zending bestaat.
     *
     * @var int
     */
    protected $aantalColli = 1;

    /**
     * Remboursbedrag in eurocenten (optioneel).
     *
     * @var int
     */
    protected $remboursbedrag = 0;

    /**
     * Verzekerd bedrag in centen (optioneel).
     *
     * @var int
     */
    protected $verzekerdBedrag = 0;

    /**
     * Bedrijfsnaam van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeBedrijfsnaam;

    /**
     * Afdeling van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeAfdeling;

    /**
     * Achternaam van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeAchternaam;

    /**
     * Voornaam van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeVoornaam;

    /**
     * Gebouwnaam van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeGebouwnaam;

    /**
     * Verdieping van de geadresseerde.
     *
     * @var type
     */
    protected $geadresseerdeVerdieping;

    /**
     * Straatnaam van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeStraatnaam;

    /**
     * Huisnummer óf postbusnummer van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeHuisnummerPostbusnummer;

    /**
     * Toevoeging op het huisnummer (optioneel).
     *
     * @var string
     */
    protected $geadresseerdeHuisnummerToevoeging;

    /**
     * Postcode van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdePostcode;

    /**
     * Woonplaats van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeWoonplaats;

    /**
     * Wijk van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeWijk;

    /**
     * Regio van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeRegio;

    /**
     * Deurcode van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeDeurcode;

    /**
     * Opmerking van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeOpmerking;

    /**
     * Landcode van de geadresseerde.
     *
     * @var string
     */
    protected $geadresseerdeLandcode = 'NL';

    /**
     * Inhoud van het pakket (optioneel).
     *
     * @var string
     */
    protected $inhoud;

    /**
     * Gewicht van het pakket in grammen.
     *
     * @var int
     */
    protected $gewicht;

    /**
     * Valideer de ingevoerde gegevens voordat de mapping wordt toegepast om output te genereren.
     *
     * @throws \Exception
     */
    protected function validate()
    {
        // Check verplichte velden
        $mandatory = ['zendingcode'];
        foreach ($mandatory as $property) {
            if (empty($this->$property)) {
                throw new \Exception(
                    'Verplichte property niet gevuld: ' . $property
                );
            }
        }

        // Specifieke business rules
        if (empty($this->geadresseerdeBedrijfsnaam) && empty($this->geadresseerdeAchternaam)) {
            throw new \Exception(
                'Er moet een bedrijfsnaam of achternaam opgegeven worden.'
            );
        }
    }

    /**
     * Getter voor het open record. Is niet instelbaar maar altijd een vaste waarde.
     *
     * @return string
     */
    protected function getOpenRecord()
    {
        return 'V';
    }

    /**
     * Getter voor de zendingcode.
     *
     * @return string
     */
    protected function getZendingcode()
    {
        return $this->zendingcode;
    }

    /**
     * Getter voor de referentietekst.
     *
     * @return string
     */
    protected function getReferentietekst()
    {
        return $this->referentietekst;
    }

    /**
     * Getter voor de productcode.
     *
     * @return string
     */
    protected function getProductcode()
    {
        return $this->productcode;
    }

    /**
     * Getter voor de frankeeraanduiding.
     *
     * @return int
     */
    protected function getFrankeeraanduiding()
    {
        return $this->frankeeraanduiding;
    }

    /**
     * Getter voor het e-mailadres.
     *
     * @return string
     */
    protected function getEmailadres()
    {
        return $this->emailadres;
    }

    /**
     * Getter voor het mobiele nummer.
     *
     * @return string
     */
    protected function getMobiel()
    {
        return $this->mobiel;
    }

    /**
     * Getter voor het telefoonnummer.
     *
     * @return string
     */
    protected function getTelefoon()
    {
        return $this->telefoon;
    }

    /**
     * Getter voor het volgnummer van de collo.
     *
     * @return int
     */
    protected function getVolgnummerCollo()
    {
        return $this->volgnummerCollo;
    }

    /**
     * Getter voor het aantal colli.
     *
     * @return int
     */
    protected function getAantalColli()
    {
        return $this->aantalColli;
    }

    /**
     * Getter voor het remboursbedrag.
     *
     * @return int
     */
    public function getRemboursbedrag()
    {
        return $this->remboursbedrag;
    }

    /**
     * Getter voor het verzekerde bedrag.
     *
     * @return int
     */
    protected function getVerzekerdBedrag()
    {
        return $this->verzekerdBedrag;
    }

    /**
     * Getter voor de bedrijfsnaam van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeBedrijfsnaam()
    {
        return $this->geadresseerdeBedrijfsnaam;
    }

    /**
     * Getter voor de afdeling van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeAfdeling()
    {
        return $this->geadresseerdeAfdeling;
    }

    /**
     * Getter voor de achternaam van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeAchternaam()
    {
        return $this->geadresseerdeAchternaam;
    }

    /**
     * Getter voor de voornaam van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeVoornaam()
    {
        return $this->geadresseerdeVoornaam;
    }

    /**
     * Getter voor de gebouwnaam van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeGebouwnaam()
    {
        return $this->geadresseerdeGebouwnaam;
    }

    /**
     * Getter voor de verdieping van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeVerdieping()
    {
        return $this->geadresseerdeVerdieping;
    }

    /**
     * Getter voor de straatnaam van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeStraatnaam()
    {
        return $this->geadresseerdeStraatnaam;
    }

    /**
     * Getter voor het huisnummer/postbusnummer van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeHuisnummerPostbusnummer()
    {
        return $this->geadresseerdeHuisnummerPostbusnummer;
    }

    /**
     * Getter voor de huisnummer toevoeging van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeHuisnummerToevoeging()
    {
        return $this->geadresseerdeHuisnummerToevoeging;
    }

    /**
     * Getter voor de postcode van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdePostcode()
    {
        return $this->geadresseerdePostcode;
    }

    /**
     * Getter voor de woonplaats van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeWoonplaats()
    {
        return $this->geadresseerdeWoonplaats;
    }

    /**
     * Getter voor de wijk van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeWijk()
    {
        return $this->geadresseerdeWijk;
    }

    /**
     * Getter voor de regio van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeRegio()
    {
        return $this->geadresseerdeRegio;
    }

    /**
     * Getter voor de deurcode van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeDeurcode()
    {
        return $this->geadresseerdeDeurcode;
    }

    /**
     * Getter voor de opmerking van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeOpmerking()
    {
        return $this->geadresseerdeOpmerking;
    }

    /**
     * Getter voor de landcode van de geadresseerde.
     *
     * @return string
     */
    protected function getGeadresseerdeLandcode()
    {
        return $this->geadresseerdeLandcode;
    }

    /**
     * Getter voor de inhoud van het pakket.
     *
     * @return string
     */
    protected function getInhoud()
    {
        return $this->inhoud;
    }

    /**
     * Getter voor het gewicht van het pakket (in grammen).
     *
     * @return int
     */
    protected function getGewicht()
    {
        return $this->gewicht;
    }

    /**
     * Zendingcode (3S) instellen.
     *
     * @param  string $zendingcode
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setZendingcode($zendingcode)
    {
        $zendingCodeFormatted = strtoupper($zendingcode);
        if (substr($zendingCodeFormatted, 0, 2) !== '3S') {
            throw new \Exception('Ongeldige zendingcode. Een zendingcode begint met 3S.');
        }

        if (strlen($zendingCodeFormatted) !== 15) {
            throw new \Exception('Ongeldige zendingcode. Een zendingcode bevat 15 tekens.');
        }

        $this->zendingcode = $zendingCodeFormatted;
        return $this;
    }

    /**
     * Referentietekst instellen.
     *
     * @param  string $referentietekst
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setReferentietekst($referentietekst)
    {
        if (strlen($referentietekst) > 35) {
            throw new \Exception('Referentietekst mag niet langer zijn dan 35 tekens.');
        }

        $this->referentietekst = $referentietekst;
        return $this;
    }

    /**
     * Productcode. Komt uit de Productcode class.
     *
     * @param  string $productcode Constante uit de PostNL\Data\Productcode class
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setProductcode($productcode)
    {
        if (strlen($productcode) !== 5) {
            throw new \Exception('Ongeldige productcode. Gebruik de constantes uit de Productcode class hiervoor.');
        }

        $this->productcode = $productcode;
        return $this;
    }

    /**
     * Frankeeraanduiding.
     *
     * @param  int $frankeeraanduiding
     * @return \PostNL\Data\Pakket
     */
    public function setFrankeeraanduiding($frankeeraanduiding)
    {
        $this->frankeeraanduiding = (int)$frankeeraanduiding;
        return $this;
    }

    /**
     * E-mailadres.
     *
     * @param  string $emailadres
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setEmailadres($emailadres)
    {
        if (strlen($emailadres) > 50) {
            throw new \Exception('E-mailadres mag maximaal 50 karakters bevatten.');
        }

        $this->emailadres = $emailadres;
        return $this;
    }

    /**
     * Mobiele telefoonnummer.
     *
     * @param  string $mobiel
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setMobiel($mobiel)
    {
        if (strlen($mobiel) > 12) {
            throw new \Exception('Mobiel nummer mag maximaal 12 karakters bevatten.');
        }

        $this->mobiel = $mobiel;
        return $this;
    }

    /**
     * Telefoonnummer.
     *
     * @param  string $telefoon
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setTelefoon($telefoon)
    {
        if (strlen($telefoon) > 12) {
            throw new \Exception('Telefoonnummer mag maximaal 12 karakters bevatten.');
        }

        $this->telefoon = $telefoon;
        return $this;
    }

    /**
     * Volgnummer van dit collo.
     *
     * @param  int $volgnummerCollo
     * @return \PostNL\Data\Pakket
     */
    public function setVolgnummerCollo($volgnummerCollo)
    {
        $this->volgnummerCollo = (int)$volgnummerCollo;
        return $this;
    }

    /**
     * Aantal colli in zending.
     *
     * @param  int $aantalColli
     * @return \PostNL\Data\Pakket
     */
    public function setAantalColli($aantalColli)
    {
        $this->aantalColli = (int)$aantalColli;
        return $this;
    }

    /**
     * Remboursbedrag in eurocenten.
     *
     * @param  int $remboursbedrag Remboursbedrag in eurocenten.
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setRemboursbedrag($remboursbedrag)
    {
        if ($remboursbedrag != (int)$remboursbedrag) {
            throw new \Exception('Remboursbedrag is een bedrag in centen zonder decimalen.');
        }

        $this->remboursbedrag = (int)$remboursbedrag;
        return $this;
    }

    /**
     * Verzekerd bedrag in eurocenten.
     *
     * @param  int $verzekerdBedrag Verzekerd bedrag in eurocenten.
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setVerzekerdBedrag($verzekerdBedrag)
    {
        if ($verzekerdBedrag != (int)$verzekerdBedrag) {
            throw new \Exception('Verzekerd bedrag is een bedrag in centen zonder decimalen.');
        }

        $this->verzekerdBedrag = (int)$verzekerdBedrag;
        return $this;
    }

    /**
     * Bedrijfsnaam van de geadresseerde.
     *
     * @param  string $geadresseerdeBedrijfsnaam
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeBedrijfsnaam($geadresseerdeBedrijfsnaam)
    {
        if (strlen($geadresseerdeBedrijfsnaam) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeBedrijfsnaam = $geadresseerdeBedrijfsnaam;
        return $this;
    }

    /**
     * Afdeling van de geadresseerde.
     *
     * @param  string $geadresseerdeAfdeling
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeAfdeling($geadresseerdeAfdeling)
    {
        if (strlen($geadresseerdeAfdeling) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeAfdeling = $geadresseerdeAfdeling;
        return $this;
    }

    /**
     * Achternaam van de geadresseerde.
     *
     * @param  string $geadresseerdeAchternaam
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeAchternaam($geadresseerdeAchternaam)
    {
        if (strlen($geadresseerdeAchternaam) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeAchternaam = $geadresseerdeAchternaam;
        return $this;
    }

    /**
     * Voornaam van de geadresseerde.
     *
     * @param  string $geadresseerdeVoornaam
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeVoornaam($geadresseerdeVoornaam)
    {
        if (strlen($geadresseerdeVoornaam) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeVoornaam = $geadresseerdeVoornaam;
        return $this;
    }

    /**
     * Gebouwnaam van de geadresseerde.
     *
     * @param  string $geadresseerdeGebouwnaam
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeGebouwnaam($geadresseerdeGebouwnaam)
    {
        if (strlen($geadresseerdeGebouwnaam) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeGebouwnaam = $geadresseerdeGebouwnaam;
        return $this;
    }

    /**
     * Verdieping van de geadresseerde.
     *
     * @param  string $geadresseerdeVerdieping
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeVerdieping($geadresseerdeVerdieping)
    {
        if (strlen($geadresseerdeVerdieping) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeVerdieping = $geadresseerdeVerdieping;
        return $this;
    }

    /**
     * Straatnaam van de geadresseerde.
     *
     * @param  string $geadresseerdeStraatnaam
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeStraatnaam($geadresseerdeStraatnaam)
    {
        if (strlen($geadresseerdeStraatnaam) > 95) {
            throw new \Exception('Veld mag niet meer dan 95 karakters bevatten.');
        }

        $this->geadresseerdeStraatnaam = $geadresseerdeStraatnaam;
        return $this;
    }

    /**
     * Huisnummer/postbusnummer van de geadresseerde.
     *
     * @param  int $geadresseerdeHuisnummerPostbusnummer
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeHuisnummerPostbusnummer($geadresseerdeHuisnummerPostbusnummer)
    {
        if (strlen($geadresseerdeHuisnummerPostbusnummer) > 5) {
            throw new \Exception('Veld mag niet meer dan 5 karakters bevatten.');
        }

        if ($geadresseerdeHuisnummerPostbusnummer != (string)(int)$geadresseerdeHuisnummerPostbusnummer) {
            throw new \Exception('Het veld mag uitsluitend cijfers bevatten.');
        }

        $this->geadresseerdeHuisnummerPostbusnummer = $geadresseerdeHuisnummerPostbusnummer;
        return $this;
    }

    /**
     * Huisnummer toevoeging van de geadresseerde.
     *
     * @param  string $geadresseerdeHuisnummerToevoeging
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeHuisnummerToevoeging($geadresseerdeHuisnummerToevoeging)
    {
        if (strlen($geadresseerdeHuisnummerToevoeging) > 6) {
            throw new \Exception('Veld mag niet meer dan 6 karakters bevatten.');
        }

        $this->geadresseerdeHuisnummerToevoeging = $geadresseerdeHuisnummerToevoeging;
        return $this;
    }

    /**
     * Postcode van de geadresseerde.
     *
     * @param  string $geadresseerdePostcode
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdePostcode($geadresseerdePostcode)
    {
        $postcode = str_replace(' ', '', $geadresseerdePostcode);

        if (strlen($postcode) !== 6) {
            throw new \Exception('De postcode moet exact 6 karakters bevatten.');
        }

        $this->geadresseerdePostcode = $postcode;
        return $this;
    }

    /**
     * Woonplaats van de geadresseerde.
     *
     * @param  string $geadresseerdeWoonplaats
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeWoonplaats($geadresseerdeWoonplaats)
    {
        if (strlen($geadresseerdeWoonplaats) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeWoonplaats = $geadresseerdeWoonplaats;
        return $this;
    }

    /**
     * Wijk van de geadresseerde.
     *
     * @param  string $geadresseerdeWijk
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeWijk($geadresseerdeWijk)
    {
        if (strlen($geadresseerdeWijk) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeWijk = $geadresseerdeWijk;
        return $this;
    }

    /**
     * Regio van de geadresseerde.
     *
     * @param  string $geadresseerdeRegio
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeRegio($geadresseerdeRegio)
    {
        if (strlen($geadresseerdeRegio) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeRegio = $geadresseerdeRegio;
        return $this;
    }

    /**
     * Deurcode van de geadresseerde.
     *
     * @param  string $geadresseerdeDeurcode
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeDeurcode($geadresseerdeDeurcode)
    {
        if (strlen($geadresseerdeDeurcode) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeDeurcode = $geadresseerdeDeurcode;
        return $this;
    }

    /**
     * Opmerking van de geadresseerde.
     *
     * @param  string $geadresseerdeOpmerking
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeOpmerking($geadresseerdeOpmerking)
    {
        if (strlen($geadresseerdeOpmerking) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->geadresseerdeOpmerking = $geadresseerdeOpmerking;
        return $this;
    }

    /**
     * Landcode van de geadresseerde.
     *
     * @param  string $geadresseerdeLandcode
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGeadresseerdeLandcode($geadresseerdeLandcode)
    {
        if (strlen($geadresseerdeLandcode) !== 2) {
            throw new \Exception('Veld moet exact 2 karakters bevatten.');
        }

        $this->geadresseerdeLandcode = strtoupper($geadresseerdeLandcode);
        return $this;
    }

    /**
     * Inhoud van het pakket.
     *
     * @param  string $inhoud
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setInhoud($inhoud)
    {
        if (strlen($inhoud) > 35) {
            throw new \Exception('Veld mag niet meer dan 35 karakters bevatten.');
        }

        $this->inhoud = $inhoud;
        return $this;
    }

    /**
     * Gewicht van het pakket in grammen.
     *
     * @param  int $gewicht Gewicht in grammen.
     * @return \PostNL\Data\Pakket
     * @throws \Exception
     */
    public function setGewicht($gewicht)
    {
        if ($gewicht != (int)$gewicht) {
            throw new \Exception('Het gewicht is in grammen, zonder decimalen.');
        }

        if (strlen($gewicht) > 6) {
            throw new \Exception('Veld mag niet meer dan 6 karakters bevatten.');
        }

        $this->gewicht = (int)$gewicht;
        return $this;
    }
}
