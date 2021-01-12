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
        $resource = fopen('php://temp', 'rw+');
        fwrite($resource, $content);
        return new Stream($resource);
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
        if ($mode === '' || strpos('rwaxc', $mode[0]) === false) {
            throw new InvalidArgumentException(sprintf('The mode %s is invalid', $mode));
        }

        if ($filename === '') {
            throw new RuntimeException('Filename cannot be empty');
        }

        if (false === $resource = @fopen($filename, $mode)) {
            throw new RuntimeException(sprintf('The file %s cannot be opened', $filename));
        }

        return $this->createStreamFromResource($resource);
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
