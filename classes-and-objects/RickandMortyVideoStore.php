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
        if ($rating >= 1 && $rating <= 10) {
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
        $id = 1;

        if (empty($episodes->results)) {
            echo "No episodes found." . PHP_EOL;
            return;
        } else {
            foreach ($episodes->results as $episode) {
                $newEpisode = new Episode($id, $episode->name);
                $this->inventory[] = $newEpisode;

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
        $this->videoStore->listEpisodes();
    }

    function run()
    {
        while (true) {
            echo  "------------------------------------------------------------------\n";
            echo "Enter 0 for EXIT\n";
            echo "Enter 1 to list episodes\n";
            echo "Enter 2 to rate an episode\n";

            $command = (int)readline("Choose the operation you want to perform: ");
            echo  "------------------------------------------------------------------\n";

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->listEpisodes();
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
            echo "ID: " . ($id + 1) . PHP_EOL;
            echo "Episode Name: " . $episode->getName() . PHP_EOL;
            echo "Average Rating: " . round($episode->getAverageRating()) . PHP_EOL;
            echo '--------------------------------------------------' . PHP_EOL;
        }
    }

    private function rateEpisode()
    {
        $id = (int)readline("Enter episode ID (1-20) to rate: ");

        if ($id < 1 || $id > count($this->videoStore->getInventory())) {
            echo "Invalid episode ID. Please enter a valid ID." . PHP_EOL;
            return;
        }

        while (true) {
            $episode = $this->videoStore->getInventory()[$id - 1];
            $rating = (float)readline("Enter your rating (1-10) for episode '{$episode->getName()}': ");
            $episode->receiveRating($rating);

            if ($rating > 10) {
                echo "Maximum rate is 10\n";
            } elseif ($rating < 1) {
                echo "Minimum rate is 1\n";
            } elseif ($rating <= 7) {
                echo "You rated '" . $episode->getName() . "' with $rating stars." . PHP_EOL;
                break;
            } else {
                echo "Great! You rated '{$episode->getName()}' with $rating stars, which is a very high rating!\n";
                break;
            }
        }
    }
}

$app = new Application();
$app->run();