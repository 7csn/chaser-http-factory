<?php

declare(strict_types=1);

namespace chaser\http\message;

use Psr\Http\Message\{ServerRequestFactoryInterface, UriInterface};

/**
 * http 服务端接收请求工厂类
 *
 * @package chaser\http\message
 */
class ServerRequestFactory implements ServerRequestFactoryInterface
{
    /**
     * 创建新的服务端接收请求
     *
     * @param string $method
     * @param UriInterface|string $uri
     * @param array $serverParams
     * @return ServerRequest
     */
    public function createServerRequest(string $method, $uri, array $serverParams = []): ServerRequest
    {
        if (!$uri instanceof UriInterface) {
            $uri = new Uri((string)$uri);
        }
        return new ServerRequest($method, $uri, $serverParams);
    }
}
