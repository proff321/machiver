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
        /**
         * The JPEG File Interchange Format states that you can identify a file
         * by the following sequence:
         *
         * X'FF', SOI, X'FF', APP0, <2 bytes to be skipped>, "JFIF", X'00'
         *
         * It's not obvious at first glace what "SOI" and "APP0" mean so here's
         * an explanation.  SOI and APP0 are markers which are specified as
         * part of the ITU T-81 standard.  They are two bytes each preceded by
         * X'FF'.  Their actual values are as follows:
         *
         * SOI - X'D8'
         * APP - X'E0'
         *
         * If you're looking for the APP0 marker definition in the spec you'll
         * need to look for just "APP" and notice that it is a range of values
         * reserved for "application segments".  See table B.1 for more
         * information on the markers.
         *
         * After the markers are two bytes which can be skipped and then the
         * string "JFIF" followed by a null terminator X"00".  The "JFIF" is
         * really what we're looking for, but the other bytes ensure it is in
         * the correct location.
         *
         * A regular expression is used to scan the file contents and find the
         * correct sequence of bytes.  What's nice about this approach is that
         * we can rely on the language to do the heavy lifting of skipping the
         * arbitrary bytes in the middle (using \C) instead of having to seek
         * within the file.
         */

        // TODO:  Update the method signature to include the true file size
        $fileContents = fread($fileHandle, 100000000);

        $regex = '/\xFF\xD8\xFF\xE0\C\CJFIF\x00/';
        if (preg_match($regex, $fileContents, $matches) === 1) {
            return true;
        }

        return false;
    }
}
