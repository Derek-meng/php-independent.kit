<?php

namespace Independent\Kit\Network\Curl\Params;

use Independent\Kit\Network\Curl\HttpPostFieldsBuilder;

class SimpleEncoder extends AbstractPostEncoder
{
    /**
     * @inheritdoc
     */
    public function encode($params)
    {
        return HttpPostFieldsBuilder::toCurlFields($params);
    }
}
