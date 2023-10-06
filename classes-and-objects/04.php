<?php
//Movie - full task in read me
class Movie
{
    private $title;
    private $studio;
    private $rating;

    public function __construct($title, $studio, $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public static function GetPG($movies, string $rating = 'PG') {
        $pgMovies = [];

        foreach ($movies as $movie) {
            if ($movie->rating === $rating) {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }

    public function getInfo() {
        return $this->title . ', ' . $this->studio . ', ' . $this->rating;
    }

}

$movieOne = new Movie('Casino Royale', 'Eon Productions', 'PG13');
$movieTwo = new Movie('Glass', 'Buena Vista International', 'PG13');
$movieThree = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');

$movies = [$movieOne, $movieTwo, $movieThree];
$rating = readline('Enter search raiting: ');

$pgMovies = Movie::GetPG($movies, $rating);

foreach ($pgMovies as $pgMovie) {
    /**
     * @var Movie $pgMovie
     */
    echo $pgMovie->getInfo();
}


