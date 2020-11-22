<?php

namespace ProjectEuler\Test\Problem;

use PHPUnit\Framework\TestCase;

class OneTest extends TestCase {

    public function testMultiplesOf3And5() {

        $problem = new \ProjectEuler\Problems\One();
        $this->assertEquals(23, $problem->sumMultiplesOf3And5Below(10));

    }

}
