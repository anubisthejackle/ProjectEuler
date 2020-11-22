<?php
namespace ProjectEuler\Cli\Command;

use ProjectEuler\Cli\Command;

class Problem extends Command {

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

    protected function _generateProblem($problem) {
        $word = $this->convertIntegerToWord($problem);
        $class = 'ProjectEuler\\Problem\\' . $this->convertWordToClassName($word);
        return new $class();
    }

}