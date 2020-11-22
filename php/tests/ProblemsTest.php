<?php

use PHPUnit\Framework\TestCase;

class ProblemsTest extends TestCase {

    public function testMultiplesOf3And5() {

        $one = new Problem\One();

        /* 
        If we list all the natural numbers below 10 that are multiples 
        of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 
        23.

        Find the sum of all the multiples of 3 or 5 below 1000. */

        $this->assertEquals(23, $one->sumMultiplesOf3And5Below(10));

    }
    
}
