<?php

declare(strict_types=1);

namespace chaser\http\message;

use Psr\Http\Message\{RequestFactoryInterface, UriInterface};

/**
 * http 客户端请求工厂
 *
 * @package chaser\http\message
 */
class RequestFactory implements RequestFactoryInterface
{
    /**
     * 创建新的客户端请求
     *
     * @param string $method
     * @param UriInterface|string $uri
     * @return Request
     */
    public function createRequest(string $method, $uri): Request
    {
        if (!$uri instanceof UriInterface) {
            $uri = new Uri((string)$uri);
        }
        return new Request($method, $uri);
    }
}
