<?php declare(strict_types=1); // deklarē strikti, ka turās pie tipa: strings utt.


// type hint
// return type
// type cast - nomaina datu tipu

$apple = 'dzidrais';
function peel(string $apple, int $size, float $kautkas = 4.5): string // neobligātie elementus izveido
// liekot '='un vērtību, tos būtu jāliek beigās, citādi liekot argumentus vajadzēs likt arī neobligātajam,
// bet ja pēc neobligātā neseko obligāts elements, tad var nelikt vērtību
{
    if ($size == 10) {
        return 'slikts ābols';
    }
    return 'nomizots ' . $apple;
}

echo peel($apple);