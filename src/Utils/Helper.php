<?php

namespace Roolith\Filemanager\Utils;

class Helper
{
    /**
     * Sanitize path
     *
     * @param $path
     * @return array|string|string[]
     */
    public static function sanitizePath($path)
    {
        $disallowedAccess = ['/../', '/..', '../', '..'];

        return str_replace($disallowedAccess, '/', $path);
    }

    /**
     * Format time
     *
     * @param int $timestamp
     * @return string
     */
    public static function formatTime($timestamp, $format = 'd/m/Y')
    {
        return date($format, $timestamp);
    }

    /**
     * Format bytes
     *
     * @param int $size
     * @param int $precision
     * @return string
     */
    public static function formatBytes($size, $precision = 2)
    {
        if ($size <= 0) {
            return '0 KB';
        }

        $base = log($size, 1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    /**
     * Get file extension
     *
     * @param $file string
     * @return string
     */
    public static function getFileExtension($file)
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }
}