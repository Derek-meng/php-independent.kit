<?php

namespace Independent\Kit\Network\Curl\Request;

class PatchRequest extends AbstractMethodRequest
{
    /**
     * @inheritdoc
     */
    public function encodeParams()
    {
        curl_setopt($this->curl->getCurl(), CURLOPT_POSTFIELDS, json_encode($this->curl->getOriginParams()));

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setOptions()
    {
        curl_setopt($this->curl->getCurl(), CURLOPT_CUSTOMREQUEST, "PATCH");

        return $this;
    }
}
