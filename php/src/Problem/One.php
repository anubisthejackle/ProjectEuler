<?php

namespace ProjectEuler\Problem;

use ProjectEuler\Problem;

class One implements Problem {

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

    public function run() {

        echo 'Problem #1: "Sum Multiples of 3 and 5 Below 1000" -- ' . $this->sumMultiplesOf3And5Below(1000) . PHP_EOL;

    }

}