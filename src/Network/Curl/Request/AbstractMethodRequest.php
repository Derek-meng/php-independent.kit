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

    public function __construct(...$parameters)
    {
        $this->init(...$parameters);
    }

    protected function init(...$parameters)
    {
        foreach ($parameters as $parameter) {
            if ($parameter instanceof  Curl) {
                $this->curl= $parameter;
            }
        }
    }
}
