<?php

namespace ProjectEuler\Problem;

use ProjectEuler\Problem;

class Two implements Problem {

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

    public function run(){

        echo 'Problem #2: "Sum Even Fibonacci Numbers Below 4,000,000" -- ' . $this->sumEvenFibonacciNumbersUnder(4000000) . PHP_EOL;

    }

}