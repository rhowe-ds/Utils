<?php
namespace rhowe\MathFunctions;

class Factors {

    /**
     * Get the factors for any given number larger than 1
     *
     * @param int $number
     * @return array
     */
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

    /**
     * return if a number is a prime number.
     * @param int $number
     * @return bool
     */
    public static function isPrime(int $number): bool {
        if($number <= 1) return false;
        if($number <= 3) return true;

        if($number % 2 == 0 || $number %3 == 0) return false;

        for($i = 5; $i <= sqrt($number); $i = $i + 6){
            if($number % $i == 0 || $number %($i + 2) == 0) return false;
        }

        return true;
    }

}