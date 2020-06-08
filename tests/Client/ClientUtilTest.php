<?php

namespace Independent\Kit\Tests\Client;

use Independent\Kit\Utils\ClientUtil;
use PHPUnit\Framework\TestCase;

class ClientUtilTest extends TestCase
{
    public function testIp()
    {
        $this->assertSame('5.5.5.5', ClientUtil::ip('5.5.5.5'));
    }
}
