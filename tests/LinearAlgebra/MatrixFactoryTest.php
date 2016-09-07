<?php
namespace MathPHP\LinearAlgebra;

class MatrixFactorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderForDiagonalMatrix
     */
    public function testCreateDiagonalMatrix(array $A)
    {
        $A = MatrixFactory::create($A);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\DiagonalMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForDiagonalMatrix()
    {
        return [
            [[1]],
            [[1, 2]],
            [[1, 2, 3]],
            [[1, 2, 3, 4]],
        ];
    }

    /**
     * @dataProvider dataProviderForSquareMatrix
     */
    public function testCreateSquareMatrix(array $A)
    {
        $A = MatrixFactory::create($A);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\SquareMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForSquareMatrix()
    {
        return [
            [
                [[1]]
            ],
            [
                [
                    [1, 2],
                    [2, 3],
                ],
            ],
            [
                [
                    [1, 2, 3],
                    [3, 4, 5],
                    [5, 6, 7],
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForVandermondeSquareMatrix
     */
    public function testCreateVandermondeSquareMatrix(array $A, $n)
    {
        $A = MatrixFactory::create($A, $n);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\VandermondeSquareMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\SquareMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForVandermondeSquareMatrix()
    {
        return [
            [
                [1],
                1,
            ],
            [
                [1, 2],
                2
            ],
            [
                [3, 2, 5],
                3,
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForVandermondeMatrix
     */
    public function testCreateVandermondeMatrix(array $A, $n)
    {
        $A = MatrixFactory::create($A, $n);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\VandermondeMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForVandermondeMatrix()
    {
        return [
            [
                [1],
                2,
            ],
            [
                [1, 2],
                1
            ],
            [
                [1, 2],
                3
            ],
            [
                [3, 2, 5],
                5,
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForFunctionSquareMatrix
     */
    public function testCreateFunctionSquareMatrix(array $A)
    {
        $A = MatrixFactory::create($A);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\FunctionSquareMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\SquareMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForFunctionSquareMatrix()
    {
        $function = function ($x) {
            return $x * 2;
        };

        return [
            [
                [
                    [$function]
                ]
            ],
            [
                [
                    [$function, $function],
                    [$function, $function],
                ],
            ],
            [
                [
                    [$function, $function, $function],
                    [$function, $function, $function],
                    [$function, $function, $function],
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForFunctionMatrix
     */
    public function testCreateFunctionMatrix(array $A)
    {
        $A = MatrixFactory::create($A);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\FunctionMatrix', $A);
        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);
    }

    public function dataProviderForFunctionMatrix()
    {
        $function = function ($x) {
            return $x * 2;
        };

        return [
            [
                [
                    [$function, $function]
                ]
            ],
            [
                [
                    [$function, $function],
                    [$function, $function],
                    [$function, $function],
                ],
            ],
            [
                [
                    [$function, $function, $function],
                    [$function, $function, $function],
                    [$function, $function, $function],
                    [$function, $function, $function],
                ],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForMatrix
     */
    public function testCreateMatrix(array $A)
    {
        $A = MatrixFactory::create($A);

        $this->assertInstanceOf('MathPHP\LinearAlgebra\Matrix', $A);

        $this->assertNotInstanceOf('MathPHP\LinearAlgebra\SquareMatrix', $A);
        $this->assertNotInstanceOf('MathPHP\LinearAlgebra\FunctionMatrix', $A);
        $this->assertNotInstanceOf('MathPHP\LinearAlgebra\VandermondeMatrix', $A);
        $this->assertNotInstanceOf('MathPHP\LinearAlgebra\DiagonalMatrix', $A);
    }

    public function dataProviderForMatrix()
    {
        return [
            [
                [
                    [1, 2, 3],
                    [2, 3, 4],
                ],
            ],
            [
                [
                    [1, 2, 3],
                    [2, 3, 4],
                    [3, 4, 5],
                    [4, 5, 6],
                ],
            ],
        ];
    }

    public function testCheckParamsExceptionEmptyArray()
    {
        $A = [];

        $this->setExpectedException('\Exception');
        $M = MatrixFactory::create($A);
    }

    public function testMatrixUnknownTypeException()
    {
        $A = [
            [[1], [2], [3]],
            [[2], [3], [4]],
        ];

        $this->setExpectedException('\Exception');
        MatrixFactory::create($A);
    }

    /**
     * @dataProvider dataProviderForIdentity
     */
    public function testIdentity(int $n, $x, array $R)
    {
        $R = new SquareMatrix($R);
        $this->assertEquals($R, MatrixFactory::identity($n, $x));
    }

    public function dataProviderForIdentity()
    {
        return [
            [
                1, 1, [[1]],
            ],
            [
                2, 1, [
                    [1, 0],
                    [0, 1],
                ]
            ],
            [
                3, 1, [
                    [1, 0, 0],
                    [0, 1, 0],
                    [0, 0, 1]
                ]
            ],
            [
                4, 1, [
                    [1, 0, 0, 0],
                    [0, 1, 0, 0],
                    [0, 0, 1, 0],
                    [0, 0, 0, 1],
                ]
            ],
            [
                4, 5, [
                    [5, 0, 0, 0],
                    [0, 5, 0, 0],
                    [0, 0, 5, 0],
                    [0, 0, 0, 5],
                ]
            ],

        ];
    }

    public function testIdentityExceptionNLessThanZero()
    {
        $this->setExpectedException('\Exception');
        MatrixFactory::identity(-1);
    }


    /**
     * @dataProvider dataProviderForZero
     */
    public function testZero($m, $n, array $R)
    {
        $R = MatrixFactory::create($R);
        $this->assertEquals($R, MatrixFactory::zero($m, $n));
    }

    public function dataProviderForZero()
    {
        return [
            [
                1, 1, [[0]]
            ],
            [
                2, 2, [
                    [0, 0],
                    [0, 0],
                ]
            ],
            [
                3, 3, [
                    [0, 0, 0],
                    [0, 0, 0],
                    [0, 0, 0],
                ]
            ],
            [
                2, 3, [
                    [0, 0, 0],
                    [0, 0, 0],
                ]
            ],
            [
                3, 2, [
                    [0, 0],
                    [0, 0],
                    [0, 0],
                ]
            ]
        ];
    }

    public function testZeroExceptionRowsLessThanOne()
    {
        $this->setExpectedException('\Exception');
        MatrixFactory::zero(0, 2);
    }

    /**
     * @dataProvider dataProviderForOne
     */
    public function testOne($m, $n, array $R)
    {
        $R = MatrixFactory::create($R);
        $this->assertEquals($R, MatrixFactory::one($m, $n));
    }

    public function dataProviderForOne()
    {
        return [
            [
                1, 1, [[1]]
            ],
            [
                2, 2, [
                    [1, 1],
                    [1, 1],
                ]
            ],
            [
                3, 3, [
                    [1, 1, 1],
                    [1, 1, 1],
                    [1, 1, 1],
                ]
            ],
            [
                2, 3, [
                    [1, 1, 1],
                    [1, 1, 1],
                ]
            ],
            [
                3, 2, [
                    [1, 1],
                    [1, 1],
                    [1, 1],
                ]
            ]
        ];
    }

    public function testOneExceptionRowsLessThanOne()
    {
        $this->setExpectedException('\Exception');
        MatrixFactory::one(0, 2);
    }
}
