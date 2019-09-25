<?php

namespace tests\rhowe\ArrayFunctions;

use rhowe\ArrayFunctions\SplitArray;
use PHPUnit\Framework\TestCase;

class SplitArrayTest extends TestCase {

    public function mostEvenDataProvider(): array {
        return [
            [5, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2, 3], [4, 5], [6, 7], [8, 9], [10, 11]]],
            [2, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2, 3, 4, 5, 6], [7, 8, 9, 10, 11]]],
            [3, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11]]],
        ];
    }

    public function maxEvenDistributionDataProvider(): array {
        return [
            [5, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10, 11]]],
            [2, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2, 3, 4, 5], [6, 7, 8, 9, 10, 11]]],
            [3, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11], [[1, 2, 3, 4, 5], [6, 7, 8, 9, 10], [11]]],
        ];
    }

    public function bothEvenDistributionDataProvider(): array {
        return [
            [1, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]]],
            [5, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10]]],
            [10, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], [[1], [2], [3], [4], [5], [6], [7], [8], [9], [10]]],

            [3, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]]],

            [1, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]]],
            [2, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10], [11, 12, 13, 14, 15, 16, 17, 18, 19, 20]]],
            [5, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12], [13, 14, 15, 16], [17, 18, 19, 20]]],
            [10, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], [[1, 2], [3, 4], [5, 6], [7, 8], [9, 10], [11, 12], [13, 14], [15, 16], [17, 18], [19, 20]]],
            [20, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], [[1], [2], [3], [4], [5], [6], [7], [8], [9], [10], [11], [12], [13], [14], [15], [16], [17], [18], [19], [20]]],
        ];
    }

    /**
     * @dataProvider mostEvenDataProvider()
     * @dataProvider bothEvenDistributionDataProvider()
     * @test
     * @param $nodes
     * @param $sourceArray
     * @param $expectedArray
     */
    public function testMostEvenDistribution($nodes, $sourceArray, $expectedArray) {
        $result = SplitArray::mostEvenDistribution($nodes, $sourceArray);
        $this->assertEquals($expectedArray, $result);
    }

    /**
     * @dataProvider maxEvenDistributionDataProvider()
     * @dataProvider bothEvenDistributionDataProvider()
     * @test
     * @param $nodes
     * @param $sourceArray
     * @param $expectedArray
     */
    public function testMaxEvenDistribution($nodes, $sourceArray, $expectedArray) {
        $result = SplitArray::maxEvenDistribution($nodes, $sourceArray);
        $this->assertEquals($expectedArray, $result);
    }
}