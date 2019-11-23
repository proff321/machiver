<?php
/**
 * A simple class that is used in unit tests for the Media class
 */
declare(strict_types=1);

namespace Machiver\Tests;

use Machiver\Media;

class MediaConcrete extends Media
{
    public function uuid(): string
    {
        return '1234';
    }

    public static function isType($fileHandle, int $fileSize): bool
    {
        return false;
    }
}
