<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use rhowe\MathFunctions\Factors;

$options = getopt("n:");
if($options){
    if($options['n'] <= 1){
        die('Numbers must be greater than 1' . PHP_EOL);
    }
    $results = Factors::getFactors($options['n']);
    $output = '';
    foreach($results as $result){
        $output .= "$result,";
    }
    $output = substr($output, 0, -1);
    echo $output . PHP_EOL;
} else {
    echo usage();
}

function usage():string{
    return <<<USAGE

GetFactors -n <number>

required:
---------
-n  the number to get the factors for, must be greater than 1

USAGE;
}