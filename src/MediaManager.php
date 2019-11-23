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

class MediaManager
{
    /**
     * The constructor will only validate that the directory is available and
     * readable.  An exception is thrown if the directory is not readable.
     * Throwing an exception will hopefully prevent a user from running the 
     * utility on a directory which they cannot access.  Likely a result of
     * running outside of a Docker container. 
     */
    public function __construct()
    {
        // Open the directory "/machiver/media"
        // Check that it is a directory
        // Check that it is readable
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
