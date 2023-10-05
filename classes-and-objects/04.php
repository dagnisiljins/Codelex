<?php
//
class Movie {
    private $title;
    private $studio;
    private $rating;

    public function __construct($title, $studio, $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getStudio() {
        return $this->studio;
    }

    public function getRating() {
        return $this->rating;
    }

    public static function GetPG($movies) {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->rating === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }
}

// Create instances of the Movie class
$movie1 = new Movie("Casino Royale", "Eon Productions", "PG-13");
$movie2 = new Movie("Glass", "Buena Vista International", "PG-13");
$movie3 = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");

// Create an array of Movie instances
$movies = [$movie1, $movie2, $movie3];

// Get PG-rated movies from the array
$pgMovies = Movie::GetPG($movies);

// Print the PG-rated movies
foreach ($pgMovies as $pgMovie) {
    echo "Title: " . $pgMovie->getTitle() . "\n";
    echo "Studio: " . $pgMovie->getStudio() . "\n";
    echo "Rating: " . $pgMovie->getRating() . "\n";
    echo "-------------------------\n";
}
