<?php

namespace Independent\Kit\Network\Curl\Params;

use Independent\Kit\Constants\ContentTypeConstants;
use Independent\Kit\Contract\Params\IPostEncoder;
use Independent\Kit\Traits\Pattern\Factory;

/**
 * Class PostEncoderFactory
 * @package Independent\Kit\Network\Curl\Params
 * @method static IPostEncoder make(string $key, array $parameters = [])
 */
class PostEncoderFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            ContentTypeConstants::JSON              => JsonEncoder::class,
            ContentTypeConstants::BINARY_XML        => BinaryXMLEncoder::class,
            ContentTypeConstants::TEXT_XML          => TextXMLEncoder::class,
            ContentTypeConstants::TEXT_PLAIN        => TextPlainEncoder::class,
            ContentTypeConstants::TEXT_HTML         => TextHTMLEncoder::class,
            ContentTypeConstants::X_FORM_URLENCODED => XFormUrlEncoder::class,
        ];
    }

    /**
     * @inheritdoc
     */
    protected static function initMethodName()
    {
        return 'getInstance';
    }

    /**
     * @inheritdoc
     */
    protected static function defaultConcrete()
    {
        return SimpleEncoder::class;
    }
}
