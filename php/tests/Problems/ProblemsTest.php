<?php

use PHPUnit\Framework\TestCase;

class ProblemsTest extends TestCase {

    public function testMultiplesOf3And5() {

        $problem = new ProjectEuler\Problems\One();
        $this->assertEquals(23, $problem->sumMultiplesOf3And5Below(10));

    }

    public function testFibonacci() {

        $problem = new ProjectEuler\Problems\Two();
        $this->assertEquals(1, $problem->getFibonacciNumber(1));
        $this->assertEquals(1, $problem->getFibonacciNumber(2));
        $this->assertEquals(2, $problem->getFibonacciNumber(3));
        $this->assertEquals(3, $problem->getFibonacciNumber(4));
        
    }

    public function testFibonacciSum() {

        $problem = new ProjectEuler\Problems\Two();
        $this->assertEquals(44, $problem->sumEvenFibonacciNumbersUnder(89));
    
    }
}
