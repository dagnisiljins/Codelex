<?php
// read me
class Point
{
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

    public function setX($x) {
        $this->x = $x;
    }

    public function setY($y) {
        $this->y = $y;
    }

    public function swapPoints(Point $p1, Point $p2) {
        $tempX = $p1->getX();
        $tempY = $p1->getY(); //saglabājam pagaidu mainīgajaos p1 punkta x un y vērtības

        $p1->setX($p2->getX());
        $p1->setY($p2->getY()); //uzsetojam p1 jaunās vērtības, kas ir paņemtas(get) no p2 punkta

        $p2->setX($tempX);
        $p2->setY($tempY); //uzsetojam p2 vērtības no iepriekš saglabātajiem pagaidu mainīgajiem.
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);
$p1->swapPoints($p1, $p2);

echo "(" . $p1->getX() . ", " . $p1->getY() . ")" . PHP_EOL;
echo "(" . $p2->getX() . ", " . $p2->getY() . ")";