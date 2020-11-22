<?php

use PHPUnit\Framework\TestCase;

class ProblemsTest extends TestCase {

    private $problems;

    public function setUp() {

        $this->problems = new ProjectEuler\Problems();
    
    }

    public function testMultiplesOf3And5() {


        $this->assertEquals(23, $this->problems->sumMultiplesOf3And5Below(10));

    }

    public function testFibonacci() {

        $this->assertEquals(44, $this->problems->sumEvenFibonacciNumbersUnder(89));

    }
    
}
