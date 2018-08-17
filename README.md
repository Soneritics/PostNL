# PostNL

[![Build Status](https://api.travis-ci.org/Soneritics/PostNL.svg?branch=master)](https://travis-ci.org/Soneritics/PostNL)
[![Coverage Status](https://coveralls.io/repos/Soneritics/PostNL/badge.svg?branch=master)](https://coveralls.io/r/Soneritics/PostNL?branch=master)
[![Latest Stable](https://img.shields.io/packagist/v/soneritics/postnl.svg?style=flat-square&label=stable)](https://packagist.org/packages/soneritics/postnl?branch=master)
![License](http://img.shields.io/badge/license-MIT-green.svg)

Author
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
nor (fully automated) tested. It does work, though, and is currently being tested
 in a production environment :-)

Create an issue if you need help, or need more services than the ones provided.

### Supported APIs
| Service                                       | Implemented | Version |
|-----------------------------------------------|:-----------:|:-------:|
| **Send & Track**                                                    |||
| Barcode webservice                            |      ✓      |   1_1   |
| Confirming webservice                         |      ✓      |   1_10  |
| Labelling webservice                          |      ✓      |   2_1   |
| Shippingstatus webservice                     |      X      |   N/A   |
| **Delivery options**                                                |||
| Deliverydate webservice                       |      X      |   N/A   |
| Location webservice                           |      ✓      |   2_1   |
| Timeframe webservice                          |      ✓      |   2_1   |

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
$barcode = $barcodeService->generateBarcode();
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

$result = $api->getLabellingService()->generateLabel($shipments, $message);
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

       $contact = (new Contact)->setEmail('mail@jordijolink.nl');
       $shipments = (new Shipments)->addShipment(
            (new Shipment)
                ->setAddresses((new Addresses)->addAddress($receivingAddress))
                ->setBarcode($barcodeService->generateBarcode())
                ->setDimension($dimension)
                ->setDeliveryDate($deliveryTimestampStart)
                ->setDeliveryTimeStampStart($deliveryTimestampStart)
                ->setDeliveryTimeStampEnd($deliveryTimestampEnd)
                ->setContacts((new Contacts)->addContact($contact))
        );

        $result = $api->getLabellingService()->generateLabel($shipments, $message);
        print_r($result);
    }
}
echo "Timeframe confirmed.\r\n";
```

### Code example: Fetch nearest locations
```php
$receivingAddress = (new Address)
    ->setAddressType(AddressType::RECEIVER)
    ->setZipcode('6932NC')
    ->setCountrycode('NL');

$result = $api->getLocationsService()->getNearestLocations($receivingAddress);
print_r($result);
```

### Code example: Fetch nearest locations by geocode and lookup location info
```php
$result = $api->getLocationsService()->getNearestLocationsByGeocode(51.963807, 5.968984, 'NL');

if (!empty($result['GetLocationsResult']['ResponseLocation'])) {
    $location = $result['GetLocationsResult']['ResponseLocation'][0];
    print_r($location);

    echo "Location info:\r\n";
    $locationCode = $location['LocationCode'];
    $retailNetworkID = $location['RetailNetworkID'];
    print_r($api->getLocationsService()->getLocationInformation($locationCode, $retailNetworkID));
}
```

### Code example: Fetch nearest location and create a label for pickup at the pickup point
```php
$result = $api->getLocationsService()->getNearestLocationsByGeocode(51.963807, 5.968984, 'NL');

if (!empty($result['GetLocationsResult']['ResponseLocation'])) {
    $location = $result['GetLocationsResult']['ResponseLocation'][0];
    $locationCode = $location['LocationCode'];
    $retailNetworkID = $location['RetailNetworkID'];

    $pickupAddress = (new \PostNL\Model\Address)
        ->setAddressType(\PostNL\Enum\AddressType::DELIVERY_ADDRESS_FOR_PICKUP)
        ->setCompanyName($location['Name'])
        ->setStreet($location['Address']['Street'])
        ->setHouseNr($location['Address']['HouseNr'])
        ->setZipcode($location['Address']['Zipcode'])
        ->setCity($location['Address']['City'])
        ->setCountrycode('NL');

    $contact = (new Contact)->setEmail('mail@jordijolink.nl');
    $shipments = (new Shipments)->addShipment(
        (new Shipment)
            ->setAddresses((new Addresses)->addAddress($receivingAddress)->addAddress($pickupAddress))
            ->setBarcode($barcodeService->generateBarcode())
            ->setDimension($dimension)
            ->setContacts((new Contacts)->addContact($contact))
            ->setProductCodeDelivery('3533')
            ->setDeliveryAddress(AddressType::DELIVERY_ADDRESS_FOR_PICKUP)
    );

    $result = $api->getLabellingService()->generateLabel($shipments, $message);
    print_r($result);
}
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

