<?php

namespace tests\rhowe\MathFunctions;

use rhowe\MathFunctions\Factors;
use PHPUnit\Framework\TestCase;

class TestGenerateFactors extends TestCase{

    public function primeNumberProvider(): array{
        return [
            [2],   [3],   [5],   [7],   [11],  [13],  [17],  [19],  [23],  [29],  [31],  [37],  [41],  [43],  [47],  [53],
            [59],  [61],  [67],  [71],  [73],  [79],  [83],  [89],  [97],  [101], [103], [107], [109], [113], [127], [131], [137],
            [139], [149], [151], [157], [163], [167], [173], [179], [181], [191], [193], [197], [199], [211], [223], [227], [229]
        ];
    }

    public function numberProvider(): array{
        return [
            [4, [1,2,4]],
            [10, [1,2,5,10]],
            [15, [1,3,5,15]],
            [45, [1,3,5,9,15,45]],
            [99, [1,3,9,11,33,99]],
            [100, [1,2,4,5,10,20,25,50,100]],
            [422, [1,2,211,422]]
        ];
    }

    public function lessThanOneNumberProvider(): array{
        return [[1], [0], [-1], [PHP_INT_MIN]];
    }

    /**
     * @dataProvider primeNumberProvider()
     * @test
     */
    public function testPrimesHaveOneFactor($test_number){
        $result = Factors::getFactors($test_number);
        $this->assertEquals(2, count($result), 'Only the number 1 and itself should be returned for a prime number');
    }

    /**
     * @dataProvider numberProvider()
     * @test
     */
    public function testGetFactors($test_number, $expected_output){
        $result = Factors::getFactors($test_number);
        $this->assertEquals($expected_output, $result);
    }

    /**
     * @dataProvider lessThanOneNumberProvider()
     * @dataProvider primeNumberProvider()       This is turned into negative numbers by the function
     * @dataProvider numberProvider()            This is turned into negative numbers by the function
     * @expectedException \OutOfBoundsException
     * @test
     */
    public function testGetLessThanOneFactors($test_number){
        if($test_number > 1) { $test_number = -$test_number; }
        $result = Factors::getFactors($test_number);
    }
}