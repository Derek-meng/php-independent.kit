<?php

namespace Independent\Kit\Network\Curl\Params;

use Independent\Kit\Contract\Params\IPostEncoder;
use Independent\Kit\Traits\Pattern\Singleton;

abstract class AbstractPostEncoder implements IPostEncoder
{
    use Singleton;

    /**
     * Initialize class.
     * @param array $parameters
     */
    protected function init(...$parameters)
    {
    }

    /**
     * @inheritdoc
     */
    public function encode($params)
    {
        return $params;
    }
}
