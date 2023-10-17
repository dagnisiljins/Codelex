<?php

class CompanySearch
{
    private string $apiUrl;

    public function __construct(string $resourceId) {
        $this->apiUrl = "https://data.gov.lv/dati/lv/api/3/action/datastore_search?resource_id={$resourceId}";
    }

    public function search(string $searchParameter): array {
        $apiUrlWithParam = $this->apiUrl . "&q=" . urlencode($searchParameter);
        $companies = json_decode(file_get_contents($apiUrlWithParam));

        return $companies->result->records;
    }
}
