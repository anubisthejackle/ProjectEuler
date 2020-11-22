<?php
namespace ProjectEuler;

use GetOpt\GetOpt;
use GetOpt\Option;

class Cli {

    protected $args;

    public function __construct($args){
     
        $getopt = new GetOpt();
        $getopt->addOptions([
            new Option('p', 'problem', GetOpt::REQUIRED_ARGUMENT)
        ]);

        $getopt->process($args);

        $this->args = $getopt->getOptions();
    
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
        $word = $this->convertIntegerToWord($this->args['problem']);
        $class = 'ProjectEuler\\Problem\\' . $this->convertWordToClassName($word);

        return new $class();
    }

    public function getArgs() {

        return $this->args;

    }

}