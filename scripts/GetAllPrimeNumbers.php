<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use rhowe\MathFunctions\Factors;

for($i = 2; $i <= PHP_INT_MAX; $i++){
    $result = Factors::getFactors($i);
    if(count($result) !== 2){
        echo $i . PHP_EOL;
    }
}