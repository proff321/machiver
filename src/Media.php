<?php
/**
 * This class is used as the base class for all media types.  It mandates the
 * functions which are required by other management classes within the
 * application.
 *
 * Where possible, it should also contain the necessary filesystem actions which
 * are shared by many different media types.
 */
declare(strict_types=1);

namespace Machiver;

use Exception;

abstract class Media
{
    /** @var string The file path for this media object */
    protected $filePath;

    /** @var resource File handle for the media object at the provided file path */
    protected $fileHandle;

    /**
     * Create a new media object with the data stored at the provided file path
     *
     * This will attempt to open the file at the provided location and will throw
     * an exception if the utility cannot open the media.
     *
     * @throws Exception When the file path is empty
     * @throws Exception When the file cannot be opened
     */
    public function __construct(string $filePath, string $mode = 'r')
    {
        if (empty($filePath)) {
            throw new Exception('File path cannot be blank');
        }

        $this->filePath = $filePath;

        if (!($fileHandle = fopen($filePath, $mode))){
            throw new Exception("Unable to open file at location: {$filePath}");
        }

        $this->fileHandle = $fileHandle;
    }

    /**
     * Create a universally unique ID that can be used to identify the media.
     * This ID must be universally unique as it is used for various management
     * tasks such as logging the history of the media.
     */
    abstract public function uuid(): string;

    /**
     * Determine if the class is responsible for the provided media type.  This
     * allows the utility find the correct class for the various media formats
     * created by a capture device.
     *
     * Where possible the developer is encouraged to look for concrete details
     * about the media instead of relying on file extension alone.  This will
     * help to reduce collisions where multiple classes can handle a given type
     * of media.
     *
     * @param resource $fileHandle File handle provided by the MediaManager
     */
    abstract public static function isType($fileHandle, int $fileSize): bool;
}
