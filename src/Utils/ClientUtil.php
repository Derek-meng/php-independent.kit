<?php

namespace Independent\Kit\Utils;

use Independent\Kit\Support\Scalar\ArrayMaster;

class ClientUtil
{
    /**
     * Get the real client ip.
     * @param string|null $customize
     * @return string
     */
    public static function ip(string $customize = null)
    {
        $result = $customize;
        if (isset($_SERVER) && !empty($_SERVER['REMOTE_ADDR'])) {
            $result = $_SERVER['REMOTE_ADDR'];
        } else {
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $forwardIps = ArrayMaster::explode($_SERVER['HTTP_X_FORWARDED_FOR']);
                if (ArrayMaster::isList($forwardIps)) {
                    $result = ArrayMaster::first($forwardIps);
                }
            }
        }

        return $result;
    }
}
