<?php

declare(strict_types=1);

namespace chaser\http\message;

use InvalidArgumentException;
use Psr\Http\Message\StreamFactoryInterface;
use RuntimeException;

/**
 * 数据流工厂
 *
 * @package chaser\http\message
 */
class StreamFactory implements StreamFactoryInterface
{
    /**
     * 从字符串创建新流
     *
     * @param string $content
     * @return Stream
     */
    public function createStream(string $content = ''): Stream
    {
        return Stream::create($content);
    }

    /**
     * 从现有文件创建流
     *
     * @param string $filename
     * @param string $mode
     * @return Stream
     * @throws RuntimeException
     * @throws InvalidArgumentException
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): Stream
    {
        return Stream::createFormFile($filename, $mode);
    }

    /**
     * 从现有资源创建新流
     *
     * @param resource $resource
     * @return Stream
     */
    public function createStreamFromResource($resource): Stream
    {
        return new Stream($resource);
    }
}
