<?php

declare(strict_types=1);

namespace chaser\http\message;

use InvalidArgumentException;
use Psr\Http\Message\{StreamInterface, UploadedFileFactoryInterface};

/**
 * 规范上载文件工厂类
 *
 * @package chaser\http\message
 */
class UploadedFileFactory implements UploadedFileFactoryInterface
{
    /**
     * 创建一个新的规范上载文件
     *
     * @param StreamInterface $stream
     * @param int|null $size
     * @param int $error
     * @param string|null $clientFilename
     * @param string|null $clientMediaType
     * @return UploadedFile
     * @throws InvalidArgumentException
     */
    public function createUploadedFile(StreamInterface $stream, int $size = null, int $error = UPLOAD_ERR_OK, string $clientFilename = null, string $clientMediaType = null): UploadedFile
    {
        if (!$stream->isReadable()) {
            throw new InvalidArgumentException('The uploaded file resource is unreadable.');
        }

        return new UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }
}
