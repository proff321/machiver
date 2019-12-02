<?php
/**
 * Test the base Media Manager class.
 */
declare(strict_types=1);

namespace Machiver\Tests;

use PHPUnit\Framework\TestCase;
use Machiver\MediaManager;
use Exception;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

class MediaManagerTest extends TestCase
{
    /** @var vfsStreamDirectory */
    private $root;

    public function setUp(): void {
        $this->root = vfsStream::setup('machiver');
    }

    public function testShouldThrowExceptionOnMissingDirectory()
    {
        $this->assertFalse($this->root->hasChild('media'));
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('must be a directory');
        $media = new MediaManager($this->root->url() . '/media');
    }

    public function testShouldThrowExceptionOnFileInsteadOfDirectory()
    {
        $mockFile = vfsStream::newFile('media')
            ->at($this->root);
        $this->assertTrue($this->root->hasChild('media'));
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('must be a directory');
        $media = new MediaManager($mockFile->url());
    }

    public function testShouldThrowExceptionOnEmptyDirectory()
    {
        $mediaFolder = vfsStream::newDirectory('media')
            ->at($this->root);
        $this->assertTrue($this->root->hasChild('media'));
        $this->assertFalse($mediaFolder->hasChildren());
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('cannot be empty');
        $media = new MediaManager($mediaFolder->url());
    }

    public function testShouldThrowExceptionOnUnreadableDirectory()
    {
        $this->markTestIncomplete('Not implemented');
    }

    public function testShouldRewindDirectoryHandle()
    {
        $this->markTestIncomplete('Not implemented');
    }
}
