<?php declare(strict_types=1);

namespace Phan\ForkPool;

use Error;
use Phan\IssueInstance;
use TypeError;

/**
 * This writes messages from a forked worker.
 * This reuses code from ProtocolStreamReader.
 *
 * This is designed to accept notifications in the same format as JSON-RPC (arbitrarily).
 */
class Writer
{
    const TYPE_ISSUE_LIST = 'issue-list';
    const TYPE_PROGRESS   = 'progress';

    /** @var resource */
    private static $output;


    /**
     * Initializes the stream writer for the forked analysis worker
     * @param resource $output
     */
    public static function initialize($output) : void
    {
        if (!\is_resource($output)) {
            throw new TypeError('Expected resource for $output, got ' . \gettype($output));
        }
        self::$output = $output;
    }

    /**
     * Returns true if this is the forked analysis worker
     */
    public static function isForkPoolWorker() : bool
    {
        return \is_resource(self::$output);
    }

    /**
     * Report the filtered issues seen by this analysis worker.
     * @param array<int,IssueInstance> $issues
     */
    public static function emitIssues(array $issues) : void
    {
        self::writeNotification(self::TYPE_ISSUE_LIST, \serialize($issues));
    }

    /**
     * Report the analysis progress
     * @param float $percent
     */
    public static function recordProgress(float $percent) : void
    {
        self::writeNotification(self::TYPE_PROGRESS, \serialize(new Progress($percent)));
    }

    /**
     * @suppress PhanThrowTypeAbsent
     */
    private static function writeNotification(string $type, string $payload) : void
    {
        if (!\is_resource(self::$output)) {
            throw new Error('Attempted to writeNotification before calling Writer::initialize');
        }

        \fwrite(self::$output, \sprintf("Content-Length: %d\r\nNotification-Type: %s\r\n\r\n%s", \strlen($payload), $type, $payload));
    }
}
