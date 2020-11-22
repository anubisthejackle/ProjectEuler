<?php

namespace ProjectEuler;

class Problems {

    public function sumMultiplesOf3And5Below($max){
        $sum = 0;
        foreach(range(0, $max-1) as $number){
            if(!($number % 3 == 0) && !($number % 5 == 0)){
                continue;
            }

            $sum += $number;
        }
        return $sum;
    }

}