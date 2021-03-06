<?php

declare(strict_types=1);

namespace chaser\http\message;

use Psr\Http\Message\ResponseFactoryInterface;

/**
 * http 服务端响应工厂类
 *
 * @package chaser\http\message
 */
class ResponseFactory implements ResponseFactoryInterface
{
    /**
     * 创建新的服务端响应
     *
     * @param int $code
     * @param string $reasonPhrase
     * @return Response
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): Response
    {
        return new Response($code, $reasonPhrase);
    }
}
