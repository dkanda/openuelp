<?php
$address = '92677';
    printf("Get geocode for address: %s\n",$address);

    // Chose your method, with or without user info
    $wsdl = 'http://geocoder.us/dist/eg/clients/GeoCoderPHP.wsdl';
    //$wsdl = 'http://username:password@geocoder.us/dist/eg/clients/GeoCoderPHP.wsdl';

    // Make the connection
    $client = new SoapClient($wsdl);

    // Use this to see what services are available
    //var_dump($client->__getFunctions());

    // Actually call the service
    $result = $client->geocode($address);
    var_dump($result);
    print $result[0]->lat;