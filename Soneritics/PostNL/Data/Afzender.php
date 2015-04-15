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
 * Afzender object.
 *
 * @author Jordi Jolink <mail@jordijolink.nl>
 * @since  14-4-2015
 */
class Afzender extends MappingGenerator
{
    /**
     * Mapping array waarin wordt aangegeven welke getter overeenkomt
     * met welke veldcode. Definieert tevens de volgorde.
     * @var array
     */
    protected $mapping = [
        'A130' => 'Bedrijfsnaam',
        'A131' => 'Afdeling',
        'A132' => 'Achternaam',
        'A133' => 'Voornaam',
        'A137' => 'Gebouwnaam',
        'A138' => 'Verdieping',
        'A139' => 'StraatnaamPostbus',
        'A140' => 'HuisnummerPostbusnummer',
        'A141' => 'HuisnummerToevoeging',
        'A150' => 'Postcode',
        'A151' => 'Woonplaats',
        'A152' => 'Wijk',
        'A153' => 'Regio',
        'A154' => 'Deurcode',
        'A155' => 'Opmerking',
        'A220' => 'Landcode'
    ];

    /**
     * Afzender bedrijfsnaam.
     * @var string
     */
    protected $bedrijfsnaam;

    /**
     * Afzender afdeling.
     * @var string
     */
    protected $afdeling;

    /**
     * Afzender achternaam.
     * @var string
     */
    protected $achternaam;

    /**
     * Afzender voornaam.
     * @var string
     */
    protected $voornaam;

    /**
     * Afzender gebouwnaam.
     * @var string
     */
    protected $gebouwnaam;

    /**
     * Afzender verdieping.
     * @var string
     */
    protected $verdieping;

    /**
     * Afzender straatnaam of postbus.
     * @var string
     */
    protected $straatnaamPostbus;

    /**
     * Afzender huisnummer of postbusnummer.
     * @var string
     */
    protected $huisnummerPostbusnummer;

    /**
     * Afzender huisnummer toevoeging.
     * @var string
     */
    protected $huisnummerToevoeging;

    /**
     * Afzender postcode.
     * @var string
     */
    protected $postcode;

    /**
     * Afzender woonplaats.
     * @var string
     */
    protected $woonplaats;

    /**
     * Afzender wijk.
     * @var string
     */
    protected $wijk;

    /**
     * Afzender regio.
     * @var string
     */
    protected $regio;

    /**
     * Afzender deurcode.
     * @var string
     */
    protected $deurcode;

    /**
     * Afzender opmerking.
     * @var string
     */
    protected $opmerking;

    /**
     * Afzender landcode.
     * @var string
     */
    protected $landcode;

    /**
     * Valideer de ingevoerde gegevens voordat de mapping wordt toegepast om
     * output te genereren.
     * @throws \Exception
     */
    protected function validate()
    {
        // Check verplichte velden
        $mandatory = ['huisnummerPostbusnummer', 'postcode', 'landcode'];
        foreach ($mandatory as $property) {
            if (empty($property)) {
                throw new \Exception(
                    'Verplichte property niet gevuld: ' . $property
                );
            }
        }

        // Specifieke business rules
        if (empty($this->bedrijfsnaam) && empty($this->achternaam)) {
            throw new \Exception(
                'Er moet een bedrijfsnaam of achternaam opgegeven worden.'
            );
        }
    }

    /**
     * Getter voor de afzender bedrijfsnaam.
     * @return string
     */
    protected function getBedrijfsnaam()
    {
        return $this->bedrijfsnaam;
    }

    /**
     * Getter voor de afzender afdeling.
     * @return string
     */
    protected function getAfdeling()
    {
        return $this->afdeling;
    }

    /**
     * Getter voor de afzender achternaam.
     * @return string
     */
    protected function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * Getter voor de afzender voornaam.
     * @return string
     */
    protected function getVoornaam()
    {
        return $this->voornaam;
    }

    /**
     * Getter voor de afzender gebouwnaam.
     * @return string
     */
    protected function getGebouwnaam()
    {
        return $this->gebouwnaam;
    }

