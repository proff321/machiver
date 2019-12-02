<?php
/**
 * This class is the main workhorse of the utility.  It is responsible for looping
 * through the files in the mounted directory and finding the correct class to
 * manage each type of media.
 *
 * It then loops through the archives passing the media files to each one so they
 * can perform their respective archival operations.
 *
 * The class assumes that all of the media to archive resides in the folder 
 * "/machiver/media" which is where the source device's drive should be mapped
 * when running this utility.
 */
declare(strict_types=1);

namespace Machiver;

use Exception;

class MediaManager
{
    /** @var string The directory which contains the source media */
    public const DEFAULT_SOURCE_DIR = '/machiver/media';

    /** @var resource The file handle for the source media directory */
    private $sourceDirHandle;

    /**
     * The constructor will only validate that the directory is available and
     * readable.  An exception is thrown if the directory is not readable.
     * Throwing an exception will hopefully prevent a user from running the 
     * utility on a directory which they cannot access.  Likely a result of
     * running outside of a Docker container. 
     */
    public function __construct(string $rootDirectory = self::DEFAULT_SOURCE_DIR)
    {
        if (!is_dir($rootDirectory)) {
            throw new Exception("Location `{$rootDirectory}` must be a directory");
        }

        if (false === ($directoryHandle = opendir($rootDirectory))) {
            throw new Exception("Cannot open directory `{$rootDirectory}`");
        }

        $fileArray = scandir($rootDirectory);
        if (
            count($fileArray) === 2
            || $fileArray === false
        ) {
            throw new Exception(
                "Directory `{$rootDirectory}` cannot be empty"
            );
        }

        $this->sourceDirHandle = $directoryHandle;
    }

    public function process()
    {
        // Create a list of files in the directory
        // Transform the file into a Media object
        // Pass object to the archives
        // Check for a signal to stop processing
    }

    public function getMediaClass(string $filePath): Media
    {
        // Load all the descendants of the Media class
        // Loop through them calling the isType method
        // If one is found, return
        // If one is not found, create the Unknown type and return
    }

    public function archiveMedia(Media $media)
    {
        // Create a list of all descendants of the Archive class
        // Loop through the classes passing in the media object
    }
}
