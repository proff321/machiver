<?php
/**
 * This class is used as the base class for all media types.  It madates the
 * functions which are required by other management classes within the
 * application.
 *
 * Where possible, it should also contain the necessary filesystem actions which
 * are shared by many different media types.
 */
declare(strict_types=1);

namespace Machiver;

abstract class Media
{
    /**
     * Create a universally unique ID that can be used to identify the media.
     * This ID must be universally unique as it is used for various management
     * tasks such as logging the history of the media.
     */
    public abstract function uuid(): string;
}
