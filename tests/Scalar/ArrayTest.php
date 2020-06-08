<?php

namespace Independent\Kit\Tests\Scalar;

use Independent\Kit\Support\Scalar\ArrayMaster;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    public function testFirst()
    {
        $arr = [2, 3, 4];
        $this->assertTrue(2 == ArrayMaster::first($arr));
    }

    public function testExplode()
    {
        $arr = '123,223';
        $ex = ArrayMaster::explode($arr);
        var_dump($ex);
        $this->assertTrue(ArrayMaster::isListOrEmpty($ex));
    }
}
