<?php
/**
 * A simple class that is used in unit tests for the Archive class
 */
declare(strict_types=1);

namespace Machiver\Tests;

use Machiver\Archive;
use Machiver\Media;

class ArchiveConcrete extends Archive
{
    public static function isEnabled(): bool
    {
        return true;
    }

    public function process(Media $media): bool
    {
        return true;
    }
}
