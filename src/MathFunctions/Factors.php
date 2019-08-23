<?php
namespace rhowe\MathFunctions;

class Factors {

    public static function getFactors(int $number): array{
        if($number <= 1){
            throw new \OutOfBoundsException('Numbers must be greater than 1');
        }
        $results = [];
        for($i = 1; $i <= sqrt($number); $i++){
            if($number % $i == 0){
                $results[] = $i;
                $results[] = $number / $i;
            }
        }
        $results = array_unique($results);
        sort($results);
        return $results;
    }

}