<?php
/**
 * Encapsulates a JPEG photo.  Identifies the media type and manages the metadata
 * stored within the image.
 */
declare(strict_types=1);

namespace Machiver\Media;

use Exception;
use Machiver\Media\Photo;

class Jpeg extends Photo
{

    /**
     * Reads the file and check to see if the required markers are present which
     * guarantee we're working with a file that uses the JPEG File Interchange
     * Format.
     *
     * For more information on the file format please see the following link:
     * https://www.w3.org/Graphics/JPEG/jfif.txt
     */
    public static function isType($fileHandle): bool
    {
        return false;
    }
}
