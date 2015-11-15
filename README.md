# PostNL #

[![Build Status](https://api.travis-ci.org/Soneritics/PostNL.svg?branch=master)](https://travis-ci.org/Soneritics/PostNL)
[![Coverage Status](https://coveralls.io/repos/Soneritics/PostNL/badge.svg?branch=master)](https://coveralls.io/r/Soneritics/PostNL?branch=master)
![License](http://img.shields.io/badge/license-MIT-green.svg)

Auteur
* [@Soneritics](https://github.com/Soneritics) - Jordi Jolink

## Introductie ##
Middels deze componenten kan eenvoudig een voormeldbestand gegenereerd worden voor PostNL pakketten.

## Minimale requirements ##
 - PHP 5.5

## Installatie ##
Deze code kan het best uitgecheckt worden middels Composer. Hiervoor kan de package gebruikt worden: soneritics/postnl

## Codetaal: Nederlands ##
Voor de taal van de classes, variabelen en commentaar is gekozen voor Nederlands. Daarbij worden getters en setters als hybride aangeduid, bijvoorbeeld: setKlantnummer.
Hiervoor is gekozen aangezien PostNL uitsluitend binnen Nederland verzendt, en daardoor ook vooral door Nederlanders geïmplementeerd zal worden.
Daarnaast worden specifieke woorden gebruikt, waarvan de Engelse vertaling de werking erg onduidelijk zal maken.

## Voorbeeld ##
```php
$afzender = (new Afzender)
    ->setBedrijfsnaam('Bedrijfsnaam')
    ->setPostcode('1234AB')
    ->setHuisnummerPostbusnummer('1')
    ->setLandcode('NL');

$voormelding = (new Voormelding)
    ->setAfzender($afzender)
    ->setKlantCode($customerCode)
    ->setKlantNummer($customerNr)
    ->setVolgnummer($volgnummer)
    ->setAanleverLocatie($bls);

$pakket = (new Pakket)
    ->setGeadresseerdeBedrijfsnaam($company)
    ->setGeadresseerdeVoornaam($firstname)
    ->setGeadresseerdeAchternaam($lastname)
    ->setGeadresseerdePostcode($zipcode)
    ->setGeadresseerdeStraatnaam($streetname)
    ->setGeadresseerdeHuisnummerPostbusnummer($housenumber)
    ->setGeadresseerdeHuisnummerToevoeging($housenumberExtension)
    ->setGeadresseerdeWoonplaats($city)
    ->setGeadresseerdeLandcode($country)
    ->setEmailadres($email)
    ->setZendingcode($shipmentCode);
$voormelding->addPakket($pakket);

// Contents ophalen. Dit kan opgeslagen worden in een LST bestand.
$voormeldContents = $voormelding->genereerInhoud()
```

