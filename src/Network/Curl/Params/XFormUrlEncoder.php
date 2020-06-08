<?php

namespace Independent\Kit\Network\Curl\Params;

use Independent\Kit\Utils\URLUtil;

class XFormUrlEncoder extends AbstractPostEncoder
{
    /**
     * @inheritdoc
     */
    public function encode($params)
    {
        return URLUtil::queryEncode($params);
    }
}
