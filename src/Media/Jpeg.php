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
        // X'FF', SOI, X'FF', APP0, <2 bytes to be skipped>, "JFIF", X'00'.
        // The SOI marker is first and is part of the ITU T-81 standard
        $soiMarker = hex2bin('FFD8');

        // Then we have the APP0 marker, also defined by the ITU T-81 standard
        $appMarker = hex2bin('FFE0');

        // skip two bites
        // TODO:  Not sure how to do this right now, maybe use regex?

        // Then the string 'JFIF' which is specified by the ___ standard
        $formatFlag = 'JFIF';

        // Null string terminator
        $nullTerminator = hex2bin('00');

        // TODO:  Use the stream_get_line method to clean this up
        $fileContents = fread($fileHandle, 100000000);

        $indicator = $soiMarker . $appMarker . $formatFlag . $nullString;

        if (
            strpos($fileContents, $soiMarker . $appMarker) !== false
            && strpos($fileContents, $formatFlag . $nullTerminator) !== false
        ) {
            return true;
        }

        return false;
    }
}
