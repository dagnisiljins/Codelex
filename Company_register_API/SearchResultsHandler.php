<?php

class SearchResultsHandler {

   private array $searchParameters = [];
// sākotnējā versija #############################################################################
   /* public function saveSearchParameter(string $searchParameter): void {
        date_default_timezone_set('Europe/Riga');

        $this->searchParameters[] = [
            'parameter' => $searchParameter,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        file_put_contents('search_parameters.json', json_encode($this->searchParameters));
    }

    public function getSearchParameters(): array {
        if (file_exists('search_parameters.json')) {
            $this->searchParameters = json_decode(file_get_contents('search_parameters.json'), true);
        }
        return $this->searchParameters;
    }*/
// Rīt šo izmēģināt, kad API atkal strādās, jo šādi vajadzētu saglabāt visus iepriekšējos meklējumus##################################################
// Šs ir nnotesēts un strādā
    public function saveSearchParameter(string $searchParameter): void {
        date_default_timezone_set('Europe/Riga');

        $searchParameters = $this->getSearchParameters();
        $searchParameters[] = [
            'parameter' => $searchParameter,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        file_put_contents('search_parameters.json', json_encode($searchParameters));
    }

    public function getSearchParameters(): array {
        if (file_exists('search_parameters.json')) {
            return json_decode(file_get_contents('search_parameters.json'), true);
        }
        return [];
    }
}