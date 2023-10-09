<?php

class Video
{
    private string $title;
    private bool $isCheckedOut = false;
    private float $averageRating = 0.0;
    private int $submissionsCount = 0;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function isCheckedOut(): bool
    {
        return $this->isCheckedOut;
    }

    public function checkOut(): void
    {
        $this->isCheckedOut = true;
    }

    public function returnVideo(): void
    {
        $this->isCheckedOut = false;
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

    public function addVideo(string $title): void
    {
        $this->inventory[] = new Video($title);
    }

    public function rentVideo(string $title): bool
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title && !$video->isCheckedOut()) {
                $video->checkOut();
                return true;
            }
        }
        return false;
    }

    public function returnVideo(string $title): bool
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title && $video->isCheckedOut()) {
                $video->returnVideo();
                return true;
            }
        }
        return false;
    }

    public function listInventory(): void
    {
        foreach ($this->inventory as $video) {
            echo "Title: " . $video->getTitle() . PHP_EOL;
            echo "Average Rating: " . number_format($video->getAverageRating(), 2) . PHP_EOL;
            echo "Checked Out: " . ($video->isCheckedOut() ? "Yes" : "No") . PHP_EOL;
            echo "------------------------" . PHP_EOL;
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
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";
            echo "Choose 5 to rate a video\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies();
                    break;
                case 2:
                    $this->rent_video();
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                case 5:
                    $this->rate_video();
                    break;
                default:
                    echo "Sorry, we dont have such option as " . $command . PHP_EOL;
            }
        }
    }

    private function add_movies()
    {
        echo "Enter video title: ";
        $title = readline();
        $this->videoStore->addVideo($title);
        echo "Video added successfully." . PHP_EOL;
    }

    private function rent_video()
    {
        echo $this->videoStore->listInventory();
        echo "Enter video title to rent: ";
        $title = readline();
        if ($this->videoStore->rentVideo($title)) {
            echo "Video '$title' rented successfully." . PHP_EOL;
        } else {
            echo "Video '$title' not found or already checked out." . PHP_EOL;
        }
    }

    private function return_video()
    {
        echo "Enter video title to return: ";
        $title = readline();
        if ($this->videoStore->returnVideo($title)) {
            echo "Video '$title' returned successfully." . PHP_EOL;
        } else {
            echo "Video '$title' not found or not checked out." . PHP_EOL;
        }
    }

    private function list_inventory()
    {
        echo $this->videoStore->listInventory();
    }

    private function rate_video()
    {
        echo "Enter video title to rate: ";
        $title = readline();
        echo "Enter your rating (1-5): ";
        $rating = (float)readline();

        foreach ($this->videoStore->getInventory() as $video) {
            if ($video->getTitle() === $title) {
                $video->receiveRating($rating);
                echo "You rated '$title' with $rating stars." . PHP_EOL;
                return;
            }
        }

        echo "Video '$title' not found in the inventory." . PHP_EOL;
    }
}

$app = new Application();
$app->run();

