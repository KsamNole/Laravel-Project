<?php

namespace App\MagicCategory;

class Vector {
    public $x;
    public $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function length(){
        $x = $this->x;
        $y = $this->y;
        return sqrt($x*$x + $y*$y);
    }

    public function show(){
        $x = $this->x;
        $y = $this->y;
        return "Вектор - (" . $x . "," . $y . ")";
    }

    public function zero(){
        return $this->length() == 0 ? "True" : "False";
    }

    public function perpendicularity(Vector $vector2){
        $x1 = $this->x;
        $y1 = $this->y;
        $x2 = $vector2->y;
        $y2 = $vector2->y;
        $res = $x1 * $x2 + $y1 * $y2;
        return $res == 0 ? "Перпендекулярны" : " Не перпендекулярны";
    }
}
