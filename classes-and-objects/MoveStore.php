<?php

/* Izstrādāt Rick and Morty "Video Store" (Episodes Collection), kurā datus saņem no Rick and Morty API.
Epizodes nav iespējams "īrēt", bet gan vērtēt, skalā no 1-10 (bez float ex: 3.1)
Iespējams redzēt epizošu sarakstu.*/

class Episode
{
    private int $id;
    private string $name;
    private float $averageRating = 0.0;
    private int $submissionsCount = 0;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function receiveRating(float $rating): void
    {
        if ($rating >= 1 && $rating <= 5) {
            $this->averageRating = ($this->averageRating * $this->submissionsCount + $rating) / ($this->submissionsCount + 1);
            $this->submissionsCount++;
        }
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }
}

class VideoStore
{
    private array $inventory = [];

    public function listEpisodes(): void
    {
        $episodes = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'));
        $id = 1; // Unique ID counter

        if (empty($episodes->results)) {
            echo "No episodes found in the API response." . PHP_EOL;
            return;
        } else {
            foreach ($episodes->results as $episode) {
                $newEpisode = new Episode($id, $episode->name);
                $this->inventory[] = $newEpisode;

                // Assign random ratings within the range (1-10)
                $randomRating = rand(1, 10);
                $newEpisode->receiveRating($randomRating);
                $id++;
            }
        }
    }

    public function getInventory(): array
    {
        return $this->inventory;
    }
}

class Application
{
    private VideoStore $videoStore;

    public function __construct()
    {
        $this->videoStore = new VideoStore();
        $this->videoStore->listEpisodes(); // Fetch episodes and store them in the inventory
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to list episodes\n";
            echo "Choose 2 to rate an episode\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->listEpisodes(); // List episodes from the inventory
                    break;
                case 2:
                    $this->rateEpisode();
                    break;
                default:
                    echo "Sorry, we don't have such option as " . $command . PHP_EOL;
            }
        }
    }

    private function listEpisodes()
    {
        echo "Episodes List:" . PHP_EOL;
        $episodes = $this->videoStore->getInventory();
        foreach ($episodes as $id => $episode) {
            echo "ID: " . ($id + 1) . PHP_EOL; // Adding 1 to $id to display a 1-based ID
            echo "Episode Name: " . $episode->getName() . PHP_EOL;
            echo "Average Rating: " . round($episode->getAverageRating()) . PHP_EOL; // Rounding to the nearest integer
            echo '--------------------------------------------------' . PHP_EOL;
        }
    }

    private function rateEpisode()
    {
        echo "Enter episode ID to rate: ";
        $id = (int)readline();

        if ($id < 1 || $id > count($this->videoStore->getInventory())) {
            echo "Invalid episode ID. Please enter a valid ID." . PHP_EOL;
            return;
        }

        echo "Enter your rating (1-10): ";
        $rating = (float)readline();

        $episode = $this->videoStore->getInventory()[$id - 1];

        $episode->receiveRating($rating);
        echo "You rated '" . $episode->getName() . "' with $rating stars." . PHP_EOL;
    }
}

$app = new Application();
$app->run();