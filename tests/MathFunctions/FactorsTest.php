<?php

namespace tests\rhowe\MathFunctions;

use rhowe\MathFunctions\Factors;
use PHPUnit\Framework\TestCase;

class TestGenerateFactors extends TestCase{

    public function primeNumberProvider(): array{
        return [
            [2],  [3],  [5],  [7],  [11], [13], [17], [19], [23], [29], [31], [37], [41], [43], [47], [53], [59], [61],
            [67], [71], [73], [79], [83], [89], [97], [101],[103],[107],[109],[113],[127],[131],[137],[139],[149],[151],
            [157],[163],[167],[173],[179],[181],[191],[193],[197],[199],[211],[223],[227],[229],[233],[239],[241],[251],
            [257],[263],[269],[271],[277],[281],[283],[293],[307],[311],[313],[317],[331],[337],[347],[349],[353],[359],
            [367],[373],[379],[383],[389],[397],[401],[409],[419],[421],[431],[433],[439],[443],[449],[457],[461],[463],
            [467],[479],[487],[491],[499],[503],[509],[521],[523],[541],[547],[557],[563],[569],[571],[577],[587],[593],
            [599],[601],[607],[613],[617],[619],[631],[641],[643],[647],[653],[659],[661],[673],[677],[683],[691],[701],
            [709],[719],[727],[733],[739],[743],[751],[757],[761],[769],[773],[787],[797],[809],[811],[821],[823],[827],
            [829],[839],[853],[857],[859],[863]
        ];
    }

    public function nonPrimeNumberProvider(): array{
        return [
            [4],  [6],  [8],  [9],  [10], [12], [14], [15], [16], [18], [20], [21], [22], [24], [25], [26], [27], [28],
            [30], [32], [33], [34], [35], [36], [38], [39], [40], [42], [44], [45], [46], [48], [49], [50], [51], [52],
            [54], [55], [56], [57], [58], [60], [62], [63], [64], [65], [66], [68], [69], [70], [72], [74], [75], [76],
            [77], [78], [80], [81], [82], [84], [85], [86], [87], [88], [90], [91], [92], [93], [94], [95], [96], [98],
            [99], [100],[102],[104],[105],[106],[108],[110],[111],[112],[114],[115],[116],[117],[118],[119],[120],[121],
            [122],[123],[124],[125],[126],[128],[129],[130],[132],[133],[134],[135],[136],[138],[140],[141],[142],[143],
            [144],[145],[146],[147],[148],[150],[152],[153],[154],[155],[156],[158],[159],[160],[161],[162],[164],[165],
            [166],[168],[169],[170],[171],[172],[174],[175],[176],[177],[178],[180],[182],[183],[184],[185],[186],[187],
            [188],[189],[190],[192],[194],[195]
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

    /**
     * @dataProvider primeNumberProvider()
     * @param int $test_number
     */
    public function testIsPrime($test_number){
        $result = Factors::isPrime($test_number);
        $this->assertTrue($result);
    }

    /**
     * @dataProvider nonPrimeNumberProvider()
     * @param int $test_number
     */
    public function testNotIsPrime($test_number){
        $result = Factors::isPrime($test_number);
        $this->assertFalse($result);
    }
}