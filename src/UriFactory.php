<?php

declare(strict_types=1);

namespace chaser\http\message;

use Psr\Http\Message\UriFactoryInterface;

/**
 * URI 工厂
 *
 * @package chaser\http\message
 */
class UriFactory implements UriFactoryInterface
{
    /**
     * 创建新的 URI
     *
     * @param string $uri
     * @return Uri
     */
    public function createUri(string $uri = ''): Uri
    {
        return new Uri($uri);
    }
}
