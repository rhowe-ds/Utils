<?php

namespace tests\rhowe\StringFunctions;

use rhowe\StringFunctions\StringUtility;
use PHPUnit\Framework\TestCase;

class StringUtilityTest extends TestCase {

    public function csvToAssociativeArrayDataProvider() {
        return [
            [
                /* input, expected */
                [
                    'Make,Model,Description,Model_Code,Model#,12-35,36-47,48-59,60+,12-24,27,36,39,42,48,60,Admin Fee' . "\r\n",
                    ',,4dr Wgn Limited V6,\'8648,820224,7.34%,6.29%,6.24%,5.89%,71,69,64,63,61,58,50,$595' . "\r\n",
                    ',,4dr Wgn SR5 Premium V6,\'8646,820224,7.34%,6.29%,6.24%,5.89%,72,70,65,64,62,59,51,$595' . "\r\n"
                ],
                [
                    [
                        'Make' => '',
                        'Model' => '',
                        'Description' => '4dr Wgn Limited V6',
                        'Model_Code' => '\'8648',
                        'Model#' => '820224',
                        '12-35' => '7.34%',
                        '36-47' => '6.29%',
                        '48-59' => '6.24%',
                        '60+' => '5.89%',
                        '12-24' => '71',
                        '27' => '69',
                        '36' => '64',
                        '39' => '63',
                        '42' => '61',
                        '48' => '58',
                        '60' => '50',
                        'Admin Fee' => '$595'
                    ],
                    [
                        'Make' => '',
                        'Model' => '',
                        'Description' => '4dr Wgn SR5 Premium V6',
                        'Model_Code' => '\'8646',
                        'Model#' => '820224',
                        '12-35' => '7.34%',
                        '36-47' => '6.29%',
                        '48-59' => '6.24%',
                        '60+' => '5.89%',
                        '12-24' => '72',
                        '27' => '70',
                        '36' => '65',
                        '39' => '64',
                        '42' => '62',
                        '48' => '59',
                        '60' => '51',
                        'Admin Fee' => '$595'
                    ]
                ]
            ]
        ];
    }

    public function uniqueIndexValuesDataProvider() {
        return [
            [
                /* input, expected */
                [
                    'row',
                    'row',
                    'row',
                    'test',
                    'row'
                ],
                [
                    'row',
                    'row1',
                    'row2',
                    'test',
                    'row3'
                ]
            ],
            [
                /* input, expected */
                [
                    'row',
                    'row',
                    'row',
                    'row',
                    'row'
                ],
                [
                    'row',
                    'row1',
                    'row2',
                    'row3',
                    'row4'
                ]
            ],
            [
                [
                    'Make',
                    'Model',
                    'Description',
                    'Model_Code',
                    'Model#',
                    '12-35',
                    '36-47',
                    '48-59',
                    '60+',
                    '12-24',
                    '27',
                    '36',
                    '39',
                    '42',
                    '48',
                    '60',
                    'Admin Fee'
                ],
                [
                    'Make',
                    'Model',
                    'Description',
                    'Model_Code',
                    'Model#',
                    '12-35',
                    '36-47',
                    '48-59',
                    '60+',
                    '12-24',
                    '27',
                    '36',
                    '39',
                    '42',
                    '48',
                    '60',
                    'Admin Fee'
                ],
            ],
            [
                [
                    'test',
                    'test1',
                    'test',
                    'test2',
                    'test',
                    'test1'
                ],
                [
                    'test',
                    'test1',
                    'test11',
                    'test2',
                    'test21',
                    'test111'
                ]
            ]
        ];
    }

    public function checkSecondTierModelCodeDataProvider() {
        return [
            /* input, expected */
            ['2 Series', false], ['3 Series', false], ['4 Series', false], ['5 Series', false],
            ['6 Series', true], ['7 Series', true], ['8 Series', true],
            ['B6', true], ['B7', true],
            ['i3', false], ['i8', true],
            ['M2', true], ['M4', true], ['M5', true], ['M6', true],
            ['X1', false], ['X2', false], ['X3', false], ['X4', false], ['X5', false],
            ['X6', true], ['X7', true],
            ['Z4', false]
        ];
    }

    /**
     * @test
     * @dataProvider csvToAssociativeArrayDataProvider
     * @param array $input
     * @param array $expected
     * @throws \Exception
     */
    public function csvToAssociativeArray(array $input, array $expected) {
        $actual = StringUtility::csvToAssociativeArray($input);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider uniqueIndexValuesDataProvider
     * @param array $input
     * @param array $expected
     * @throws \Exception
     */
    public function uniqueIndexValues(array $input, array $expected) {
        $actual = StringUtility::uniqueIndexValues($input);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @dataProvider checkSecondTierModelCodeDataProvider
     * @param string $input
     * @param bool $expected
     */
    public function checkSecondTierModelCode(string $input, bool $expected) {
        $actual = StringUtility::checkSecondTierModelCode($input);
        $this->assertEquals($expected, $actual);
    }
}
