<?php
namespace ProjectEuler\Cli\Command;

use ProjectEuler\Cli\Command;

class Problem implements Command {

    protected $args;

    public function __construct($args){
        $this->args = $args;
    }

    public function run() {
        $problem = $this->getProblem();
        
        if(!is_array($problem)){
            $problem->run();
            return;
        }
        
        foreach($problem as $toRun){
            $toRun->run();
        }
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

}