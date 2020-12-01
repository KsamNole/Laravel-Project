<?php

namespace App\MagicCategory;

class Point {
    public $x;
    public $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
   public function transferPoint(Vector $vector){
       $vectorX = $vector->x;
       $vectorY = $vector->y;
       $this->x = $vectorX + $this->x;
       $this->y = $vectorY + $this->y;
   }

    public function show(){
        return "Точка - (" . $this->x . "," . $this->y . ")";
    }
}