    /**
     * Getter voor de afzender verdieping.
     * @return string
     */
    protected function getVerdieping()
    {
        return $this->verdieping;
    }

    /**
     * Getter voor de straatnaam/postbus.
     * @return string
     */
    protected function getStraatnaamPostbus()
    {
        return $this->straatnaamPostbus;
    }

    /**
     * Getter voor de afzender huisnummer/postbusnummer.
     * @return string
     */
    protected function getHuisnummerPostbusnummer()
    {
        return $this->huisnummerPostbusnummer;
    }

    /**
     * Getter voor de huisnummer toevoeging.
     * @return string
     */
    protected function getHuisnummerToevoeging()
    {
        return $this->huisnummerToevoeging;
    }

    /**
     * Getter voor de afzender postcode.
     * @return string
     */
    protected function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Getter voor de afzender woonplaats.
     * @return string
     */
    protected function getWoonplaats()
    {
        return $this->woonplaats;
    }

    /**
     * Getter voor de afzender wijk.
     * @return string
     */
    protected function getWijk()
    {
        return $this->wijk;
    }

    /**
     * Getter voor de afzender regio.
     * @return string
     */
    protected function getRegio()
    {
        return $this->regio;
    }

    /**
     * Getter voor de afzender deurcode.
     * @return string
     */
    protected function getDeurcode()
    {
        return $this->deurcode;
    }

    /**
     * Getter voor de afzender opmerkingen.
     * @return string
     */
    protected function getOpmerking()
    {
        return $this->opmerking;
    }

    /**
     * Getter voor de afzender landcode.
     * @return string
     */
    protected function getLandcode()
    {
        return $this->landcode;
    }

    /**
     * Stel de bedrijfsnaam van de afzender in.
     * @param string $bedrijfsnaam
     * @return \PostNL\Data\Afzender
     */
    public function setBedrijfsnaam($bedrijfsnaam)
    {
        if (strlen($bedrijfsnaam) > 35) {
            throw new \Exception('Bedrijfsnaam kan maximaal 35 tekens bevatten.');
        }

        $this->bedrijfsnaam = $bedrijfsnaam;
        return $this;
    }

    /**
     * Stel de afdeling van de afzender in.
     * @param string $afdeling
     * @return \PostNL\Data\Afzender
     */
    public function setAfdeling($afdeling)
    {
        if (strlen($afdeling) > 35) {
            throw new \Exception('Afdeling kan maximaal 35 tekens bevatten.');
        }

        $this->afdeling = $afdeling;
        return $this;
    }

    /**
     * Stel de achternaam van de afzender in.
     * @param string $achternaam
     * @return \PostNL\Data\Afzender
     */
    public function setAchternaam($achternaam)
    {
        if (strlen($achternaam) > 35) {
            throw new \Exception('Achternaam kan maximaal 35 tekens bevatten.');
        }

        $this->achternaam = $achternaam;
        return $this;
    }

    /**
     * Stel de voornaam van de afzender in.
     * @param string $voornaam
     * @return \PostNL\Data\Afzender
     */
    public function setVoornaam($voornaam)
    {
        if (strlen($voornaam) > 35) {
            throw new \Exception('Voornaam kan maximaal 35 tekens bevatten.');
        }

        $this->voornaam = $voornaam;
        return $this;
    }

    /**
     * Stel de gebouwnaam van de afzender in.
     * @param string $gebouwnaam
     * @return \PostNL\Data\Afzender
     */
    public function setGebouwnaam($gebouwnaam)
    {
        if (strlen($gebouwnaam) > 35) {
            throw new \Exception('Gebouwnaam kan maximaal 35 tekens bevatten.');
        }

        $this->gebouwnaam = $gebouwnaam;
        return $this;
    }

    /**
     * Stel de verdieping van de afzender in.
     * @param string $verdieping
     * @return \PostNL\Data\Afzender
     */
    public function setVerdieping($verdieping)
    {
        if (strlen($verdieping) > 35) {
            throw new \Exception('Verdieping kan maximaal 35 tekens bevatten.');
        }

        $this->verdieping = $verdieping;
        return $this;
    }

