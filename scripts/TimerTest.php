<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use rhowe\MathFunctions\Factors;
$start_time = microtime(true);
$end_time = $start_time + (3);

for($i = 2; $i <= PHP_INT_MAX; $i++){
    $result = Factors::getFactors($i);
    if(($end_time - microtime(true)) < 0){
        die("$i");
    }
}
