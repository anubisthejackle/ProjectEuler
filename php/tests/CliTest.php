<?php

use PHPUnit\Framework\TestCase;

class CliTest extends TestCase {

    public function testProcessingArgsCreatesCorrectArray() {

        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $this->assertArrayHasKey('problem', $cli->getArgs());

    }

    public function testConvertingIntegerToWord() {

        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $this->assertEquals('One', $cli->convertIntegerToWord(1));
        $this->assertEquals('One hundred', $cli->convertIntegerToWord(100));
        $this->assertEquals('One thousand two hundred thirty-four', $cli->convertIntegerToWord(1234));

    }

    public function testConvertWordToClassname() {

        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $this->assertEquals('One', $cli->convertWordToClassName('One'));
        $this->assertEquals('OneHundred', $cli->convertWordToClassName('One hundred'));
        $this->assertEquals('OneThousandTwoHundredThirtyfour', $cli->convertWordToClassName('One thousand two hundred thirty-four'));

    }

    public function testRunningWithProblemNumberRunsProblem(){

        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $problem = $cli->getProblem();

        $this->assertInstanceOf(ProjectEuler\Problems\One::class, $problem);

        $args = ["./pecli","--problem","2"];
        $cli = new ProjectEuler\Cli($args);

        $problem = $cli->getProblem();

        $this->assertInstanceOf(ProjectEuler\Problems\Two::class, $problem);

    }

    public function testProblemsAreInstanceOfProblem(){

        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $problem = $cli->getProblem();

        $this->assertInstanceOf(ProjectEuler\Problem::class, $problem);

        $args = ["./pecli","--problem","2"];
        $cli = new ProjectEuler\Cli($args);

        $problem = $cli->getProblem();

        $this->assertInstanceOf(ProjectEuler\Problem::class, $problem);

    }

    public function testProblemOneImplementsRunMethod() {

        $this->expectOutputString('Problem #1: "Sum Multiples of 3 and 5 Below 1000" -- 233168' . PHP_EOL);
        $args = ["./pecli","--problem","1"];
        $cli = new ProjectEuler\Cli($args);

        $problem = $cli->getProblem();

        $problem->run();

    }

}