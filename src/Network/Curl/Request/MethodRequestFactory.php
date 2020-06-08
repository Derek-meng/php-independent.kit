<?php

namespace Independent\Kit\Network\Curl\Request;

use Independent\Kit\Constants\HttpMethodConstants;
use Independent\Kit\Contract\IHttpMethodRequest;
use Independent\Kit\Traits\Pattern\Factory;

/**
 * Class MethodRequestFactory
 * @package Independent\Kit\Network\Curl\Request
 * @method static IHttpMethodRequest make(string $key, array $parameters = [])
 */
class MethodRequestFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            HttpMethodConstants::GET    => GetRequest::class,
            HttpMethodConstants::POST   => PostRequest::class,
            HttpMethodConstants::PUT    => PutRequest::class,
            HttpMethodConstants::PATCH  => PatchRequest::class,
            HttpMethodConstants::DELETE => DeleteRequest::class,
        ];
    }

    /**
     * If want to use static init method by your self , please override this method ant return method string name.
     * @return null|string
     */
    protected static function initMethodName()
    {
        return 'getInstance';
    }
}
