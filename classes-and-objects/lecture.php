<?php

$color = 'blue';
class Cup //Pascal case
{
    // [encapsulation] [data type] [name] [value]
    // public/private/protected - ja nezina kas, tad jāliek privat

    private string $color = 'red'; //noklusējuma vērtība ir public, tad to var no ārpuses nomainīt un var izvadīt vērtības
    public function __construct(string $color) // vienmēr sākas ar __, klasē funkcija ir rezervēta, viņa izsauksies, kad izmantos new. klases ietvaros var būt tikai viens constructor.
    {
        $this->color = $color; //šādi mēs iedodam citu krāsu, norādam uz iepriekš klasē definēto private string $color = 'red'
    }
    public function getColor()
    {
        return $this->color; //atļauju caur šo funkciju no ārpuses piekļūt clases krāsai
    }
    public function setColor(string $newColor)
    {
        if($newColor == 'blue'){ //iestata, ko drīkst mainīt un ko nē
            return 'not allowed!';
        }

    }
}

$cup = new Cup('blue');

//accessor & mutator
//getter & setter -tautā saukts, iegūt un nomainīt

echo $cup->getColor(); //ar get piekļūstam krāsai
echo $cup->setColor('blue'); //ar set piekļūstam class funkcijai, kas atļauj mainīt class $color uz $newColor


/////////////////////////////////
$cup = new Cup;
$cupTwo = new Cup;

var_dump($cup, $cupTwo); //jau rādīsies nevis stdclass bet Cup

function abc(Cup $cup) //class var lietot datu tipu vietā
{

}

abc($cup);