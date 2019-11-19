<?php
/**
 * Test the base abstract media class.
 */
declare(strict_types=1);

namespace Machiver\Tests;

use PHPUnit\Framework\TestCase;
use Machiver\Media;

class MediaTest extends TestCase
{
    public function testShouldCreateExtensibleClass()
    {
        $media = new class extends Media
        {
            public function uuid(): string
            {
                return '1234';
            }
        };

        $this->assertNotEmpty($media);
    }
}
