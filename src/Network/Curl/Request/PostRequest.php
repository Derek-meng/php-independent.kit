<?php

namespace Independent\Kit\Network\Curl\Request;

use Independent\Kit\Contract\Params\IPostEncoder;
use Independent\Kit\Network\Curl\Curl;
use Independent\Kit\Network\Curl\Params\PostEncoderFactory;

class PostRequest extends AbstractMethodRequest
{

    /**
     * @inheritdoc
     */
    public function encodeParams()
    {
        $payload = PostEncoderFactory::make($this->curl->getContentType())->encode($this->curl->getOriginParams());
        $this->curl->setActualParams($payload);
        curl_setopt($this->curl->getCurl(), CURLOPT_POSTFIELDS, $payload);

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setOptions()
    {
        curl_setopt($this->curl->getCurl(), CURLOPT_POST, true);

        return $this;
    }
}
