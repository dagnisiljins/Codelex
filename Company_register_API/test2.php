<?php

//$companies = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=20'));
$companies = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=codelex&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9'));

$found = false;  // Initialize a variable to track if the company is found

$searchName = "";  // Search parameter
$searchRegcode = NULL;

foreach ($companies->result->records as $company) {
    // Convert both the search parameter and the text in records to uppercase for case-insensitive comparison
    $searchParametreUpper = mb_strtoupper($searchName, 'UTF-8');
    $companyNameUpper = mb_strtoupper($company->name_in_quotes, 'UTF-8');


    if ($searchParametreUpper === $companyNameUpper || $searchRegcode === $company->regcode) {
        echo "Name: " . $company->name_in_quotes . PHP_EOL;
        echo "Type: " . $company->type_text . PHP_EOL;
        echo "Registration number: " . $company->regcode . PHP_EOL;
        echo "Registration date: " . $company->registered . PHP_EOL;
        echo "Address: " . $company->address . PHP_EOL;
        if (isset($company->terminated)) {
            echo "Terminated: Yes" . PHP_EOL;
        } else {
            echo "Terminated: No" . PHP_EOL;
        }
        echo "------------------------------------------------------------\n";
        $found = true;  // Mark the company as found
    }
}

if (!$found) {
    echo "Company not found" . PHP_EOL;
}
