<?php
/**
 * Test the base abstract Archive class.
 */
declare(strict_types=1);

namespace Machiver\Tests;

use PHPUnit\Framework\TestCase;
use Machiver\Archive;
use Machiver\Tests\ArchiveConcrete;
use Exception;

class ArchiveTest extends TestCase
{
    public function testShouldCreateExtensibleClass()
    {
        $media = new ArchiveConcrete();
        $this->assertNotEmpty($media);
    }
}
