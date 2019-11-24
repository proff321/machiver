<?php
/**
 * This class is a placeholder for any media files that are not handled by the
 * existing media classes. The Media Manager uses this class as a default when
 * it searches for the correct media class.  A class was created in this
 * situation because some of the archives have built-in functionality for files
 * they can not get additional context about.
 *
 * If an unknown media type is located while using this utilit, the user is
 * encouraged to open an issue along with an example file so that a new class
 * can be created for the media type.
 */
declare(strict_types=1);

namespace Machiver\Media;

use Exception;

class Unknown
{
    public function uuid(): string
    {
        // TODO: Update method to hash file contents
        throw new Exception('Method not implemented');
    }

    /**
     * This method returns true in all cases becuase it serves as a container
     * for media which the utility does not know how to support.  Any use of
     * this class should be very deliberate and serve as the default soltuion
     * when all others have been exhausted.
     */
    public static function isType($fileHandle, int $fileSize): bool
    {
        return true;
    }
}
