<?php
/**
 * Test the base abstract media class.
 */
declare(strict_types=1);

namespace Machiver\Tests;

use PHPUnit\Framework\TestCase;
use Machiver\Media;
use Machiver\Tests\MediaConcrete;
use Exception;

class MediaTest extends TestCase
{
    public function testShouldCreateExtensibleClass()
    {
        $media = new MediaConcrete(__DIR__ . '/data/testJpeg.jpeg');
        $this->assertNotEmpty($media);
    }

    public function testShouldThrowExceptionOnEmptyFilePath()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('cannot be blank');
        $media = new MediaConcrete('');
    }

    public function testShouldThrowExceptionOnMissingFile()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Unable to open file at location: /invalid/file/path');
        $media = @new MediaConcrete('/invalid/file/path');
    }
}
