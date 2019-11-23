<?php
/**
 * Test the JPEG photo encapsulation class
 */
declare(strict_types=1);

namespace Machiver\Tests;

use Exception;
use Machiver\Media\Jpeg;
use Machiver\Tests\MediaConcrete;
use PHPUnit\Framework\TestCase;

class JpegTest extends TestCase
{
    public function testShouldIdentifyJpegImage()
    {
        $fileHandle = fopen(__DIR__ . '/../data/testJpeg.jpeg', 'r');
        $fileSize = filesize(__DIR__ . '/../data/testJpeg.jpeg');
        $this->assertTrue(Jpeg::isType($fileHandle, $fileSize));
    }
}
