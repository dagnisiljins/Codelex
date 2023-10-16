<?php
class App {

    private $searchResultsHandler;

    public function __construct() {
        $this->searchResultsHandler = new SearchResultsHandler();
    }

    public function run() {
        echo "Welcome to the Company Search App\n";

        while (true) {
            echo "Options:\n";
            echo "1. Search for a company\n";
            echo "2. View previously searched parameters\n";
            echo "3. Quit\n";

            $choice = readline('Enter your choice: ');
            echo "------------------------------------------------------------\n";

            switch ($choice) {
                case '1':
                    $this->searchCompany();
                    break;
                case '2':
                    $this->viewSearchedCompanies();
                    break;
                case '3':
                    echo "Goodbye!\n";
                    exit;
                default:
                    echo "Invalid choice. Please enter a valid option.\n";
            }
        }
    }

   private function searchCompany() {
        $searchParameter = readline('Enter search parameter: ');

        $this->searchResultsHandler->saveSearchParameter($searchParameter);

        $companies = json_decode(file_get_contents('https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=' . urlencode($searchParameter) . '&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9'));

        if (!empty($companies) && isset($companies->result->records)) {
            $this->displaySearchResults($companies->result->records);
        } else {
            echo "No matching companies found.\n";
        }
    }

    private function displaySearchResults($companies) {
        foreach ($companies as $company) {
            echo "Name: " . $company->name_in_quotes . PHP_EOL;
            echo "Type: " . $company->type_text . PHP_EOL;
            echo "Registration number: " . $company->regcode . PHP_EOL;
            echo "Registration date: " . $company->registered . PHP_EOL;
            echo "Address: " . $company->address . PHP_EOL;
            echo "Terminated: " . (isset($company->terminated) ? "Yes" : "No") . PHP_EOL;
            echo "------------------------------------------------------------\n";
        }
    }

    private function viewSearchedCompanies() {
        $searchParameters = $this->searchResultsHandler->getSearchParameters();

        if (!empty($searchParameters)) {
            echo "Search Parameters and Timestamps:\n";
            echo PHP_EOL;
            foreach ($searchParameters as $searchParameter) {
                echo "Search Parameter: {$searchParameter['parameter']} (Saved on: {$searchParameter['timestamp']})\n";
                echo "------------------------------------------------------------\n";
            }
        } else {
            echo "No previous search results found.\n";
            echo "------------------------------------------------------------\n";
        }
    }
}

