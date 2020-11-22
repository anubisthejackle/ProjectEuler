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

    public function __construct($args){
     
        $getopt = new GetOpt();
        $getopt->addOptions([
            new Option('p', 'problem', GetOpt::REQUIRED_ARGUMENT)
        ]);

        $getopt->process($args);

        $this->args = $getopt->getOptions();
        
    }

    public function run() {

        if(!$this->validCommandFound()){
            echo 'Correct usage is ' . $this->args[0] . ' [--problem 1[,2] | --name $number';
            return;
        }
        
        $problem = $this->getProblem();
        
        if(!is_array($problem)){
            $problem->run();
        }
        
        foreach($problem as $toRun){
            $toRun->run();
        }

    }

    public function validCommandFound() {
        
        $keys = array_keys($this->args);
        
        $exists = false;
        foreach($this->commands as $command){
        
            if($exists == true){
                break;
            }
        
            $exists = in_array($command, $keys);
        }
        
        return $exists;
    }

    public function convertIntegerToWord($number){
        $locale = 'en_US';
        $fmt = numfmt_create($locale, \NumberFormatter::SPELLOUT);
        $in_words = numfmt_format($fmt, $number);
        return ucfirst($in_words);
    }

    public function convertWordToClassName($word){
        $word = ucwords($word);
        $word = str_replace([' ','-'], '', $word);
        return $word;
    }

    public function getProblem(){

        $problemSet = $this->args['problem'];
        
        if(strpos($problemSet, ',') === false){
            return $this->_generateProblem($problemSet);
        }

        $return = [];
        $problems = explode(',', $problemSet);
        foreach($problems as $problem){
            $return[] = $this->_generateProblem($problem);
        }

        return $return;
        
    }

    private function _generateProblem($problem) {
        $word = $this->convertIntegerToWord($problem);
        $class = 'ProjectEuler\\Problem\\' . $this->convertWordToClassName($word);
        return new $class();
    }

    public function getArgs() {

        return $this->args;

    }

}