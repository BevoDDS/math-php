<?php
namespace MathPHP\Statistics;

class ANOVATest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForOneWayWithTreeSamples
     */
    public function testOneWayWithThreeSamples(array $sample1, array $sample2, array $sample3, array $expected)
    {
        $anova = ANOVA::oneWay($sample1, $sample2, $sample3);

        $this->assertEquals($expected, $anova, '', 0.0001);
    }

    public function dataProviderForOneWayWithTreeSamples()
    {
        return [
            [
                [1, 2, 3],
                [3, 4, 5],
                [5, 6, 7],
                [
                    'ANOVA' => [
                        'treatment' => [
                            'SS' => 24,
                            'df' => 2,
                            'MS' => 12,
                            'F'  => 12,
                            'P'  => 0.008,
                        ],
                        'error' => [
                            'SS' => 6,
                            'df' => 6,
                            'MS' => 1,
                        ],
                        'total' => [
                            'SS' => 30,
                            'df' => 8,
                        ],
                    ],
                    'total_summary' => [
                        'n'        => 9,
                        'sum'      => 36,
                        'mean'     => 4,
                        'SS'       => 174,
                        'variance' => 3.75,
                        'sd'       => 1.9365,
                        'sem'      => 0.6455,
                    ],
                    'data_summary' => [
                        0 => [
                            'n'        => 3,
                            'sum'      => 6,
                            'mean'     => 2,
                            'SS'       => 14,
                            'variance' => 1,
                            'sd'       => 1,
                            'sem'      => 0.5774,
                        ],
                        1 => [
                            'n'        => 3,
                            'sum'      => 12,
                            'mean'     => 4,
                            'SS'       => 50,
                            'variance' => 1,
                            'sd'       => 1,
                            'sem'      => 0.5774,
                        ],
                        2 => [
                            'n'        => 3,
                            'sum'      => 18,
                            'mean'     => 6,
                            'SS'       => 110,
                            'variance' => 1,
                            'sd'       => 1,
                            'sem'      => 0.5774,
                        ],
                    ],
                ],
            ],
            [
                [6, 8, 4, 5, 3, 4],
                [8, 12, 9, 11, 6, 8],
                [13, 9, 11, 8, 7, 12],
                [
                    'ANOVA' => [
                        'treatment' => [
                            'SS' => 84,
                            'df' => 2,
                            'MS' => 42,
                            'F'  => 9.26477400569122,
                            'P'  => 0.002404,
                        ],
                        'error' => [
                            'SS' => 68,
                            'df' => 15,
                            'MS' => 4.5333,
                        ],
                        'total' => [
                            'SS' => 152,
                            'df' => 17,
                        ],
                    ],
                    'total_summary' => [
                        'n'        => 18,
                        'sum'      => 144,
                        'mean'     => 8,
                        'SS'       => 1304,
                        'variance' => 8.9412,
                        'sd'       => 2.9902,
                        'sem'      => 0.7048,
                    ],
                    'data_summary' => [
                        0 => [
                            'n'        => 6,
                            'sum'      => 30,
                            'mean'     => 5,
                            'SS'       => 166,
                            'variance' => 3.2,
                            'sd'       => 1.7889,
                            'sem'      => 0.7303,
                        ],
                        1 => [
                            'n'        => 6,
                            'sum'      => 54,
                            'mean'     => 9,
                            'SS'       => 510,
                            'variance' => 4.8,
                            'sd'       => 2.1909,
                            'sem'      => 0.8944,
                        ],
                        2 => [
                            'n'        => 6,
                            'sum'      => 60,
                            'mean'     => 10,
                            'SS'       => 628,
                            'variance' => 5.6,
                            'sd'       => 2.3664,
                            'sem'      => 0.9661,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForOneWayWithFourSamples
     */
    public function testOneWayWithFourSamples(array $sample1, array $sample2, array $sample3, array $sample4, array $expected)
    {
        $anova = ANOVA::oneWay($sample1, $sample2, $sample3, $sample4);

        $this->assertEquals($expected, $anova, '', 0.0001);
    }

    public function dataProviderForOneWayWithFourSamples()
    {
        return [
            [
                [0.28551035, 0.338524035, 0.088313218, 0.205930807, 0.363240102],
                [0.52173913, 0.763358779, 0.32546786, 0.425305688, 0.378071834],
                [0.989119683, 1.192718142, 0.788288288, 0.549176236, 0.544588155],
                [1.26705653, 1.625320787, 1.266108976, 1.154187629, 1.268498943],
                [
                    'ANOVA' => [
                        'treatment' => [
                            'SS' => 3.176758,
                            'df' => 3,
                            'MS' => 1.058919,
                            'F'  => 27.5254,
                            'P'  => 1.4876e-06,
                        ],
                        'error' => [
                            'SS' => 0.615529,
                            'df' => 16,
                            'MS' => 0.038471,
                        ],
                        'total' => [
                            'SS' => 3.792287,
                            'df' => 19,
                        ],
                    ],
                    'total_summary' => [
                        'n'        => 20,
                        'sum'      => 14.340525,
                        'mean'     => 0.717026,
                        'SS'       => 14.07482,
                        'variance' => 0.199594,
                        'sd'       => 0.446759,
                        'sem'      => 0.099898,
                    ],
                    'data_summary' => [
                        0 => [
                            'n'        => 5,
                            'sum'      => 1.281519,
                            'mean'     => 0.256304,
                            'SS'       => 0.378265,
                            'variance' => 0.012452,
                            'sd'       => 0.111587,
                            'sem'      => 0.049903,
                        ],
                        1 => [
                            'n'        => 5,
                            'sum'      => 2.413943,
                            'mean'     => 0.482789,
                            'SS'       => 1.284681,
                            'variance' => 0.029814,
                            'sd'       => 0.172668,
                            'sem'      => 0.077219,
                        ],
                        2 => [
                            'n'        => 5,
                            'sum'      => 4.063891,
                            'mean'     => 0.812778,
                            'SS'       => 3.620504,
                            'variance' => 0.079366,
                            'sd'       => 0.281719,
                            'sem'      => 0.125989,
                        ],
                        3 => [
                            'n'        => 5,
                            'sum'      => 6.581173,
                            'mean'     => 1.316235,
                            'SS'       => 8.791371,
                            'variance' => 0.032251,
                            'sd'       => 0.179585,
                            'sem'      => 0.080313,
                        ],
                    ],
                ],
            ],
        ];
    }

    public function testOneWayExceptionLessThanThreeSamples()
    {
        $sample1 = [1, 2, 3];
        $sample2 = [3, 4, 5];

        $this->setExpectedException('\Exception');
        ANOVA::oneWay($sample1, $sample2);
    }

    public function testOneWayExceptionDifferentSampleSizes()
    {
        $sample1 = [1, 2, 3];
        $sample2 = [3, 4, 5, 6];
        $sample3 = [5, 6, 7, 8, 9];

        $this->setExpectedException('\Exception');
        ANOVA::oneWay($sample1, $sample2, $sample3);
    }

    /**
     * @dataProvider dataProviderForOneWayAxiomsThreeSamples
     */
    public function testOneWayAxiomsThreeSamples(array $sample1, array $sample2, array $sample3)
    {
        $anova = ANOVA::oneWay($sample1, $sample2, $sample3);

        // SST = SSB + SSW
        $SST = $anova['ANOVA']['total']['SS'];
        $SSB = $anova['ANOVA']['treatment']['SS'];
        $SSW = $anova['ANOVA']['error']['SS'];
        $this->assertEquals($SST, $SSB + $SSW);

        // dfT = dfB + dfW
        $dfT = $anova['ANOVA']['total']['df'];
        $dfB = $anova['ANOVA']['treatment']['df'];
        $dfW = $anova['ANOVA']['error']['df'];
        $this->assertEquals($dfT, $dfB + $dfW);
    }

    public function dataProviderForOneWayAxiomsThreeSamples()
    {
        return [
            [
                [1, 2, 3],
                [3, 4, 5],
                [5, 6, 7],
            ],
            [
                [4, 5, 3, 6, 5],
                [5, 4, 3, 4, 4],
                [7, 6, 6, 5, 6],
            ],
            [
                [-4, 4, 5, 6, 7],
                [-5, 4, 6, 6, 7],
                [0, 1, 2, 3, 4],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForOneWayAxiomsFiveSamples
     */
    public function testOneWayAxiomsFiveSamples(array $sample1, array $sample2, array $sample3, array $sample4, array $sample5)
    {
        $anova = ANOVA::oneWay($sample1, $sample2, $sample3, $sample4, $sample5);

        // SST = SSB + SSW
        $SST = $anova['ANOVA']['total']['SS'];
        $SSB = $anova['ANOVA']['treatment']['SS'];
        $SSW = $anova['ANOVA']['error']['SS'];
        $this->assertEquals($SST, $SSB + $SSW);

        // dfT = dfB + dfW
        $dfT = $anova['ANOVA']['total']['df'];
        $dfB = $anova['ANOVA']['treatment']['df'];
        $dfW = $anova['ANOVA']['error']['df'];
        $this->assertEquals($dfT, $dfB + $dfW);
    }

    public function dataProviderForOneWayAxiomsFiveSamples()
    {
        return [
            [
                [1, 2, 3],
                [3, 4, 5],
                [5, 6, 7],
                [7, 8, 9],
                [9, 10, 11],
            ],
            [
                [4, 5, 3, 6, 5],
                [5, 4, 3, 4, 4],
                [7, 6, 6, 5, 6],
                [5, 6, 6, 5, 4],
                [8, 7, 7, 6, 7],
            ],
            [
                [-4, 4, 5, 6, 7],
                [-5, 4, 6, 6, 7],
                [0, 1, 2, 3, 4],
                [-2, -1, -1, 4, 5],
                [5, 5, 5, 5, 5],
            ],
        ];
    }
}
