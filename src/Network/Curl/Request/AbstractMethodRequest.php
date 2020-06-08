<?php

namespace Independent\Kit\Network\Curl\Request;

use Independent\Kit\Contract\IHttpMethodRequest;
use Independent\Kit\Network\Curl\Curl;
use Independent\Kit\Traits\Pattern\Singleton;

abstract class AbstractMethodRequest implements IHttpMethodRequest
{
    use Singleton;

    /**
     * @var Curl
     */
    protected $curl;

    protected function init(Curl $curl)
    {
        $this->curl = $curl;
    }
}
