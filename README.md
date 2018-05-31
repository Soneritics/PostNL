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
The base for connecting to the PostNL API will be provided by this plugin.
It is advised not to use it in a production environment, as it's nog error-proof,
nor fully (automated) tested.

Create an issue if you need help, or need more services than the ones provided.

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
| Timeframe webservice                          |      ✓      |   2_1   |
| **Mail**                                                            |||
| Bulkmail webservice                           |      X      |   N/A   |

### Code example: Creating the API
Always start with creating the API object.
```php
$apiKey = '*YOUR API KEY*';

$endpoints = new Sandbox;
$customer = (new Customer)
    ->setCustomerCode('DEVC')
    ->setCustomerNumber('11223344')
    ->setAddress((new Address)
        ->setAddressType(AddressType::SENDER)
        ->setCompanyName('Soneritics')
        ->setStreet('De Rosmolen')
        ->setHouseNr('153')
        ->setZipcode('6932NC')
        ->setCity('Westervoort')
        ->setCountrycode('NL')
    );

$api = new API($apiKey, $customer, $endpoints);
```

### Code example: Fetching a barcode
```php
$barcodeService = $api->getBarcodeService();
$barcode = $barcodeService->GenerateBarcode();
echo "generated barcode: {$barcode}\r\n";
```

### Code example: Generate a label and confirm shipment (basic)
```php
$message = new Message(1, PrinterType::JPG);
$dimension = (new Dimension)->setWeight(1000);
$receivingAddress = (new Address)
    ->setAddressType(AddressType::RECEIVER)
    ->setCompanyName('Jordi Jolink')
    ->setStreet('De Rosmolen')
    ->setHouseNr('153')
    ->setZipcode('6932NC')
    ->setCity('Westervoort')
    ->setCountrycode('NL');

$shipments = (new Shipments)->addShipment(
    (new Shipment)
        ->setAddresses((new Addresses)->addAddress($receivingAddress))
        ->setBarcode($barcode)
        ->setDimension($dimension)
);

$result = $api->getLabellingService()->GenerateLabel($shipments, $message);
$labelContentsBase64 = $result['ResponseShipments'][0]['Labels'][0]['Content'];
```

### Code example: Get time frames, get a label and confirm the shipment
```php
$receivingAddress = (new Address)
    ->setAddressType(AddressType::RECEIVER)
    ->setCompanyName('Jordi Jolink')
    ->setStreet('De Rosmolen')
    ->setHouseNr('153')
    ->setZipcode('6932NC')
    ->setCity('Westervoort')
    ->setCountrycode('NL');

$deliveryOptions = [
    DeliveryOptions::DAYTIME,
    DeliveryOptions::EVENING,
    DeliveryOptions::AFTERNOON,
    DeliveryOptions::MORNING,
    DeliveryOptions::NOON
];

$result = $api->getTimeframeService()->calculateTimeframes($receivingAddress, $deliveryOptions);
echo "Timeframes:\r\n";
print_r($result);

# Confirm time frame
$barcodeService = $api->getBarcodeService();

echo "Confirming timeframe..\r\n";
if (!empty($result['Timeframes']['Timeframe'])) {
    $timeframe = array_pop($result['Timeframes']['Timeframe']);
    if ($timeframe !== null) {
        $deliveryTimestampStart = new DateTime($timeframe['Date'] . ' ' . $timeframe['Timeframes']['TimeframeTimeFrame']['From']);
        $deliveryTimestampEnd = new DateTime($timeframe['Date'] . ' ' . $timeframe['Timeframes']['TimeframeTimeFrame']['To']);

        $shipments = (new Shipments)->addShipment(
            (new Shipment)
                ->setAddresses((new Addresses)->addAddress($receivingAddress))
                ->setBarcode($barcodeService->GenerateBarcode())
                ->setDimension($dimension)
                ->setDeliveryDate($deliveryTimestampStart)
        );

        $result = $api->getLabellingService()->GenerateLabel($shipments, $message);
        print_r($result);
    }
}
echo "Timeframe confirmed.\r\n";
```

---

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

