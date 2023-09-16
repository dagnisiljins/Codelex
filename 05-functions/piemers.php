<?php declare(strict_types=1); // deklarē strikti, ka turās pie tipa: strings utt.


// type hint
// return type
// type cast - nomaina datu tipu

$apple = 'dzidrais';
function peel(string $apple, int $size = 10, float $kautkas = 4.5): string // neradzamie ir neobligātie elementi, kurus var mainīt
{
    if ($size == 10) {
        return 'slikts ābols';
    }
    return 'nomizots ' . $apple;
}

echo peel($apple);