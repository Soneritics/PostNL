# PostNL

[![Build Status](https://api.travis-ci.org/Soneritics/PostNL.svg?branch=master)](https://travis-ci.org/Soneritics/PostNL)
[![Coverage Status](https://coveralls.io/repos/Soneritics/PostNL/badge.svg?branch=master)](https://coveralls.io/r/Soneritics/PostNL?branch=master)
![License](http://img.shields.io/badge/license-MIT-green.svg)

Auteur
* [@Soneritics](https://github.com/Soneritics) - Jordi Jolink

## Introduction
This library offers a variety of functions for PostNL. Mainly, these are the two categories:
- PostNL API - https://developer.postnl.nl
- PostNL Voormeldbestand

## Minimum requirements
 - PHP 7.1

## Installation
Use Composer to install: soneritics/postnl

## PostNL API
___WIP!___

### Supported APIs
| Service                                       | Implemented | Version |
|-----------------------------------------------|:-----------:|:-------:|
| **Addresses**                                                     |||
| Adrescheck Nationaal                          |      X      |   N/A   |
| Adrescheck Basis Nationaal                    |      X      |   N/A   |
| Adrescheck Internationaal                     |      X      |   N/A   |
| Persoon op Adrescheck Basis                   |      X      |   N/A   |
| Geo Adrescheck Nationaal                      |      X      |   N/A   |
| **Creditworthiness & Business information**                       |||
| Bedrijfscheck Nationaal                       |      X      |   N/A   |
| Fraudepreventie Check Basis                   |      X      |   N/A   |
| IBANcheck Nationaal                           |      X      |   N/A   |
| Kredietcheck Consument Basis                  |      X      |   N/A   |
| Kredietcheck Consument Premium                |      X      |   N/A   |
| Kredietcheck Zakelijk                         |      X      |   N/A   |
| **Send & Track**                                                    |||
| Barcode webservice                            |      ✓      |   1_1   |
| Confirming webservice                         |      X      |   N/A   |
| Labelling webservice                          |      ✓      |   2_1   |
| Shippingstatus webservice                     |      X      |   N/A   |
| **Delivery options**                                                |||
| Deliverydate webservice                       |      X      |   N/A   |
| Location webservice                           |      X      |   N/A   |
| Timeframe webservice                          |      X      |   N/A   |
| **Mail**                                                            |||
| Bulkmail webservice                           |      X      |   N/A   |


## PostNL Vooraanmelding
### Codetaal: Nederlands
Voor de taal van de classes, variabelen en commentaar is gekozen voor Nederlands. Daarbij worden getters en setters als hybride aangeduid, bijvoorbeeld: setKlantnummer.
Hiervoor is gekozen aangezien PostNL uitsluitend binnen Nederland verzendt, en daardoor ook vooral door Nederlanders geïmplementeerd zal worden.
Daarnaast worden specifieke woorden gebruikt, waarvan de Engelse vertaling de werking erg onduidelijk zal maken.

### Code example
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

