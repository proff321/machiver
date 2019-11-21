<?php
/**
 * This class represents a generic photo.  It houses the methods shared across
 * various photo types.  Each photo type MUST have its own class that can
 * uniquly identify the photo.
 */
declare(strict_types=1);

namespace Machiver\Media;

use Exception;
use Machiver\Media;

abstract class Photo extends Media
{
    /**
     * Universally unique ID for a photo.  The ID is generated using a hash of
     * the actual image.  If there is ever a collison, then the images are
     * exactly alike and can be treated as the same image.
     */
    public function uuid(): string
    {
        throw new Exception('Method not implemented');
    }
}
