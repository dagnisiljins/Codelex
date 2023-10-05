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

    public static function GetPG($movies) {
        $pgMovies = [];

        foreach ($movies as $movie) {
            if ($movie->rating === 'PG') {
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

$pgMovies = Movie::GetPG($movies);

foreach ($pgMovies as $pgMovie) {
    echo $pgMovie->getInfo();
}


