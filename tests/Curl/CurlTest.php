<?php

namespace Independent\Kit\Tests\Curl;

use Independent\Kit\Network\Curl\Curl;
use Independent\Kit\Network\Curl\HttpPostFieldsBuilder;
use Independent\Kit\Test2;
use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    public function testGet()
    {
        $this->assertTrue(true);
        $client = new Curl();
        $response = $client->get('http://derek.app.dev.com', [
            'name'  => 'derek',
            'ids'   => [1, 2, 3, 4],
            'layer' => [
                'name'  => [
                    'name'  => 'clone',
                    'name1' => 'clone1',
                    'name2' => 'clone2',
                ],
                'name1' => 'clone1',
                'name2' => 'clone2',
            ]
        ]);
        var_export($response->all());
        /** assert */
        $this->assertTrue($response->isSuccess());
        $this->assertTrue(is_string($response->body()));
    }

    public function testPost()
    {
        $postFields = [
            'name'  => 'derek',
            'ids'   => [1, 2, 3, 4],
            'layer' => [
                'name'  => [
                    'name'  => 'clone',
                    'name1' => 'clone1',
                    'name2' => 'clone2',
                ],
                'name1' => 'clone1',
                'name2' => 'clone2',
            ]
        ];
        $url = 'http://derek.app.dev.com/post_test';
        $client = new Curl();
        $response = $client->post($url, $postFields, [], true);
        var_export($response->all());
        /** assert */
        $this->assertTrue($response->isSuccess());
        $this->assertTrue(is_string($response->body()));
        $response = $client->post($url, $postFields);
        var_export($response->all());
        /** assert */
        $this->assertTrue($response->isSuccess());
        $this->assertTrue(is_string($response->body()));
    }

    public function testPostJson()
    {
        $postFields = [
            'name'  => 'derek',
            'ids'   => [1, 2, 3, 4],
            'layer' => [
                'name'  => [
                    'name'  => 'clone',
                    'name1' => 'clone1',
                    'name2' => 'clone2',
                ],
                'name1' => 'clone1',
                'name2' => 'clone2',
            ]
        ];
        $url = 'http://derek.app.dev.com/post_test';
        $client = new Curl();
        $response = $client->postJson($url, $postFields);
        var_export($response->all());
        /** assert */
        $this->assertTrue($response->isSuccess());
        $this->assertTrue(is_string($response->body()));
    }

    public function testPostXML()
    {
        $postFields = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;
        $url = 'http://derek.app.dev.com/post_test';
        $client = new Curl();
        $response = $client->postXML($url, $postFields);
        var_export($response->all());
        /** assert */
        $this->assertTrue($response->isSuccess());
        $this->assertTrue(is_string($response->body()));
    }

    public function testFieldBuilder()
    {
        var_export($expected = $result = HttpPostFieldsBuilder::toCurlFields([
            'name'  => 'derek',
            'ids'   => [1, 2, 3, 4],
            'layer' => [
                'name'  => [
                    'name'  => 'clone',
                    'name1' => 'clone1',
                    'name2' => 'clone2',
                ],
                'name1' => 'clone1',
                'name2' => 'clone2',
            ]
        ]));
        /** act */
        // 實際值
        $actual = [
            'name'               => 'derek',
            'ids[0]'             => 1,
            'ids[1]'             => 2,
            'ids[2]'             => 3,
            'ids[3]'             => 4,
            'layer[name][name]'  => 'clone',
            'layer[name][name1]' => 'clone1',
            'layer[name][name2]' => 'clone2',
            'layer[name1]'       => 'clone1',
            'layer[name2]'       => 'clone2',
        ];
        /** assert */
        $this->assertEquals($expected, $actual);
    }
}
