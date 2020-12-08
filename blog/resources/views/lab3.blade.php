<?php
use App\MagicCategory\Point;
use App\MagicCategory\Vector;
use App\MagicCategory\MagicClass;

$const = new MagicClass(2);
$const->aaaa();
$const->x = 2;
$const->x;
isset($const->x);
$const(5);
echo $const;
$a = [];
$string = serialize($const);
$const = unserialize($string);
echo $string . "<br>";

#$point = new Point(1, 1);
#$vector1 = new Vector(2, 2);
#$vector2 = new Vector(0, 0);
#$vector3 = new Vector(4, -4);

#echo "Длина вектора 1 - " . $vector1->length(). "<br>";
#echo "Длина вектора 2 - " . $vector2->length(). "<br>";
#echo "Длина вектора 3 - " . $vector3->length(). "<br>";
#echo $vector3->perpendicularity($vector1) . "<br>";
#echo $point->transferPoint($vector1);
#echo $point->show() . " результат переноса точки (1,1) на вектор (2,2)" . "<br>";

