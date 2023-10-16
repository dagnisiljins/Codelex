<?php

class CompanySearch
{
    private $apiUrl;

    public function __construct($resourceId) {
        $this->apiUrl = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id={$resourceId}";
    }

    public function search($searchParameter) {
        $apiUrlWithParam = $this->apiUrl . "&q=" . urlencode($searchParameter);
        $companies = json_decode(file_get_contents($apiUrlWithParam));

        return $companies->result->records;
    }
}