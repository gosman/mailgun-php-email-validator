<?php

//Validate single E-Mail Address

function validateEmail($apiPublicKey, $emailAddress) {

    $fields = array(
        'address' => $emailAddress,
        'api_key' => $apiPublicKey,
    );

    $getFields = http_build_query($fields);
    $url = "https://api.mailgun.net/v3/address/validate?" . $getFields;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set to 1 to verify SSL connection
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $jsonResponse = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status === 200) {

        return $jsonResponse;
    } else {

        //API error, setup error handling
    }
}

//Validate multiple E-Mail Addresses

function validateEmails($apiPublicKey, $emailAddressArray) {

    $emailsAddresses = implode(",", $emailAddressArray);

    $fields = array(
        'addresses' => $emailsAddresses,
        'api_key' => $apiPublicKey,
    );


    $getFields = http_build_query($fields);
    $url = "https://api.mailgun.net/v3/address/parse?" . $getFields;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set to 1 to verify SSL connection
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $jsonResponse = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status === 200) {

        return $jsonResponse;
    } else {

        //API error, setup error handling
    }
}
