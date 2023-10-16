<?php

class SearchResultsHandler {
    private $searchParameters = [];

    public function saveSearchParameter($searchParameter) {
        date_default_timezone_set('Europe/Riga');

        $this->searchParameters[] = [
            'parameter' => $searchParameter,
            'timestamp' => date('Y-m-d H:i:s')
        ];

        file_put_contents('search_parameters.json', json_encode($this->searchParameters));
    }

    public function getSearchParameters() {
        if (file_exists('search_parameters.json')) {
            $this->searchParameters = json_decode(file_get_contents('search_parameters.json'), true);
        }
        return $this->searchParameters;
    }
}