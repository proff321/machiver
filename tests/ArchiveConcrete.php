<?php
/**
 * A simple class that is used in unit tests for the Archive class
 */
declare(strict_types=1);

namespace Machiver\Tests;

use Machiver\Archive;

class ArchiveConcrete extends Archive
{
    public static function isEnabled(): bool
    {
        return true;
    }
}
