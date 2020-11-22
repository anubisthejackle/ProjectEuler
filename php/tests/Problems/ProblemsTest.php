<?php

use PHPUnit\Framework\TestCase;

class ProblemsTest extends TestCase {

    private $problems;

    protected function setUp(): void {

        $this->problems = new ProjectEuler\Problems\Two();
    
    }

    public function testMultiplesOf3And5() {

        $problem = new ProjectEuler\Problems\One();
        $this->assertEquals(23, $problem->sumMultiplesOf3And5Below(10));

    }

    public function testFibonacci() {

        $this->assertEquals(1, $this->problems->getFibonacciNumber(1));
        $this->assertEquals(1, $this->problems->getFibonacciNumber(2));
        $this->assertEquals(2, $this->problems->getFibonacciNumber(3));
        $this->assertEquals(3, $this->problems->getFibonacciNumber(4));
        
    }

    public function testFibonacciSum() {

        $this->assertEquals(44, $this->problems->sumEvenFibonacciNumbersUnder(89));
    
    }
}