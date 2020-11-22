<?php
namespace ProjectEuler\Cli\Command;

use ProjectEuler\Cli\Command;

class Name extends Command {

    protected $args;

    public function __construct($args){

        $this->args = $args;

    }

    public function run() {
        
        $word = $this->convertIntegerToWord( $this->args['name'] );
        $className = $this->convertWordToClassName($word);
        echo $className . PHP_EOL;

    }

}