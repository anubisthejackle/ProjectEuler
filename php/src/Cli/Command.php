<?php
namespace ProjectEuler\Cli;

abstract class Command {
    public abstract function run();

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