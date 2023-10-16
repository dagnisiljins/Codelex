<?php

//šeit meklē pēc uzņēmuma nosaukuma un arī reģistrācijas nr. Lidl piemērs strādā abos meklējuma veidos
$searchParametr = readline('Enter search parametr: ');
$companies = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$searchParametr}&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9"));


foreach ($companies->result->records as $company) {

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

}