<?php
/**
 * Test the Unknown media type
 */
declare(strict_types=1);

namespace Machiver\Tests;

use Exception;
use Machiver\Media\Unknown;
use PHPUnit\Framework\TestCase;

class JpegTest extends TestCase
{
    public function testShouldThrowExceptionWhenGettingUUID()
    {
        $media = new Unknown();
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('not implemented');
        $media->uuid();
    }

    public function testShouldAlwaysMatchFileType()
    {
        $fileHandle = fopen(__DIR__ . '/../data/testJpeg.jpeg', 'r');
        $fileSize = filesize(__DIR__ . '/../data/testJpeg.jpeg');

        $media = new Unknown();
        $this->assertTrue($media->isType($fileHandle, $fileSize));
    }
}