    /**
     * Stel de straatnaam of postbus in voor de afzender.
     * @param string $straatnaamPostbus
     * @return \PostNL\Data\Afzender
     */
    public function setStraatnaamPostbus($straatnaamPostbus)
    {
        if (strlen($straatnaamPostbus) > 95) {
            throw new \Exception(
                'Straatnaam/postbus kan maximaal 95 tekens bevatten.'
            );
        }

        $this->straatnaamPostbus = $straatnaamPostbus;
        return $this;
    }

    /**
     * Stel het huisnummer/postbusnummer in voor de afzender.
     * @param string $huisnummerPostbusnummer
     * @return \PostNL\Data\Afzender
     */
    public function setHuisnummerPostbusnummer($huisnummerPostbusnummer)
    {
        if (strlen($huisnummerPostbusnummer) > 5) {
            throw new \Exception(
                'Huisnummer/postbusnummer kan maximaal 5 tekens bevatten.'
            );
        }

        $this->huisnummerPostbusnummer = $huisnummerPostbusnummer;
        return $this;
    }

    /**
     * Stel de huisnummer-toevoeging in voor de afzender.
     * @param string $huisnummerToevoeging
     * @return \PostNL\Data\Afzender
     */
    public function setHuisnummerToevoeging($huisnummerToevoeging)
    {
        if (strlen($bedrijfsnaam) > 6) {
            throw new \Exception(
                'Huisnummer toevoeging kan maximaal 6 tekens bevatten.'
            );
        }

        $this->huisnummerToevoeging = $huisnummerToevoeging;
        return $this;
    }

    /**
     * Stel de afzender postcode in.
     * @param string $postcode
     * @return \PostNL\Data\Afzender
     */
    public function setPostcode($postcode)
    {
        if (strlen($postcode) > 6) {
            throw new \Exception('Postcode kan maximaal 6 tekens bevatten.');
        }

        $this->postcode = $postcode;
        return $this;
    }

    /**
     * Stel de afzender woonplaats in.
     * @param string $woonplaats
     * @return \PostNL\Data\Afzender
     */
    public function setWoonplaats($woonplaats)
    {
        if (strlen($woonplaats) > 35) {
            throw new \Exception('Woonplaats kan maximaal 35 tekens bevatten.');
        }

        $this->woonplaats = $woonplaats;
        return $this;
    }

    /**
     * Stel de afzender wijk in.
     * @param string $wijk
     * @return \PostNL\Data\Afzender
     */
    public function setWijk($wijk)
    {
        if (strlen($wijk) > 35) {
            throw new \Exception('Wijk kan maximaal 35 tekens bevatten.');
        }

        $this->wijk = $wijk;
        return $this;
    }

    /**
     * Stel de afzender regio in.
     * @param string $regio
     * @return \PostNL\Data\Afzender
     */
    public function setRegio($regio)
    {
        if (strlen($regio) > 35) {
            throw new \Exception('Regio kan maximaal 35 tekens bevatten.');
        }

        $this->regio = $regio;
        return $this;
    }

    /**
     * Stel de afzender deurcode in.
     * @param string $deurcode
     * @return \PostNL\Data\Afzender
     */
    public function setDeurcode($deurcode)
    {
        if (strlen($deurcode) > 35) {
            throw new \Exception('Deurcode kan maximaal 35 tekens bevatten.');
        }

        $this->deurcode = $deurcode;
        return $this;
    }

    /**
     * Stel de afzender opmerking in.
     * @param string $opmerking
     * @return \PostNL\Data\Afzender
     */
    public function setOpmerking($opmerking)
    {
        if (strlen($opmerking) > 35) {
            throw new \Exception('Opmerking kan maximaal 35 tekens bevatten.');
        }

        $this->opmerking = $opmerking;
        return $this;
    }

    /**
     * Stel de landcode van de afzender in.
     * @param string $landcode
     * @return \PostNL\Data\Afzender
     */
    public function setLandcode($landcode)
    {
        if (strlen($landcode) !== 2) {
            throw new \Exception('Landcode moet bestaan uit 2 tekens.');
        }

        $this->landcode = strtoupper($landcode);
        return $this;
    }
}
