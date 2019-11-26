<?php
/**
 * This class is used as the base class for all archive types.  It allows other
 * archives to share commone files as well serving as a common base for the
 * MediaManager to manage the configured archives.
 */
declare(strict_types=1);

namespace Machiver;

use Exception;

abstract class Archive
{
    /**
     * This method allows the MediaManager to determine which of the avaliable
     * archives have been configured for the mounted folder.  Each archive is
     * responsible for checking its configuration options to see if it is
     * enabled.
     *
     * Each archive should have an explicit `enabled` option that is checked by
     * this method.  The actual validation of the archive settings comes later
     * when the archive is instantiated.
     */
    public static abstract function isEnabled(): bool;
}
