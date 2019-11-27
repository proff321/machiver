<?php
/**
 * This class is used as the base class for all archive types.  It allows other
 * archives to share commone files as well serving as a common base for the
 * MediaManager to manage the configured archives.
 */
declare(strict_types=1);

namespace Machiver;

use Machiver\Media;

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

    /**
     * This method does the actual work of archiving the provided media.  It is
     * expected to return `true` only if it can validate that it has performed
     * its archival duties successfully.  If any errors occurr, including a
     * validation failure, then the method should return `false`.
     *
     * This is a very intentional part of the design as a user should feel
     * confident that an archive did what it adverstised.  This will allow a
     * user to safely offload the media from the source device without fear of
     * losing the source media.
     */
    abstract public function process(Media $media): bool;
}
