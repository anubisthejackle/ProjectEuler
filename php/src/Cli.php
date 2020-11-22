<?php
namespace ProjectEuler;

use GetOpt\GetOpt;
use GetOpt\Option;

class Cli {

    protected $args;
    protected $commands = [
        'problem',
        'name'
    ];

    protected $command;

    public function __construct($args){
     
        $getopt = new GetOpt();
        $getopt->addOptions([
            new Option('p', 'problem', GetOpt::REQUIRED_ARGUMENT),
            new Option('n', 'name', GetOpt::REQUIRED_ARGUMENT),
        ]);

        $getopt->process($args);

        $this->args = $getopt->getOptions();
        
    }

    public function run() {

        if(!$this->validCommandFound()){
            echo 'Correct usage is ' . $this->args[0] . ' [--problem 1[,2] | --name $number';
            return;
        }
        
        $command = $this->_generateCommandMethod();
        
        $command->run();

    }

    public function validCommandFound() {
        
        $keys = array_keys($this->args);
        
        $exists = false;
        foreach($this->commands as $command){
        
            $exists = in_array($command, $keys);

            if($exists == true){
                $this->command = $command;
                break;
            }
        
        }
        
        return $exists;
    }

    private function _generateCommandMethod() {

        $class = 'ProjectEuler\\Cli\\Command\\' . ucfirst($this->command);

        return new $class($this->args);
    }

    public function getArgs() {

        return $this->args;

    }

}