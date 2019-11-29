<?php
/**
 * Test the base Media Manager class.
 */
declare(strict_types=1);

namespace Machiver\Tests;

use PHPUnit\Framework\TestCase;
use Machiver\MediaManager;
use Exception;

class MediaManagerTest extends TestCase
{
    public function testShouldThrowExceptionOnMissingDirectory()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('must be a directory');
        $media = new MediaManager();
        // TODO: Update test to use mock filesystem
    }

    public function testShouldThrowExceptionOnFileInsteadOfDirectory()
    {
        $this->markTestIncomplete('Not implemented');
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
