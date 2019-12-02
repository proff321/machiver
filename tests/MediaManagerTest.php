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
        $media = new MediaManager();
    }

    public function testShouldThrowExceptionOnFileInsteadOfDirectory()
    {
        $mockFile = vfsStream::newFile('media')
            ->at($this->root);
        $this->assertTrue($this->root->hasChild('media'));
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('must be a directory');
        $media = new MediaManager();
    }

    public function testShouldThrowExceptionOnEmptyDirectory()
    {
        $this->markTestIncomplete('Not implemented');
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
