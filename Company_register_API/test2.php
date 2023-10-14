<?php

//$companies = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=20'));
$companies = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=100'));

foreach ($companies->result->records as $company) {
    echo "Name: " . $company->name . PHP_EOL;
    echo "Registration number: " . $company->regcode . PHP_EOL;
}