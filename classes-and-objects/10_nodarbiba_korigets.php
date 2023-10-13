<?php

class Movie
{
    private string $title;
    private bool $available = true;
    private array $ratings;
    private MoviePlatform $platform;

    public function __construct(string $title, MoviePlatform $platform, array $ratings = [])
    {
        $this->title = $title;
        $this->platform = $platform;
        $this->ratings = $ratings;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function available(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function getAverageRating(): float
    {
        if (count($this->ratings) <= 0) {
            return 0.0;
        }

        return array_sum($this->ratings) / count($this->ratings);
    }

    public function addRating(float $rating): void
    {
        $this->ratings []= $rating;
    }

    public function getPlatform(): MoviePlatform
    {
        return $this->platform;
    }
}

class MovieStore
{
    private string $name;
    private array $movies = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addMovie(Movie $movie): void
    {
        $this->movies[$movie->getPlatform()->getName()][] = $movie;
    }

    public function getMovies(): array
    {
        return $this->movies;
    }

    public function rent(Movie $movie): void
    {
        $movie->setAvailable(false);
    }

    public function return(Movie $movie): void
    {
        $movie->setAvailable(true);
    }

    public function hasPlatform(string $name): bool
    {
        return isset($this->movies[$name]);
    }

    public function getMoviesByPlatform(string $name): array
    {
        return $this->movies[$name] ?? [];
    }

    public function getMovieByTitle(string $title): ?Movie
    {
        foreach ($this->movies as $movies)
        {
            foreach ($movies as $movie)
            {
                /** @var Movie $movie */
                if ($movie->getTitle() === $title)
                {
                    return $movie;
                }
            }
        }

        return null;
    }
}

class MoviePlatform
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Application
{
    private MovieStore $store;

    public function run(): void
    {
        $this->initialize();

        $store = $this->store;

        while (true) {
            echo "Welcome to {$store->getName()}\n";
            echo "Choose the operation you want to perform\n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to list platforms and movies\n";
            echo "Choose 2 to rent a movie\n";
            echo "Choose 3 to return a movie\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!\n";
                    die;
                case 1:
                    foreach ($this->store->getMovies() as $platformName => $movies)
                    {
                        echo "#############################\n";

                        echo "Movies on {$platformName}:\n";

                        $this->displayMovies($movies);

                        echo "#############################\n";
                    }
                    break;
                case 2:
                    $this->rentMovie();
                    break;
                case 3:
                    $this->returnMovie();
                    break;
                default:
                    echo "Sorry, I don't understand you.\n";
            }
        }
    }

    private function initialize()
    {
        $this->store = new MovieStore('Codelex');

        $netflix = new MoviePlatform('Netflix');
        $disney = new MoviePlatform('Disney');
        $hbo = new MoviePlatform('HBO');

        // Netflix
        $this->store->addMovie(new Movie('Reptile', $netflix, [2.3]));
        $this->store->addMovie(new Movie('The Black Book', $netflix, [4.7]));
        $this->store->addMovie(new Movie('Spy Kids: Armageddon', $netflix, [2.8]));
        $this->store->addMovie(new Movie('Love at First Sight', $netflix, [4.6]));
        $this->store->addMovie(new Movie('In Time', $netflix, [3.0]));

        // Disney
        $this->store->addMovie(new Movie('Snow White and the Seven Dwarfs', $disney, [4.9]));
        $this->store->addMovie(new Movie('Dumbo', $disney, [4.7]));
        $this->store->addMovie(new Movie('Victory Through Air Power', $disney, [3.8]));
        $this->store->addMovie(new Movie('The Sign of Zorro', $disney, [3.6]));
        $this->store->addMovie(new Movie('The Rescue', $disney, [3.0]));

        // HBO
        $this->store->addMovie(new Movie('Dune', $hbo, [4.9]));
        $this->store->addMovie(new Movie('Right of Way', $hbo, [3.7]));
        $this->store->addMovie(new Movie('Apology', $hbo, [3.3]));
        $this->store->addMovie(new Movie('Steal the Sky', $hbo, [4.6]));
        $this->store->addMovie(new Movie('The Heist', $hbo, [4.0]));
    }

    private function rentMovie(): void
    {
        echo "Enter the name of the platform (Netflix, Disney, HBO): ";
        $platformName = readline();

        if (!$this->store->hasPlatform($platformName)) {
            echo "Invalid platform.\n";
            return;
        }

        // we need to show per platform
        echo "#############################\n";

        echo "Movies on {$platformName}:\n";

        $movies = $this->store->getMoviesByPlatform($platformName);

        $this->displayMovies($movies);

        echo "#############################\n";

        echo "Enter the index of the movie you want to rent: ";
        $index = (int) readline();

        if (!isset($movies[$index]))
        {
            echo "Movie by {$index} was not found on {$platformName}.\n";
            return;
        }

        $selectedMovie = $movies[$index];

        $this->store->rent($selectedMovie);
    }

    private function displayMovies(array $movies): void
    {
        foreach ($movies as $index => $movie) {
            /** @var Movie $movie */
            echo "[{$index}] Title: {$movie->getTitle()}\n";
            echo "Average Rating: {$movie->getAverageRating()}\n";
            echo "Available: " . ($movie->available() ? "Yes" : "No") . "\n";
            echo "-------------------------\n";
        }
    }

    private function returnMovie(): void
    {
        echo "Enter the title of the movie you want to return: ";
        $title = readline();

        /** @var Movie $movie */
        $movie = $this->store->getMovieByTitle($title);

        if ($movie === null)
        {
            echo "{$title} not found.\n";
            return;
        }

        if ($movie->available())
        {
            echo "{$title} is not checked out.\n";
            return;
        }

        // Ask the user to rate the movie
        echo "Rate this movie from 0 to 5 stars: ";
        $rating = (float) readline();

        if ($rating < 0 || $rating > 5)
        {
            echo "Invalid rating. Please enter a rating between 0 and 5.\n";
            return;
        }

        $movie->addRating($rating);

        $this->store->return($movie);
    }
}

$application = new Application();
$application->run();