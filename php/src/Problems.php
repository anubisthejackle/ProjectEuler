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

    public function getFibonacciNumber($number){
        if($number == 0){
            return 0;
        }

        if($number == 1){
            return 1;
        }
        
        return $this->getFibonacciNumber($number - 1) + $this->getFibonacciNumber($number - 2);
    }

    public function sumEvenFibonacciNumbersUnder($number){

        $sum = 0;
        for($i = 0; $i < $number; $i++){
            $fib = $this->getFibonacciNumber($i);
            
            if($fib > $number){
                break;
            }

            if($fib % 2 != 0){
                continue;
            }

            $sum += $fib;
            
        }

        return $sum;
    }

}