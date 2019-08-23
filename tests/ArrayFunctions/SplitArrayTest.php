<?php

namespace tests\rhowe\ArrayFunctions;

use rhowe\ArrayFunctions\SplitArray;
use PHPUnit\Framework\TestCase;

class ArraySplitTest extends TestCase{

    public function splitRoundRobinDataProvider(): array {
        return [
            [1, [1,2,3,4,5,6,7,8,9,10],[[1,2,3,4,5,6,7,8,9,10]]],
            [10, [1,2,3,4,5,6,7,8,9,10],[[1],[2],[3],[4],[5],[6],[7],[8],[9],[10]]],
            [5, [1,2,3,4,5,6,7,8,9,10],[[1,2],[3,4],[5,6],[7,8],[9,10]]],
            [5, [1,2,3,4,5,6,7,8,9,10,11],[[1,2,3],[4,5],[6,7],[8,9],[10,11]]],
            [10, [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],[[1,2],[3,4],[5,6],[7,8],[9,10], [11,12], [13,14], [15,16], [17,18],[19,20]]],
            [5, [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],[[1,2,3,4],[5,6,7,8],[9,10,11,12], [13,14,15,16], [17,18,19,20]]],
        ];
    }

    public function splitMostEventDataProvider(): array {
        return [
            [1, [1,2,3,4,5,6,7,8,9,10],[[1,2,3,4,5,6,7,8,9,10]]],
            [10, [1,2,3,4,5,6,7,8,9,10],[[1],[2],[3],[4],[5],[6],[7],[8],[9],[10]]],
            [5, [1,2,3,4,5,6,7,8,9,10],[[1,2],[3,4],[5,6],[7,8],[9,10]]],
            [5, [1,2,3,4,5,6,7,8,9,10,11],[[1,2],[3,4],[5,6],[7,8],[9,10,11]]],
            [10, [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],[[1,2],[3,4],[5,6],[7,8],[9,10], [11,12], [13,14], [15,16], [17,18],[19,20]]],
            [5, [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20],[[1,2,3,4],[5,6,7,8],[9,10,11,12], [13,14,15,16], [17,18,19,20]]],
        ];
    }

    /**
     * @dataProvider splitRoundRobinDataProvider()
     * @test
     */
    public function testSplitRoundRobin($nodes, $sourceArray, $expectedArray){
        $result = SplitArray::splitRoundRobin($nodes, $sourceArray);
        $this->assertEquals($expectedArray, $result);
    }

        /**
     * @dataProvider splitMostEventDataProvider()
     * @test
     */
    public function testSplitMostEvent($nodes, $sourceArray, $expectedArray){
        $result = SplitArray::splitMostEvent($nodes, $sourceArray);
        $this->assertEquals($expectedArray, $result);
    }
}