<?php
namespace Roolith\Filemanager;

use Roolith\Filemanager\Interfaces\CoreBehaviorInterface;
use Roolith\Filemanager\Interfaces\DirectoryHandlerInterface;
use Roolith\Filemanager\Interfaces\FileHandlerInterface;
use Roolith\Filemanager\Interfaces\SystemAttributeInterface;

abstract class _FileSystem implements CoreBehaviorInterface, DirectoryHandlerInterface, FileHandlerInterface, SystemAttributeInterface
{
    protected $permittedExtensions = [];
    protected $timeFormat = 'd/m/Y';

    /**
     * Set time format
     *
     * @param string $timeFormat
     * @return FileSystem
     */
    public function setTimeFormat($timeFormat)
    {
        $this->timeFormat = $timeFormat;

        return $this;
    }

    /**
     * Sanitize path string
     *
     * @param $path
     * @return string
     */
    protected function sanitizePath($path)
    {
        $disallowedAccess = ['/../', '/..', '../', '..'];

        return str_replace($disallowedAccess, '/', $path);
    }

    /**
     * Get lists with permitted extensions
     *
     * @param $lists array
     * @param $path string
     * @return array
     */
    protected function getPermittedExtensions($lists, $path)
    {
        $result = ['folders' => [], 'files' => []];
        $total = count($this->permittedExtensions);

        foreach ($lists as $item) {
            if ($item !== '.' && $item !== '..') {
                if (is_dir($path.'/'.$item)) {
                    $result['folders'][] = $this->getDirectoryStat($item, $path);
                } else {
                    if ($total > 0) {
                        $ext = $this->getFileExtension($item);

                        if (in_array($ext, $this->permittedExtensions)) {
                            $result['files'][] = $this->getFileStat($item, $path);
                        }
                    } else {
                        $result['files'][] = $this->getFileStat($item, $path);
                    }
                }
            }
        }

        return $result;
    }

    /**
     * Get directory stat
     *
     * @param string $folder
     * @param string $path
     * @return array
     */
    protected function getDirectoryStat($folder, $path)
    {
        return [
            'name' => $folder,
            'size' => $this->formatBytes($this->dirSize($path.'/'.$folder)),
            'mtime' => $this->formatTime(filemtime($path.'/'.$folder))
        ];
    }

    /**
     * Get file stat
     *
     * @param string $file
     * @param string $path
     * @return array
     */
    protected function getFileStat($file, $path)
    {
        return [
            'name' => $file,
            'size' => $this->formatBytes($this->fileSize($path.'/'.$file)),
            'ext' => $this->getFileExtension($file),
            'mtime' => $this->formatTime(filemtime($path.'/'.$file)),
        ];
    }

    /**
     * Format time
     *
     * @param int $timestamp
     * @return string
     */
    protected function formatTime($timestamp)
    {
        return date($this->timeFormat, $timestamp);
    }

    /**
     * Get file extension
     *
     * @param $file string
     * @return string
     */
    protected function getFileExtension($file)
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }

    /**
     * Format bytes
     *
     * @param int $size
     * @param int $precision
     * @return string
     */
    protected function formatBytes($size, $precision = 2)
    {
        if ($size <= 0) {
            return '0 KB';
        }
        $base = log($size, 1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    /**
     * Get directory size in bytes
     *
     * @param string $directory
     * @return int
     */
    protected function dirSize($directory)
    {
        $size = 0;

        foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory)) as $file){
            $size+=$file->getSize();
        }

        return $size;
    }

    /**
     * Get file size in bytes
     *
     * @param $filePath
     * @return int
     */
    protected function fileSize($filePath)
    {
        return filesize($filePath);
    }
}